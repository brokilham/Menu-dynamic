<?php
namespace App\Http\Controllers\Webpages_Distribusi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\mstr_jabatan;
use App\mstr_guru;
use App\t_distribusi_jabatan;
use App\User;
use auth;
use DataTables;
use Exception;
use Illuminate\Support\Facades\DB;
use App\privilage_webpages;

class DistribusiJabatanGuruController extends Controller
{
    public function index()
    {
        return view('backend.webpages_distribusi.distribusi_jabatan.main');
    }

    public function get_select_option_guru_jabatan(){
  
        $list_guru = mstr_guru::where('status', 'active')->with('t_distribusi_jabatan')->get();
        $list_jabatan = mstr_jabatan::where('status', 'active')->get();
        return response()->json(['list_guru' => $list_guru, 'list_jabatan' =>$list_jabatan] );
        
    }

    public function get_select_option_jabatan_single(){
        $list_jabatan = mstr_jabatan::where('status', 'active')->get();
        return response()->json(['list_jabatan' =>$list_jabatan] );        
    }


    public function create(Request $request){
        DB::beginTransaction();
        try
        {  // ketika create master jabatan untuk guru maka otomatis, proses set activasi user guru tersebut juga di lakukan 
            $DataExist = t_distribusi_jabatan::where('id_guru', $request->slc_nama_guru)->first();
            if($DataExist == null){
                $t_distribusi_jabatan = new t_distribusi_jabatan;
                $t_distribusi_jabatan->id_guru = $request->slc_nama_guru;
                $t_distribusi_jabatan->id_jabatan = $request->slc_jabatan;
                $t_distribusi_jabatan->created_by =  Auth::user()->email;
                $t_distribusi_jabatan->status = "active";  
                $t_distribusi_jabatan->save();
                
                
                $list_jabatan = mstr_jabatan::where('id',  $request->slc_jabatan)->first();    
                
                $User = User::where('email', $request->slc_nama_guru)->update(
                    ['login_as' => $list_jabatan->login_as,
                     'login_at' => $list_jabatan->login_at,
                     'status' => 'active']
                );

                $hak_akses = $this->createHakAksesWeb($request->slc_nama_guru,$request->slc_jabatan);

                if(( $t_distribusi_jabatan == TRUE) 
                    && ($User == 1) 
                    && ($hak_akses == 1 || $hak_akses == true)){

                    DB::commit();
                    $result = "S";
                    $message = "-";
                }else{
                    DB::rollback();  
                    $result = "F";
                    $message = "Terjadi kesalahan saat proses penyimpanan !!!";
                }
            
            }
            else{
              
                
                $t_distribusi_jabatan =   t_distribusi_jabatan::where('id_guru', $request->slc_nama_guru)->update(
                    ['id_jabatan' => $request->slc_jabatan,
                     'created_by' =>  Auth::user()->email,
                     'status' => 'active']
                );

                $list_jabatan = mstr_jabatan::where('id',  $request->slc_jabatan)->first();
                $User =  User::where('email', $request->slc_nama_guru)->update(
                    ['login_as' => $list_jabatan->login_as,
                     'login_at' => $list_jabatan->login_at,
                     'status' => 'active']
                );
             
                if(( $t_distribusi_jabatan == TRUE) && ($User == 1)){
                    DB::commit();
                    $result = "S";
                    $message = "-";
                }else{
                    DB::rollback();  
                    $result = "F";
                    $message = "Terjadi kesalahan saat proses penyimpanan !!!";
                }
                          
            }
                     
        }
        catch(Exception $e){
            DB::rollback();
            $result = "E";
            $message = $e->getMessage();
        }
            //$message = $list_jabatan;
       return response()->json(['code' => $result, 'message' =>$message] );

    }

    public function createHakAksesWeb($id_guru,$id_jabatan){
        try{
            if($id_jabatan == "5"){
               $now = \Carbon\Carbon::now();      
                //$privilage_webpages = new privilage_webpages;
               $privilage_webpages = privilage_webpages::insert([ 
                    ['id_main_menu' => '5','created_at' =>$now,'updated_at' =>$now,'created_by' => Auth::user()->email,'user_id' => $id_guru],
                    ['id_main_menu' => '6','created_at' =>$now,'updated_at' =>$now,'created_by' => Auth::user()->email,'user_id' => $id_guru],
                    ['id_main_menu' => '7','created_at' =>$now,'updated_at' =>$now,'created_by' => Auth::user()->email,'user_id' => $id_guru],
                ]);
                return $privilage_webpages;
            }

            return true;
        }catch(Exception $e){
            return false;
        } 
    }

    public function update(Request $request){
        try{
           
            $t_distribusi_jabatan =   t_distribusi_jabatan::where('id', $request->txt_id_updt)->update(
                ['id_jabatan' => $request->slc_jabatan_updt]
            );

            $list_jabatan = mstr_jabatan::where('id',  $request->slc_jabatan_updt)->first();
            $User =  User::where('email', $request->txt_id_guru_updt)->update(
                ['login_as' => $list_jabatan->login_as,
                 'login_at' => $list_jabatan->login_at]
            );
         
            if(( $t_distribusi_jabatan == TRUE) && ($User == 1)){
                DB::commit();
                $result = "S";
                $message = "-";
            }else{
                DB::rollback();  
                $result = "F";
                $message = "Terjadi kesalahan saat proses penyimpanan !!!";
            }
           
          }
          catch(Exception $e){
              $result = "E";
              $message = $e->getMessage();
          }          
          return response()->json(['code' =>  $result, 'message' =>$message] );
    }

    public function delete(Request $request){
        try{
           
            $t_distribusi_jabatan =   t_distribusi_jabatan::where('id', $request->id)->update(['status' => 'non_active']);
         
            $User =  User::where('email', $request->id_guru)->update(
                ['status' => 'non_active']
            );
        }
        catch(Exception $e){
            $result = "E";
            $message = $e->getMessage();
        }
  
        return response()->json(['code' =>  $result, 'message' =>$message] );
    }

    public function getall_distribusi_jabatan(){
        
        $t_distribusi_jabatan = t_distribusi_jabatan::where('status', 'active')->with('mstr_guru','mstr_jabatan')->get();   
        return DataTables::of($t_distribusi_jabatan)->make(true);
    }
}
