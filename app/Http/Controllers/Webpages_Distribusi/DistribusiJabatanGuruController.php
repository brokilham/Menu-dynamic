<?php
namespace App\Http\Controllers\Webpages_Distribusi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\mstr_jabatan;
use App\mstr_guru;
use App\t_distribusi_jabatan;
use auth;
use DataTables;
use Exception;

class DistribusiJabatanGuruController extends Controller
{
    public function index()
    {
        return view('backend.webpages_distribusi.distribusi_jabatan.main');
    }

    public function get_select_option_guru_jabatan(){
  
        //$list_guru = mstr_guru::where('status', 'active');
        //$list_jabatan = mstr_jabatan::where('status', 'active');
        $list_guru = mstr_guru::ALL();
        $list_jabatan = mstr_jabatan::ALL();
        return response()->json(['list_guru' => $list_guru, 'list_jabatan' =>$list_jabatan] );
        
    }


    public function create(Request $request){
        try
        {
           
            $t_distribusi_jabatan = new t_distribusi_jabatan;
            $t_distribusi_jabatan->id_guru = $request->slc_nama_guru;
            $t_distribusi_jabatan->id_jabatan = $request->slc_jabatan;
            $t_distribusi_jabatan->created_by =  Auth::user()->id;
            $t_distribusi_jabatan->status = "active";  
            $t_distribusi_jabatan->save();
            
            $result = ($t_distribusi_jabatan == TRUE)? "S":"F";
            $message = "-";
        }
        catch(Exception $e){
            $result = "E";
            $message = $e->getMessage();
        }
            
       return response()->json(['code' => $result, 'message' =>$message] );
       //return response()->json(['code' => $request->slc_nama_guru, 'message' =>$request->slc_jabatan] );
    }

    public function update(Request $request){
      
    }

    public function delete(Request $request){
        try{
           
            $return =   t_distribusi_jabatan::where('id', $request->id)->update(['status' => 'non_active']);
            $result = ($return == 1)? "S":"F";
            $message = "-";
        }
        catch(Exception $e){
            $result = "E";
            $message = $e->getMessage();
        }
  
        return response()->json(['code' =>  $result, 'message' =>$message] );
    }

    public function getall_distribusi_jabatan(){
        
        $t_distribusi_jabatan = t_distribusi_jabatan::where('status', 'active');
        return DataTables::of($t_distribusi_jabatan)->make(true);
    }
}
