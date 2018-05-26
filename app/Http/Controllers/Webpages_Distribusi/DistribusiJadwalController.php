<?php
namespace App\Http\Controllers\Webpages_Distribusi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use auth;
use DataTables;
use Exception;
use App\mstr_jadwal;
use App\mstr_jam;
use App\t_distribusi_jadwal;

class DistribusiJadwalController extends Controller
{
    public function index()
    {
        return view('backend.webpages_distribusi.distribusi_jadwal.main');
    }
     
    /*public function get_all_mstr_jam(){
        $list_jam = mstr_jam::where('status', 'active')->get();     
        return response()->json(['list_jam' => $list_jam] );        
    }*/
    
    // function ini hanya mengambil hari yang telah disimpan oleh administrator web
    public function get_all_mstr_hari(){

        $list_hari = mstr_jadwal::select('hari')->where('status', 'active')->groupBy('hari')->get(); 
        //$list_hari = mstr_jadwal::where('status', 'active')->groupBy('hari')->get();     
        return response()->json(['list_hari' => $list_hari] );        
    }

    public function get_all_mstr_jam(Request $request){
         $list_jam = mstr_jadwal::where('status', 'active')->where('hari', $request->selected_hari)->with('mstr_jam')->get();     
        return response()->json(['list_jam' => $list_jam] );    
    }

    /*public function get_all_mstr_jam(){
        $list_jam = mstr_jam::where('status', 'active')->get();     
        return response()->json(['list_jam' => $list_jam] );        
    }*/

    public function create(Request $request){
        try
        {  
            // check terlebih dahulu apa ada row dg id hari dan id guru yang tersimpan dengan status aktif

            $DataExist = t_distribusi_jadwal::where('id_jadwal', $request->slc_jam)->where('id_guru', Auth::user()->id)->where('status','active')->first();
            if($DataExist == null){
                $t_distribusi_jadwal = new t_distribusi_jadwal;
                $t_distribusi_jadwal->id_jadwal = $request->slc_jam;
                $t_distribusi_jadwal->id_guru    =  Auth::user()->id;
                $t_distribusi_jadwal->created_by =  Auth::user()->id;
                $t_distribusi_jadwal->status = "active";  
                $t_distribusi_jadwal->save();          
                $result = ($t_distribusi_jadwal == TRUE)? "S":"F";
                $message = "-";
            }else{

                $return =   t_distribusi_jadwal::where('id', $DataExist->id)->update(
                    ['created_by' =>  Auth::user()->id,
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

    public function get_all_distribusi_jadwal(){
        //$t_distribusi_jadwal = t_distribusi_jadwal::where('id_guru',Auth::user()->id)->where('status', 'active')->with('mstr_jadwal','mstr_jadwal.mstr_jam')->get(); 
        $t_distribusi_jadwal = t_distribusi_jadwal::where('id_guru',Auth::user()->id)->where('status', 'active')->get();   
        return DataTables::of($t_distribusi_jadwal)->make(true);
    }
    

    public function delete(Request $request){
        try{
           
            $return = t_distribusi_jadwal::where('id', $request->id)->update(['status' => 'non_active']);
            $result = ($return == 1)? "S":"F";
            $message = "-";
        }
        catch(Exception $e){
            $result = "E";
            $message = $e->getMessage();
        }
  
        return response()->json(['code' =>  $result, 'message' =>$message] );
    }
}
