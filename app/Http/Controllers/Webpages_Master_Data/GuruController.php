<?php
namespace App\Http\Controllers\Webpages_Master_Data;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Foundation\Auth\RegistersUsers;
use App\mstr_guru;
use App\User;
use auth;
use DataTables;
use Exception;


class GuruController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('backend.webpages_master_data.master_guru.main');
    }

    public function create(Request $request){

        $DataExist = mstr_guru::where('id', $request->txt_id)->first();
        if($DataExist == null){
            DB::beginTransaction();
            try
            {
       
                $mstr_guru = new mstr_guru;
                $mstr_guru->id = $request->txt_id;
                $mstr_guru->nama = $request->txt_nama;
                $mstr_guru->alamat = $request->txt_alamat;
                $mstr_guru->no_telp = $request->txt_no_telp;
                $mstr_guru->email = $request->txt_email;
                $mstr_guru->created_by =  Auth::user()->email;
                $mstr_guru->status = "active";  
                $mstr_guru->save();
    
                $User =  new User;
                $User->name = $request->txt_nama;
                $User->email = $request->txt_id;
                $User->password = Hash::make($request->txt_id);
                $User->login_as = "-";
                $User->login_at = "-";
                $User->status = "non_active";
                $User->save();
    
                if(($mstr_guru == TRUE) && ($User== TRUE)){
                    DB::commit();
                    $result = "S";
                    $message = "";
                }else{
                    DB::rollback();            
                    $result = "F";
                    $message = "Terjadi kesalahan saat proses penyimpanan !!!";
                }           
            }
            catch(Exception $e){
                DB::rollback();
                $result = "E";
                $message = $e->getMessage();
            }

        }else{
            $result = "E";
            $message = "ID Guru telah tersimpan sebelumnya !!";
        }
        
            
             
        return response()->json(['code' => $result, 'message' =>$message] );
    }

    public function update(Request $request){
        try{
           
            $return =   mstr_guru::where('id', $request->txt_id_updt)->update([
                'nama' => $request->txt_nama_updt,
                'alamat' => $request->txt_alamat_updt,
                'no_telp' => $request->txt_no_telp_updt,
                'email' => $request->txt_email_updt]);
            $result = ($return == 1)? "S":"F";
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
           
          $return =   mstr_guru::where('id', $request->id)->update(['status' => 'non_active']);
          $result = ($return == 1)? "S":"F";
          $message = "-";
        }
        catch(Exception $e){
            $result = "E";
            $message = $e->getMessage();
        }

        return response()->json(['code' =>  $result, 'message' =>$message] );
    }

    public function getall_mstr_guru(){
        
        $mstr_guru = mstr_guru::where('status', 'active');

        return DataTables::of($mstr_guru)->make(true);
    }
}
