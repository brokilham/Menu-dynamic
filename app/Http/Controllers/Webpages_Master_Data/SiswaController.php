<?php
namespace App\Http\Controllers\Webpages_Master_Data;
use App\Http\Controllers\Controller;
use App\mstr_siswa;
use App\mstr_walimurid;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use auth;
use DataTables;
use Exception;
use App\User;
use Storage;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('backend.webpages_master_data.master_siswa.main');
    }

    public function create(Request $request){
        DB::beginTransaction();
        $dt = \Carbon\Carbon::now();      
        $id_walimurid = $dt->format('Ymds');

       try
        {
            $DataExist = mstr_siswa::where('id', $request->txt_sis_nis)->first();
            if($DataExist == null){
                $file = $request->file('txt_sis_path_foto');
                $path = $file->storeAs('public/gambar', $request->txt_sis_nis.".".$file->getClientOriginalExtension());
                //Storage::move('storage/'.$path, 'public/'.$path);

                $mstr_siswa = new mstr_siswa;      
                $mstr_siswa->id = $request->txt_sis_nis;
                $mstr_siswa->id_walimurid = $id_walimurid.$request->txt_sis_nis;
                $mstr_siswa->nama = $request->txt_sis_nama;
                $mstr_siswa->alamat = $request->txt_sis_alamat;
                $mstr_siswa->path_foto =  "gambar/".$request->txt_sis_nis.".".$file->getClientOriginalExtension(); //$path; 
                $mstr_siswa->hobi = $request->txt_sis_hobi;
                $mstr_siswa->jenis_kelamin = $request->txt_sis_jenis_kelamin;
                $mstr_siswa->email = $request->txt_sis_email;
                $mstr_siswa->no_telp = $request->txt_sis_no_telp;
                $mstr_siswa->status = "active";
                $mstr_siswa->created_by =  Auth::user()->id;
                $mstr_siswa->save();

                $mstr_walimurid = new mstr_walimurid;  
                $mstr_walimurid->id = $id_walimurid.$request->txt_sis_nis;
                $mstr_walimurid->mstr_siswa_id = $request->txt_sis_nis;  
                $mstr_walimurid->nama = $request->txt_wal_nama;  
                $mstr_walimurid->alamat = $request->txt_sis_alamat;  
                $mstr_walimurid->path_foto = "-";  
                $mstr_walimurid->hub_keluarga = $request->txt_wal_family;  
                $mstr_walimurid->pekerjaan = $request->txt_wal_pekerjaan;  
                $mstr_walimurid->jenis_kelamin = $request->txt_wal_jenis_kelamin;  
                $mstr_walimurid->email = $request->txt_Wal_email;  
                $mstr_walimurid->no_telp = $request->txt_wal_no_telp;  
                $mstr_walimurid->save();

            
                $UserSiswa =  new User;
                $UserSiswa->name = $request->txt_sis_nama;
                $UserSiswa->email = $request->txt_sis_nis;
                $UserSiswa->password = Hash::make($request->txt_sis_nis);
                $UserSiswa->login_as = "siswa";
                $UserSiswa->login_at = "mobile";
                $UserSiswa->status = "non_active";
                $UserSiswa->save();

                $UserWalimurid =  new User;
                $UserWalimurid->name = $request->txt_wal_nama;
                $UserWalimurid->email = $id_walimurid.$request->txt_sis_nis;
                $UserWalimurid->password = Hash::make($id_walimurid.$request->txt_sis_nis);
                $UserWalimurid->login_as = "walimurid";
                $UserWalimurid->login_at = "mobile";
                $UserWalimurid->status = "non_active";
                $UserWalimurid->save();

                if(($mstr_siswa == TRUE) && ($mstr_walimurid == TRUE)
                &&($UserSiswa==TRUE) && ($UserWalimurid ==TRUE)){
                    DB::commit(); 
                    $result = "S";
                    $message = "-";
                }
                else{
                    DB::rollback();
                    $result = "F";
                    $message = "Terjadi kesalahan saat proses penyimpanana!!!";
                }
            }
            else{
                $mstr_siswa =   mstr_siswa::where('id', $request->txt_sis_nis)->update(
                    ['status' => 'active']
                );

                if($mstr_siswa == TRUE){
                    DB::commit(); 
                    $result = "S";
                    $message = "-";
                }
                else{
                    DB::rollback();
                    $result = "F";
                    $message = "Terjadi kesalahan saat proses penyimpanana!!!";
                }
            }
            

      
        }
        catch(Exception $e){
            DB::rollback();
            $result = "E";
            $message = $e->getMessage();
        }
                
        return response()->json(['code' => $result, 'message' =>$message] );
    }

    public function update(Request $request){
        DB::beginTransaction();
        try{
             
            //txt_sis_updt_foto
            
            $mstr_siswa =   mstr_siswa::where('id', $request->txt_sis_updt_nis)->update(
                ['nama' => $request->txt_sis_updt_nama,
                'alamat' => $request->txt_sis_updt_alamat,
                'hobi' => $request->txt_sis_updt_hobi,
                'jenis_kelamin' => $request->txt_sis_updt_jenis_kelamin,
                'no_telp' =>  $request->txt_sis_updt_no_telp,
                'email' => $request->txt_sis_updt_email]);

             
            $mstr_walimurid =   mstr_walimurid::where('id', $request->txt_walimurid_updt_id)->update(
                ['nama' => $request->txt_walimurid_updt_nama,
                'alamat' => $request->txt_walimurid_updt_alamat,
                'hub_keluarga' => $request->txt_walimurid_updt_hub_keluarga,
                'pekerjaan' => $request->txt_walimurid_updt_pekerjaan,
                'jenis_kelamin' => $request->txt_walimurid_updt_jenis_kelamin,
                'email' => $request->txt_walimurid_updt_email,
                'no_telp' =>  $request->txt_walimurid_updt_no_telp]);
            
                if($mstr_siswa == 1 && $mstr_walimurid == 1){
                    DB::commit(); 
                    $result = "S";
                    $message = "-";
                }
                else{
                    DB::rollback();
                    $result = "F";
                    $message = "Terjadi kesalahan saat proses penyimpanana!!!";
                }
                
          }
          catch(Exception $e){
                DB::rollback();
              $result = "E";
              $message = $e->getMessage();
          }
              
          return response()->json(['code' =>  $result, 'message' =>$message] );
    }

    public function delete(Request $request){
        try{
           
            $return =   mstr_siswa::where('id', $request->id)->update(
                ['status'=>'non_actve']);
            $result = ($return == 1)? "S":"F";
            $message = "-";
          }
          catch(Exception $e){
              $result = "E";
              $message = $e->getMessage();
          }
              
          return response()->json(['code' =>  $result, 'message' =>$message] );
    }

    public function getall_mstr_siswa(){
        
        $mstr_siswa = mstr_siswa::where('status', 'active');

        return DataTables::of($mstr_siswa)->make(true);
    }

    public function get_detail_mstr_siswa($IdSiswa){
        $mstr_siswa = mstr_siswa::where('status', 'active')->where('id', $IdSiswa)->first();;
        return view('backend.webpages_master_data.master_siswa.view-detail')->with( 'datas',$mstr_siswa);
        
        /*$mstr_siswa = mstr_siswa::where('status', 'active')->where('id', $IdSiswa)->get();
        return view('backend.webpages_master_data.master_siswa.view-detail')->with( 'datas', ['mstr_siswa' => $mstr_siswa]);  */    
    }

    public function get_detail_mstr_siswa2(Request $request){
        $mstr_siswa = mstr_siswa::where('status', 'active')->where('id', $request->id)->with('mstr_walimurid')->first();;
        return response()->json(['mstr_siswa' =>  $mstr_siswa]);  
    }

}
