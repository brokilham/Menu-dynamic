<?php

namespace App\Http\Controllers\Webpages_Master_Data;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\mstr_kelas;
use auth;
use DataTables;
use Exception;

class KelasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('backend.webpages_master_data.master_kelas.main');
    }

    public function create(Request $request){
      
        try
        {
   
            $mstr_kelas = new mstr_kelas;
            $mstr_kelas->kelas = $request->txt_kelas;
            $mstr_kelas->ruang = $request->txt_ruang;
            $mstr_kelas->created_by =  Auth::user()->id;
            $mstr_kelas->status = "active";  
            $mstr_kelas->save();
            
            $result = ($mstr_kelas == TRUE)? "S":"F";
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
           
            $return =   mstr_kelas::where('id', $request->txt_id_updt)->update(['kelas' => $request->txt_kelas_updt,'ruang' => $request->txt_ruang_updt]);
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
           
          $return =   mstr_kelas::where('id', $request->id)->update(['status' => 'non_active']);
          $result = ($return == 1)? "S":"F";
          $message = "-";
        }
        catch(Exception $e){
            $result = "E";
            $message = $e->getMessage();
        }

        return response()->json(['code' =>  $result, 'message' =>$message] );
    }

    public function getall_mstr_kelas(){
        
        $mstr_kelas = mstr_kelas::where('status', 'active');

        return DataTables::of($mstr_kelas)->make(true);
    }
        
}
