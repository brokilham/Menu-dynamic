<?php
namespace App\Http\Controllers\Webpages_Bimbingan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\t_bimbingan;
use App\mstr_siswa;
use App\mstr_ket_realisasi;
use auth;
use DataTables;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DataPendukungBimbingan extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        return view('backend.webpages_transaksi_bimbingan.history_bimbingan.main');
    }


    // memanggil list siwa yang pernah melakukan bimbingan
    public function get_all_siswa_with_bimbingan_history(){
       /*$list_siswa_bimbingan = DB::select("SELECT 
                        t_bimbingans.id_siswa, nama, kelas, ruang
                    FROM
                        t_bimbingans
                            LEFT JOIN
                        mstr_siswas ON t_bimbingans.id_siswa = mstr_siswas.id
                            LEFT JOIN
                        (SELECT 
                            id_kelas, id_siswa, kelas, ruang
                        FROM
                            t_distribusi_kelas
                        LEFT JOIN mstr_kelas ON t_distribusi_kelas.id_kelas = mstr_kelas.id) AS kelas ON t_bimbingans.id_siswa = kelas.id_siswa
                    GROUP BY t_bimbingans.id_siswa , nama , kelas , ruang
                    ORDER BY t_bimbingans.id_siswa ASC");*/

        $list_siswa_bimbingan = DB::select("  SELECT 
                    t_bimbingans.id_siswa, nama, kelas, ruang, max(t_bimbingans.updated_at) AS last_date
                FROM
                    t_bimbingans
                        LEFT JOIN
                    mstr_siswas ON t_bimbingans.id_siswa = mstr_siswas.id
                        LEFT JOIN
                    (SELECT 
                        id_kelas, id_siswa, kelas, ruang
                    FROM
                        t_distribusi_kelas
                    LEFT JOIN mstr_kelas ON t_distribusi_kelas.id_kelas = mstr_kelas.id) AS kelas ON t_bimbingans.id_siswa = kelas.id_siswa
                GROUP BY t_bimbingans.id_siswa , nama , kelas , ruang
                ORDER BY t_bimbingans.id_siswa ASC");
                  
       
       //$list_siswa_bimbingan = t_bimbingan::with('mstr_siswa')->get();
       return DataTables::of($list_siswa_bimbingan)->make(true);
       //return response()->json(['list_siswa_bimbingan' => $list_siswa_bimbingan] );    
   
    }

    public function get_detail_bimbingan_history($IdSiswa){
        //$mstr_siswa = mstr_siswa::where('status', 'active')->where('id', $IdSiswa)->first();;
        //return view('backend.webpages_master_data.master_siswa.view-detail')->with( 'datas',$mstr_siswa);
        $mstr_siswa = mstr_siswa::where('status', 'active')->where('id', $IdSiswa)->first();;
        $t_bimbingan = t_bimbingan::where('id_siswa', $IdSiswa)->get();

        //$view->with( 'datas', ['Webpages' => $Webpages]);  
        //return view('backend.webpages_transaksi_bimbingan.history_bimbingan.detail_history_bimbingan')->with( 'datas',$mstr_siswa);;
        return view('backend.webpages_transaksi_bimbingan.history_bimbingan.detail_history_bimbingan')->with( 'datas',['mstr_siswa' => $mstr_siswa,'t_bimbingan' => $t_bimbingan]);;
    } 
}
