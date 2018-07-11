<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home')
Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'dashboard'],function(){
    Route::get('/get_pelanggaran_in_year','HomeController@get_pelanggaran_in_year');
    Route::get('/get_bimbingan_in_year','HomeController@get_bimbingan_in_year');
});

Route::group(['prefix' => 'master_privilages'],function()
{
    Route::get('/main_master','Webpages_Settings\SettingsController@index');
    Route::get('/getall_mstr_privilages','Webpages_Settings\SettingsController@getall_mstr_privilages');
    Route::post('/create','Webpages_Settings\SettingsController@create');
    Route::post('/update','Webpages_Settings\SettingsController@update');
    Route::post('/delete','Webpages_Settings\SettingsController@delete');
});

Route::group(['prefix' => 'master_kelas'],function()
{
    Route::get('/main_master','Webpages_Master_Data\KelasController@index');
    Route::get('/getall_mstr_kelas','Webpages_Master_Data\KelasController@getall_mstr_kelas');
    Route::post('/create','Webpages_Master_Data\KelasController@create');
    Route::post('/update','Webpages_Master_Data\KelasController@update');
    Route::post('/delete','Webpages_Master_Data\KelasController@delete');
});

Route::group(['prefix' => 'master_jabatan'],function()
{
    Route::get('/main_master','Webpages_Master_Data\JabatanController@index');
    Route::get('/getall_mstr_jabatan','Webpages_Master_Data\JabatanController@getall_mstr_jabatan');
    Route::post('/create','Webpages_Master_Data\JabatanController@create');
    Route::post('/update','Webpages_Master_Data\JabatanController@update');
    Route::post('/delete','Webpages_Master_Data\JabatanController@delete');
});

Route::group(['prefix' => 'master_guru'],function()
{
    Route::get('/main_master','Webpages_Master_Data\GuruController@index');
    Route::get('/getall_mstr_guru','Webpages_Master_Data\GuruController@getall_mstr_guru');
    Route::post('/create','Webpages_Master_Data\GuruController@create');
    Route::post('/update','Webpages_Master_Data\GuruController@update');
    Route::post('/delete','Webpages_Master_Data\GuruController@delete');
});

Route::group(['prefix' => 'master_siswa'],function()
{
    Route::get('/main_master','Webpages_Master_Data\SiswaController@index');
    Route::get('/getall_mstr_siswa','Webpages_Master_Data\SiswaController@getall_mstr_siswa');
    Route::get('/get_detail_mstr_siswa/{IdSiswa}','Webpages_Master_Data\SiswaController@get_detail_mstr_siswa');
    Route::get('/get_detail_mstr_siswa2','Webpages_Master_Data\SiswaController@get_detail_mstr_siswa2');
    Route::post('/create','Webpages_Master_Data\SiswaController@create');
    Route::post('/update','Webpages_Master_Data\SiswaController@update');
    Route::post('/delete','Webpages_Master_Data\SiswaController@delete');
});


Route::group(['prefix' => 'master_jadwal'],function()
{
    Route::get('/main_master','Webpages_Master_Data\JadwalController@index');
    Route::get('/get_all_mstr_jadwal','Webpages_Master_Data\JadwalController@get_all_mstr_jadwal');
    Route::get('/get_all_mstr_jam','Webpages_Master_Data\JadwalController@get_all_mstr_jam');
    Route::post('/create','Webpages_Master_Data\JadwalController@create');
    Route::post('/update','Webpages_Master_Data\JadwalController@update');
    Route::post('/delete','Webpages_Master_Data\JadwalController@delete');
});

Route::group(['prefix' => 'distribusi_jabatan'],function()
{
    Route::get('/main_distribusi_jabatan','Webpages_Distribusi\DistribusiJabatanGuruController@index');
    Route::get('/get_select_option_guru_jabatan','Webpages_Distribusi\DistribusiJabatanGuruController@get_select_option_guru_jabatan');   
    Route::get('/get_select_option_jabatan_single','Webpages_Distribusi\DistribusiJabatanGuruController@get_select_option_jabatan_single');   
    Route::get('/getall_distribusi_jabatan','Webpages_Distribusi\DistribusiJabatanGuruController@getall_distribusi_jabatan');     
    Route::post('/create','Webpages_Distribusi\DistribusiJabatanGuruController@create');
    Route::post('/update','Webpages_Distribusi\DistribusiJabatanGuruController@update');
    Route::post('/delete','Webpages_Distribusi\DistribusiJabatanGuruController@delete');
});


Route::group(['prefix' => 'distribusi_walikelas'],function()
{
    Route::get('/main_distribusi_walikelas','Webpages_Distribusi\DistribusiWalikelasController@index');
    Route::get('/get_select_option_walikelas_kelas','Webpages_Distribusi\DistribusiWalikelasController@get_select_option_walikelas_kelas');   
    Route::get('/getall_distribusi_walikelas','Webpages_Distribusi\DistribusiWalikelasController@getall_distribusi_walikelas');     
    Route::get('/get_select_option_kelas_single','Webpages_Distribusi\DistribusiWalikelasController@get_select_option_kelas_single');   
    Route::post('/create','Webpages_Distribusi\DistribusiWalikelasController@create');
    Route::post('/update','Webpages_Distribusi\DistribusiWalikelasController@update');
    Route::post('/delete','Webpages_Distribusi\DistribusiWalikelasController@delete');
});

Route::group(['prefix' => 'distribusi_jadwal'],function()
{
    Route::get('/main_distribusi_jadwal','Webpages_Distribusi\DistribusiJadwalController@index');
    Route::post('/get_all_mstr_jam','Webpages_Distribusi\DistribusiJadwalController@get_all_mstr_jam');
    Route::get('/get_all_mstr_hari','Webpages_Distribusi\DistribusiJadwalController@get_all_mstr_hari');
    Route::get('/get_all_distribusi_jadwal','Webpages_Distribusi\DistribusiJadwalController@get_all_distribusi_jadwal');
    Route::post('/create','Webpages_Distribusi\DistribusiJadwalController@create');
    Route::post('/delete','Webpages_Distribusi\DistribusiJadwalController@delete');
});

Route::group(['prefix' => 'distribusi_kelas'],function()
{                                                           
    Route::get('/main_distribusi_kelas','Webpages_Distribusi\DistribusiKelasSiswaController@index');
    Route::get('/get_select_option_siswa_kelas','Webpages_Distribusi\DistribusiKelasSiswaController@get_select_option_siswa_kelas');   
    Route::get('/get_select_option_kelas_single','Webpages_Distribusi\DistribusiKelasSiswaController@get_select_option_kelas_single');   
    Route::get('/getall_distribusi_kelas','Webpages_Distribusi\DistribusiKelasSiswaController@getall_distribusi_kelas');     
    Route::post('/create','Webpages_Distribusi\DistribusiKelasSiswaController@create');
    Route::post('/update','Webpages_Distribusi\DistribusiKelasSiswaController@update');
    Route::post('/delete','Webpages_Distribusi\DistribusiKelasSiswaController@delete');
});


Route::group(['prefix' => 'transaksi_pelanggaran'],function()
{                                                           
    Route::get('/main_transaksi_pelanggaran','Webpages_Pelanggaran\TransaksiPelanggaran@index');
    Route::get('/get_select_option_siswa','Webpages_Pelanggaran\TransaksiPelanggaran@get_select_option_siswa');
    Route::get('/getall_transaksi_pelanggaran','Webpages_Pelanggaran\TransaksiPelanggaran@getall_transaksi_pelanggaran');     
    Route::post('/create','Webpages_Pelanggaran\TransaksiPelanggaran@create');
    Route::post('/delete','Webpages_Pelanggaran\TransaksiPelanggaran@delete');
 });



Route::group(['prefix' => 'transaksi_bimbingan'],function()
{      
    // == begin route pengajuan =============================                                                     
     Route::get('/main_transaksi_pengajuan_bimbingan','Webpages_Bimbingan\TransaksiBimbingan@index');
     Route::get('/getall_transaksi_pengajuan_bimbingan','Webpages_Bimbingan\TransaksiBimbingan@getall_transaksi_pengajuan_bimbingan');     
     Route::post('/set_respon_pengajuan','Webpages_Bimbingan\TransaksiBimbingan@set_respon_pengajuan');
     
     // == end route pengajuan ===============================
    
    
    // == begin route realisasi =============================
    Route::get('/main_transaksi_realisasi_bimbingan','Webpages_Bimbingan\TransaksiBimbingan@index2');
    Route::get('/getall_transaksi_realisasi_bimbingan','Webpages_Bimbingan\TransaksiBimbingan@getall_transaksi_realisasi_bimbingan');     
    Route::get('/getall_transaksi_realisasi_keterangan','Webpages_Bimbingan\TransaksiBimbingan@getall_transaksi_realisasi_keterangan');     
    Route::post('/set_respon_realisasi','Webpages_Bimbingan\TransaksiBimbingan@set_respon_realisasi');
    // == end route realisasi =============================== 


    // == begin route data history bimbingan=============================
    Route::get('/main_data_log_bimbingan','Webpages_Bimbingan\DataPendukungBimbingan@index');
    Route::get('/get_all_siswa_with_bimbingan_history','Webpages_Bimbingan\DataPendukungBimbingan@get_all_siswa_with_bimbingan_history');
    Route::get('/get_detail_bimbingan_history/{IdSiswa}','Webpages_Bimbingan\DataPendukungBimbingan@get_detail_bimbingan_history');
   
    // == end route data history bimbingan ===============================
  
    
 });