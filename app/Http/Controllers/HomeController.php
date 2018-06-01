<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        //$Pelanggaran =  DB::select(' select Id_Siswa, Nama,  COUNT(*) Jumlah_Pelanggaran from v_data_pelanggaran where   Created_Time between :AwalMingguIni and :AkhirMingguIni group by Id_Siswa order by Jumlah_Pelanggaran desc limit 10' ,['AwalMingguIni' => $AwalMingguIni,'AkhirMingguIni' => $AkhirMingguIni]);
        
        $Bimbingan =  DB::select("SELECT 
                                        COUNT(CASE
                                            WHEN status_realisasi = '1' AND month(tgl_realisasi) = '5' THEN id
                                            ELSE null
                                        END) AS Realisasi_bimbingan_all_this_month,
                                        COUNT(CASE
                                            WHEN status_realisasi = '1' AND month(tgl_realisasi) = '5' THEN id
                                            ELSE null
                                        END) AS Realisasi_bimbingan_all_this_week
                                    FROM
                                        laravel_dynamic_menu.t_bimbingans");


        $Pelanggaran =  DB::select("SELECT 
                                    COUNT(CASE
                                        WHEN MONTH(tanggal_kejadian) = '5' THEN Id
                                        ELSE NULL
                                    END) AS Pelangaran_all_this_month,
                                    COUNT(CASE
                                        WHEN MONTH(tanggal_kejadian) = '5' THEN Id
                                        ELSE NULL
                                    END) AS Pelanggaran_all_this_week
                                    FROM
                                    laravel_dynamic_menu.t_pelanggarans;");
        
        return view('backend.home')->with('datas',['bimbingan' => $Bimbingan,'pelanggaran' => $Pelanggaran]);
    }

    public function get_pelanggaran_in_year(){
        $pelanggaran = DB::select("SELECT 
                            COUNT(CASE
                                WHEN MONTH(tanggal_kejadian) = '1' THEN Id
                                ELSE NULL
                            END) AS jan,
                            COUNT(CASE
                                WHEN MONTH(tanggal_kejadian) = '2' THEN Id
                                ELSE NULL
                            END) AS feb,
                            COUNT(CASE
                                WHEN MONTH(tanggal_kejadian) = '3' THEN Id
                                ELSE NULL
                            END) AS mar,
                            COUNT(CASE
                                WHEN MONTH(tanggal_kejadian) = '4' THEN Id
                                ELSE NULL
                            END) AS apr,
                            COUNT(CASE
                                WHEN MONTH(tanggal_kejadian) = '5' THEN Id
                                ELSE NULL
                            END) AS mei,
                            COUNT(CASE
                                WHEN MONTH(tanggal_kejadian) = '6' THEN Id
                                ELSE NULL
                            END) AS jun,
                            COUNT(CASE
                                WHEN MONTH(tanggal_kejadian) = '7' THEN Id
                                ELSE NULL
                            END) AS jul,
                            COUNT(CASE
                                WHEN MONTH(tanggal_kejadian) = '8' THEN Id
                                ELSE NULL
                            END) AS agu,
                            COUNT(CASE
                                WHEN MONTH(tanggal_kejadian) = '9' THEN Id
                                ELSE NULL
                            END) AS sep,
                            COUNT(CASE
                                WHEN MONTH(tanggal_kejadian) = '10' THEN Id
                                ELSE NULL
                            END) AS okt,
                            COUNT(CASE
                                WHEN MONTH(tanggal_kejadian) = '11' THEN Id
                                ELSE NULL
                            END) AS nov,
                            COUNT(CASE
                                WHEN MONTH(tanggal_kejadian) = '12' THEN Id
                                ELSE NULL
                            END) AS des
                        FROM laravel_dynamic_menu.t_pelanggarans WHERE YEAR(tanggal_kejadian) = '2018';");
    
        return response()->json(['pelanggaran' =>  $pelanggaran] );

    }


    public function get_bimbingan_in_year(){
        $bimbingan = DB::select("SELECT 
                                    COUNT(CASE
                                        WHEN status_realisasi = '1' AND month(tgl_realisasi) = '1' THEN id
                                        ELSE null
                                    END) AS jan,
                                    COUNT(CASE
                                        WHEN status_realisasi = '1' AND month(tgl_realisasi) = '2' THEN id
                                        ELSE null
                                    END) AS feb,
                                    COUNT(CASE
                                        WHEN status_realisasi = '1' AND month(tgl_realisasi) = '3' THEN id
                                        ELSE null
                                    END) AS mar,
                                    COUNT(CASE
                                        WHEN status_realisasi = '1' AND month(tgl_realisasi) = '4' THEN id
                                        ELSE null
                                    END) AS apr,
                                    COUNT(CASE
                                        WHEN status_realisasi = '1' AND month(tgl_realisasi) = '5' THEN id
                                        ELSE null
                                    END) AS mei,
                                    COUNT(CASE
                                        WHEN status_realisasi = '1' AND month(tgl_realisasi) = '6' THEN id
                                        ELSE null
                                    END) AS jun,
                                    COUNT(CASE
                                        WHEN status_realisasi = '1' AND month(tgl_realisasi) = '7' THEN id
                                        ELSE null
                                    END) AS jul,
                                    COUNT(CASE
                                        WHEN status_realisasi = '1' AND month(tgl_realisasi) = '8' THEN id
                                        ELSE null
                                    END) AS agu,
                                    COUNT(CASE
                                        WHEN status_realisasi = '1' AND month(tgl_realisasi) = '9' THEN id
                                        ELSE null
                                    END) AS sep,
                                    COUNT(CASE
                                        WHEN status_realisasi = '1' AND month(tgl_realisasi) = '10' THEN id
                                        ELSE null
                                    END) AS okt,
                                    COUNT(CASE
                                        WHEN status_realisasi = '1' AND month(tgl_realisasi) = '11' THEN id
                                        ELSE null
                                    END) AS nov,
                                    COUNT(CASE
                                        WHEN status_realisasi = '1' AND month(tgl_realisasi) = '12' THEN id
                                        ELSE null
                                    END) AS des
                                    
                                FROM
                                    laravel_dynamic_menu.t_bimbingans WHERE YEAR(tgl_realisasi) = '2018';");
    
        return response()->json(['bimbingan' =>  $bimbingan] );
    }

    
}
