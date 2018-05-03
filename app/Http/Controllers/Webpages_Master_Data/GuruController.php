<?php
namespace App\Http\Controllers\Webpages_Master_Data;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\mstr_guru;
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
      
        try
        {
   
            $mstr_guru = new mstr_guru;
            $mstr_guru->id = $request->txt_id;
            $mstr_guru->nama = $request->txt_nama;
            $mstr_guru->alamat = $request->txt_alamat;
            $mstr_guru->no_telp = $request->txt_no_telp;
            $mstr_guru->email = $request->txt_email;
            $mstr_guru->created_by =  Auth::user()->id;
            $mstr_guru->status = "active";  
            $mstr_guru->save();
            
            $result = ($mstr_guru == TRUE)? "S":"F";
            $message = "-";
        }
        catch(Exception $e){
            $result = "E";
            $message = $e->getMessage();
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