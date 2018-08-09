<?php
namespace App\Http\Controllers\Webpages_Bimbingan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\t_bimbingan;
use App\mstr_ket_realisasi;
use auth;
use DataTables;
use Exception;
use Carbon\Carbon;
use App\Http\Controllers\Export_Excel\BimbinganPengajuanExport;
use Maatwebsite\Excel\Facades\Excel;


class TransaksiBimbingan extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    // == begin func pengajuan =============================     
    // index untuk pengajuan rencana
    public function index(){
        return view('backend.webpages_transaksi_bimbingan.transaksi_bimbingan_pengajuan.main');
    }
    
    /*public function getall_transaksi_pengajuan_bimbingan(){
             
        //$t_bimbingan = t_bimbingan::where('status_approval', '')->where('id_guru', Auth::user()->email)->get();  
        $t_bimbingan = t_bimbingan::where('status_realisasi', '')->where('id_guru', Auth::user()->email)->get();  
        return DataTables::of($t_bimbingan)->make(true);
    }*/

    public function getall_transaksi_pengajuan_bimbingan(Request $request){
             
        // note
        // jika param:
        // ""= semua, 0 = belum direspon, 1=disetuji, 2= di tolak
        if($request->param_status_approval != ""){
            $t_bimbingan = t_bimbingan::where('status_approval',  $request->param_status_approval)->where('status_realisasi', '')->where('id_guru', Auth::user()->email)->get();  
        }else{
            $t_bimbingan = t_bimbingan::where('status_realisasi', '')->where('id_guru', Auth::user()->email)->get();  
        }
     
        return DataTables::of($t_bimbingan)->make(true);
    }

    public function set_respon_pengajuan(Request $request){
        try{
            $return =   t_bimbingan::where('id', $request->txt_id_pengajuan)->update(
                ['status_approval' => $request->txt_status_approval,
                'keterangan_approval_pengajuan' =>$request->txt_tolak_pengajuan,
                'tgl_approval'=>Carbon::now('Asia/Jakarta')->toDateTimeString()]);
            $result = ($return == 1)? "S":"F";
            $message = "-";
        }
        catch(Exception $e){
            $result = "E";
            $message = $e->getMessage();
        }
              
        return response()->json(['code' =>  $result, 'message' =>$message] );
    }

    // == end func pengajuan ===============================     
   
    // == begin func realisasi =============================     
    // index 2 untuk realisasi
    public function index2(){
        return view('backend.webpages_transaksi_bimbingan.transaksi_bimbingan_realisasi.main');
    }

   /*public function getall_transaksi_realisasi_bimbingan(){
             
        $t_bimbingan = t_bimbingan::where('status_approval','!=', '')->where('id_guru', Auth::user()->email)->get();  
        return DataTables::of($t_bimbingan)->make(true);
    }*/

    public function getall_transaksi_realisasi_bimbingan(Request $request){
             
        // all jika parameter 0 / tidak ada where
        // belum realisasi jika status_realisasi == ""
        // sudah realisasi jika status_realisasi != 0
        // kadaluarsa jika status kadaluarsa != ""
        if($request->param_status_realisasi == "all"){
            $t_bimbingan = t_bimbingan::where('status_approval','!=', '')->where('id_guru', Auth::user()->email)->get();  
        }
        else if($request->param_status_realisasi == "sudah_realisasi"){
            $t_bimbingan = t_bimbingan::where('status_approval','!=', '')->where('status_realisasi','!=','')->where('id_guru', Auth::user()->email)->get();  

        }
        else if($request->param_status_realisasi == "belum_realisasi"){
            $t_bimbingan = t_bimbingan::where('status_approval','!=', '')->where('status_realisasi','')->where('id_guru', Auth::user()->email)->get();  

        }else if($request->param_status_realisasi == "kadaluarsa"){
            $t_bimbingan = t_bimbingan::where('status_approval','!=', '')->where('status_kadaluarsa','!=','')->where('id_guru', Auth::user()->email)->get();  
        }
        
        return DataTables::of($t_bimbingan)->make(true);
    }

    public function getall_transaksi_realisasi_keterangan(){

        $list_ket_realisasi = mstr_ket_realisasi::where('id_realisasi','!=','1')->where('id_realisasi','!=','')->get();     
        return response()->json(['list_ket_realisasi' => $list_ket_realisasi] );    

    }

    public function set_respon_realisasi(Request $request){
        
        try{
            $return =   t_bimbingan::where('id', $request->txt_id_pengajuan)->update(
                ['status_realisasi' => $request->txt_status_realisasi,
                'keterangan_realisasi' =>$request->txt_tak_terjadi_realisasi,
                'tgl_realisasi' => Carbon::now('Asia/Jakarta')->toDateTimeString()]);
            $result = ($return == 1)? "S":"F";
            $message = "-";
        }
        catch(Exception $e){
            $result = "E";
            $message = $e->getMessage();
        }
              
        return response()->json(['code' =>  $result, 'message' =>$message] );
    }

    //getall_transaksi_realisasi_bimbingan
    // == end func realisasi =============================
    /*
     public function download($id) 
    {  
        $assessment = Assessment::where('id',$id)->get();
        Excel::create('Laravel Excel', function($excel) use ($assessment) {

            $excel->sheet('Excel sheet', function($sheet) use ($assessment) {
                $sheet->loadView('contents.assessment_details')->with('assessment',$assessment);
                $sheet->setOrientation('landscape');
            });
        })->export('xls');
   }
    */
    public function export_data_bimbingan(){
        return Excel::download(new BimbinganPengajuanExport, 'pengajuan.xlsx');
       
    }
}
