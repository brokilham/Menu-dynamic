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
use Illuminate\Support\Facades\DB;
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

            $DataExist = t_distribusi_jadwal::where('id_jadwal', $request->slc_jam)->where('id_guru', Auth::user()->email)->where('status','active')->first();
            if($DataExist == null){
                $t_distribusi_jadwal = new t_distribusi_jadwal;
                $t_distribusi_jadwal->id_jadwal = $request->slc_jam;
                $t_distribusi_jadwal->id_guru    =  Auth::user()->email;
                $t_distribusi_jadwal->created_by =  Auth::user()->email;
                $t_distribusi_jadwal->status = "active";  
                $t_distribusi_jadwal->save();          
                $result = ($t_distribusi_jadwal == TRUE)? "S":"F";
                $message = "-";
            }else{

                $return =   t_distribusi_jadwal::where('id', $DataExist->id)->update(
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

    public function get_all_distribusi_jadwal(){
        // di join table ini masih ada masalah 
        // hari dan jam ada yang tidak keluar
        //$t_distribusi_jadwal = t_distribusi_jadwal::where('id_guru',Auth::user()->id)->where('status', 'active')->with('mstr_jadwal')->get(); 
         //return response()->json(['t_distribusi_jadwal' => $t_distribusi_jadwal] ); 
       
       $t_distribusi_jadwal =  DB::select("SELECT 
                                                t_j.id,
                                                DATE_FORMAT(t_j.created_at, '%d-%m-%Y') AS created_at,
                                                DATE_FORMAT(t_j.updated_at, '%d-%m-%Y') AS updated_at,
                                                t_j.created_by,
                                                t_j.status,
                                                m_j.hari,
                                                m_jam.jam_mulai,
                                                m_jam.jam_selesai
                                            FROM
                                                t_distribusi_jadwals AS t_j
                                            LEFT JOIN
                                                mstr_jadwals AS m_j ON t_j.id_jadwal = m_j.id
                                            LEFT JOIN
                                                mstr_jams AS m_jam ON m_j.jam = m_jam.id
                                            WHERE id_guru = :id_guru AND t_j.status = :status",
                                            ['id_guru' => Auth::user()->email,'status' => 'active']);
       
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
