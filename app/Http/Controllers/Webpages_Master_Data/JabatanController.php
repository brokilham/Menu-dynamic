<?php
namespace App\Http\Controllers\Webpages_Master_Data;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\mstr_jabatan;
use auth;
use DataTables;
use Exception;

class JabatanController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('backend.webpages_master_data.master_jabatan.main');
    }

    public function create(Request $request){
      
        try
        {
           
            $mstr_jabatan = new mstr_jabatan;
            $mstr_jabatan->nama = $request->txt_name;
            $mstr_jabatan->created_by =  Auth::user()->id;
            $mstr_jabatan->status = "active";  
            $mstr_jabatan->save();
            
            $result = ($mstr_jabatan == TRUE)? "S":"F";
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
           
            $return =   mstr_jabatan::where('id', $request->txt_id_updt)->update(['nama' => $request->txt_nama_updt]);
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
           
          $return =   mstr_jabatan::where('id', $request->id)->update(['status' => 'non_active']);
          $result = ($return == 1)? "S":"F";
          $message = "-";
        }
        catch(Exception $e){
            $result = "E";
            $message = $e->getMessage();
        }

        return response()->json(['code' =>  $result, 'message' =>$message] );
    }

    public function getall_mstr_jabatan(){
        $mstr_jabatan = mstr_jabatan::where('status', 'active');
        return DataTables::of($mstr_jabatan)->make(true);
    }
    

}
