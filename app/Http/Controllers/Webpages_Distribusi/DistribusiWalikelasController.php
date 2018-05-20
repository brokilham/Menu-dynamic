<?php
namespace App\Http\Controllers\Webpages_Distribusi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use auth;
use App\t_distribusi_jabatan;
use App\t_distribusi_walikelas;
use App\mstr_kelas;
use App\mstr_guru;
use DataTables;
use Exception;

class DistribusiWalikelasController extends Controller
{
    public function index()
    {
        return view('backend.webpages_distribusi.distribusi_walikelas.main');
    }

    public function get_select_option_walikelas_kelas(){

        $list_walikelas = mstr_guru::where('status', 'active')->with('t_distribusi_jabatan.mstr_jabatan','t_distribusi_walikelas')->get();
        $list_kelas = mstr_kelas::where('status', 'active')->get();
        return response()->json(['list_walikelas' => $list_walikelas, 'list_kelas' =>$list_kelas]);
        
    }


    public function get_select_option_kelas_single(){
        $list_kelas = mstr_kelas::where('status', 'active')->get();
  
        return response()->json(['list_kelas' =>$list_kelas] );        
    }

    public function create(Request $request){
        try
        {
           
            $DataExist = t_distribusi_walikelas::where('id_guru', $request->slc_nama_guru)->first();
            if($DataExist == null){
                $t_distribusi_walikelas = new t_distribusi_walikelas;
                $t_distribusi_walikelas->id_guru = $request->slc_nama_guru;
                $t_distribusi_walikelas->id_jabatan = $request->txt_id_jabatan;
                $t_distribusi_walikelas->id_kelas = $request->slc_kelas;
                $t_distribusi_walikelas->created_by =  Auth::user()->id;
                $t_distribusi_walikelas->status = "active";  
                $t_distribusi_walikelas->save();          
                $result = ($t_distribusi_walikelas == TRUE)? "S":"F";
                $message = "-";
            }else{
                $return =   t_distribusi_walikelas::where('id', $DataExist->id)->update(
                    ['id_kelas' => $request->slc_kelas,
                     'created_by' =>  Auth::user()->id,
                     'status' => 'active']
                );
                $result = ($return == 1)? "S":"F";
                $message = "-";
            }   
        }
        catch(Exception $e){
            $result = "E";
            $message = $e->getMessage();
        }
            
       return response()->json(['code' => $result, 'message' =>$message] );
        
    }

    public function update(Request $request){
       try{
           
            $return =   t_distribusi_walikelas::where('id', $request->txt_id_updt)->update(
                ['id_kelas' => $request->slc_kelas_updt]
            );
            $result = ($return == 1)? "S":"F";
            $message = "-";

            $message = "-";
        }
        catch(Exception $e){
            $result = "E";
            $message = $e->getMessage();
        }          
        return response()->json(['code' =>  $result, 'message' =>$message] );
    }

    public function delete(Request $request){    
        try{
           
            $return =   t_distribusi_walikelas::where('id', $request->id)->update(['status' => 'non_active']);
            $result = ($return == 1)? "S":"F";
            $message = "-";
        }
        catch(Exception $e){
            $result = "E";
            $message = $e->getMessage();
        }
  
        return response()->json(['code' =>  $result, 'message' =>$message] );
    }

    public function getall_distribusi_walikelas(){
        $t_distribusi_walikelas = t_distribusi_walikelas::where('status', 'active')->with('mstr_guru','mstr_kelas')->get(); 
        return DataTables::of($t_distribusi_walikelas)->make(true);
    }
}
