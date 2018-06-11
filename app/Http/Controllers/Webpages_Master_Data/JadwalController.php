<?php
namespace App\Http\Controllers\Webpages_Master_Data;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\mstr_jadwal;
use App\mstr_jam;
use auth;
use DataTables;
use Exception;


class JadwalController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('backend.webpages_master_data.master_jadwal.main');
    }

    public function create(Request $request){
        try
        {  
            //!! important bagaimana cara simpan setelah di delete status non active terus di active in lagi
            // disini nanti check hari dan jam sekaligus
            // jadwl controller hanya menyimpan tidak bisa update hanya bisa create dan delete
            $DataExist = mstr_jadwal::where('hari', $request->slc_hari)->where('jam', $request->slc_jam)->first();
            if($DataExist == null){
                $mstr_jadwal = new mstr_jadwal;
                $mstr_jadwal->hari = $request->slc_hari;
                $mstr_jadwal->jam  = $request->slc_jam;
                $mstr_jadwal->created_by =  Auth::user()->email;
                $mstr_jadwal->status = "active";  
                $mstr_jadwal->save();          
                $result = ($mstr_jadwal == TRUE)? "S":"F";
                $message = "-";
            }else{

                $return =   mstr_jadwal::where('id', $DataExist->id)->update(
                    ['created_by' =>  Auth::user()->email,
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


    public function delete(Request $request){
        
        try{
           
            $return =   mstr_jadwal::where('id', $request->id)->update(
                ['status' => 'non_active']);
            $result = ($return == 1)? "S":"F";
            $message = "-";
        }
        catch(Exception $e){
            $result = "E";
            $message = $e->getMessage();
        }
  
        return response()->json(['code' =>  $result, 'message' =>$message] );
        
    }
    
    
    public function get_all_mstr_jam(){
        $list_jam = mstr_jam::where('status', 'active')->get();     
        return response()->json(['list_jam' => $list_jam] );        
    }


    public function get_all_mstr_jadwal(){
        
        $mstr_jadwal = mstr_jadwal::where('status', 'active')->with('mstr_jam')->get();   
        //$mstr_jadwal = mstr_jadwal::where('status', 'active')->with('mstr_siswa','mstr_kelas')->get();   
        return DataTables::of($mstr_jadwal)->make(true);
    }
}
