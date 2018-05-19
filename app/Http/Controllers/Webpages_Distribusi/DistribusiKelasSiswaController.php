<?php
namespace App\Http\Controllers\Webpages_Distribusi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\mstr_siswa;
use App\mstr_kelas;
use App\t_distribusi_kelas;
use auth;
use DataTables;
use Exception;

class DistribusiKelasSiswaController extends Controller
{
    public function index()
    {     
       /*
        contoh untuk relasi one to one 
        $usersx = t_distribusi_kelas::where('status', 'active')->where('id', '1')->get();
        return view('backend.webpages_distribusi.distribusi_kelas.main')->with('usersx',$usersx);
        TES
        @foreach($usersx as $item)
        <tr>
            <td>{{ $item->id_siswa }}</td>
            <td>{{ $item->mstr_siswa->nama}}</td>
           
        </tr>
        @endforeach*/
        
        return view('backend.webpages_distribusi.distribusi_kelas.main');
    }

    public function get_select_option_siswa_kelas(){
        $list_siswa = mstr_siswa::where('status', 'active')->with('t_distribusi_kelas')->get();
        $list_kelas = mstr_kelas::where('status', 'active')->get();
      
        return response()->json(['list_siswa' => $list_siswa, 'list_kelas' =>$list_kelas] );        
    }

    public function get_select_option_kelas_single(){
        $list_kelas = mstr_kelas::where('status', 'active')->get();
  
        return response()->json(['list_kelas' =>$list_kelas] );        
    }

    public function create(Request $request){
        try
        {  
            $DataExist = t_distribusi_kelas::where('id_siswa', $request->slc_nama_siswa)->first();
            if($DataExist == null){
                $t_distribusi_kelas = new t_distribusi_kelas;
                $t_distribusi_kelas->id_siswa = $request->slc_nama_siswa;
                $t_distribusi_kelas->id_kelas = $request->slc_kelas;
                $t_distribusi_kelas->created_by =  Auth::user()->id;
                $t_distribusi_kelas->status = "active";  
                $t_distribusi_kelas->save();          
                $result = ($t_distribusi_kelas == TRUE)? "S":"F";
                $message = "-";
            }else{
                $return =   t_distribusi_kelas::where('id', $DataExist->id)->update(
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
           
            $return =   t_distribusi_kelas::where('id', $request->txt_id_updt)->update(
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
           
            $return =   t_distribusi_kelas::where('id', $request->id)->update(
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

    public function getall_distribusi_kelas(){
        
        //$t_distribusi_kelas = t_distribusi_kelas::where('status', 'active');
        $t_distribusi_kelas = t_distribusi_kelas::where('status', 'active')->with('mstr_siswa','mstr_kelas')->get();   
        return DataTables::of($t_distribusi_kelas)->make(true);
    }

    /*
    cuman buat tes aja
    public function getall_distribusi_kelas2(){

        $t_distribusi_kelas = t_distribusi_kelas::where('status', 'active')->where('id', '1')->with('mstr_siswa','mstr_kelas')->get();
        //$t_distribusi_kelas = t_distribusi_kelas::where('status', 'active')->get();
        return response()->json($t_distribusi_kelas);
    }  
    */
    
}
