<?php
namespace App\Http\Controllers\Webpages_Bimbingan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\t_bimbingan;
use auth;
use DataTables;
use Exception;


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
    
    public function getall_transaksi_pengajuan_bimbingan(){
             
        $t_bimbingan = t_bimbingan::where('status_approval', '')->where('id_guru', Auth::user()->email)->get();  
        return DataTables::of($t_bimbingan)->make(true);
    }

    public function set_respon_pengajuan(Request $request){
        try{
            $return =   t_bimbingan::where('id', $request->txt_id_pengajuan)->update(
                ['status_approval' => $request->txt_status_approval,
                'keterangan_approval_pengajuan' =>$request->txt_tolak_pengajuan]);
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

    //getall_transaksi_realisasi_bimbingan
    // == end func realisasi =============================

  
}
