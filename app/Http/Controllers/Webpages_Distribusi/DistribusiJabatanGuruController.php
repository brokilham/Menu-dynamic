<?php
namespace App\Http\Controllers\Webpages_Distribusi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\mstr_jabatan;
use App\mstr_guru;

class DistribusiJabatanGuruController extends Controller
{
    public function index()
    {
        return view('backend.webpages_distribusi.distribusi_jabatan.main');
    }

    public function get_select_option_guru_jabatan(){
  
        //$list_guru = mstr_guru::where('status', 'active');
        //$list_jabatan = mstr_jabatan::where('status', 'active');
        $list_guru = mstr_guru::ALL();
        $list_jabatan = mstr_jabatan::ALL();
        return response()->json(['list_guru' => $list_guru, 'list_jabatan' =>$list_jabatan] );
        
    }


    public function create(Request $request){
       /* DB::beginTransaction();
    
       try
        {
   
            $mstr_siswa = new mstr_siswa;      
            $mstr_siswa->id = $request->txt_sis_nis;
            $mstr_siswa->id_walimurid = "7777";
            $mstr_siswa->nama = $request->txt_sis_nama;
            $mstr_siswa->alamat = $request->txt_sis_alamat;
            $mstr_siswa->path_foto = $request->txt_sis_path_foto;
            $mstr_siswa->hobi = $request->txt_sis_hobi;
            $mstr_siswa->jenis_kelamin = $request->txt_sis_jenis_kelamin;
            $mstr_siswa->email = $request->txt_sis_email;
            $mstr_siswa->no_telp = $request->txt_sis_no_telp;
            $mstr_siswa->status = "active";
            $mstr_siswa->created_by =  Auth::user()->id;
            $mstr_siswa->save();

            $mstr_walimurid = new mstr_walimurid;  
            $mstr_walimurid->id = "7777";
            $mstr_walimurid->id_siswa = $request->txt_sis_nis;  
            $mstr_walimurid->nama = $request->txt_wal_nama;  
            $mstr_walimurid->alamat = $request->txt_sis_alamat;  
            $mstr_walimurid->path_foto = "this dummy path foto";  
            $mstr_walimurid->hub_keluarga = $request->txt_wal_family;  
            $mstr_walimurid->pekerjaan = $request->txt_wal_pekerjaan;  
            $mstr_walimurid->jenis_kelamin = $request->txt_wal_jenis_kelamin;  
            $mstr_walimurid->email = $request->txt_Wal_email;  
            $mstr_walimurid->no_telp = $request->txt_wal_no_telp;  
            $mstr_walimurid->save();

            $result = (($mstr_siswa == TRUE) && ($mstr_walimurid == TRUE))? "S":"F";
            $message = "-";
        }
        catch(Exception $e){
            DB::rollback();
            $result = "E";
            $message = $e->getMessage();
        }

        DB::commit();                 
        return response()->json(['code' => $result, 'message' =>$message] );*/
    }

    public function update(Request $request){
      
    }

    public function delete(Request $request){
   
    }

    public function getall_mstr_siswa(){
        
        //$mstr_siswa = mstr_siswa::where('status', 'active');

        //return DataTables::of($mstr_siswa)->make(true);
    }
}
