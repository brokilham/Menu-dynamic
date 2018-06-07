<?php
namespace App\Http\Controllers\Webpages_Pelanggaran;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\mstr_siswa;
use App\t_pelanggaran;
use auth;
use DataTables;
use Exception;

class TransaksiPelanggaran extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('backend.webpages_transaksi_pelanggaran.main');
    }

    public function get_select_option_siswa(){
        $list_siswa = mstr_siswa::where('status', 'active')->get(); 
        return response()->json(['list_siswa' => $list_siswa] );        

    }
    
 
    public function create(Request $request){
        try
        {
           
            $carbon = new Carbon($request->txt_tgl_kejadian);
            $carbon->format('Y-m-d H:i:s');

            $t_pelanggaran = new t_pelanggaran;
            $t_pelanggaran->jenis_pelanggaran = $request->slc_jenis_pelanggaran;
            $t_pelanggaran->jenis_pendisiplinan = $request->slc_jenis_pendisiplinan;
            $t_pelanggaran->tanggal_kejadian = $carbon;
            $t_pelanggaran->lokasi_kejadian = $request->txt_lokasi_kejadian;
            $t_pelanggaran->keterangan = "-";
            $t_pelanggaran->keterangan_pelanggaran = $request->txt_ket_pelanggaran;
            $t_pelanggaran->keterangan_pendisiplinan = $request->txt_ket_pendisplinan;
            $t_pelanggaran->id_siswa = $request->slc2_siswa;          
            $t_pelanggaran->created_by =  Auth::user()->id;
            $t_pelanggaran->status = "active";  
            $t_pelanggaran->save();
            
            $result = ($t_pelanggaran == TRUE)? "S":"F";
            $message = "-";
            
        }
        catch(Exception $e){
            $result = "E";
            $message = $e->getMessage();
        }
            
       return response()->json(['code' => $result, 'message' =>$message] );
       //return response()->json(['code' => $request->slc_nama_guru, 'message' =>$request->slc_jabatan] );
    }
    // update pelanggaran tidak perlu dibikin agar ada historynya, biar dihapus terus bikin lagi
    public function delete(Request $request){
        try{
           
            $return =   t_pelanggaran::where('id', $request->id)->update(['status' => 'non_active']);
            $result = ($return == 1)? "S":"F";
            $message = "-";
        }
        catch(Exception $e){
            $result = "E";
            $message = $e->getMessage();
        }
  
        return response()->json(['code' =>  $result, 'message' =>$message] );
    }

    public function getall_transaksi_pelanggaran(){
        
           $t_pelanggaran = t_pelanggaran::where('status', 'active')->get();   
           return DataTables::of($t_pelanggaran)->make(true);
    }
}
