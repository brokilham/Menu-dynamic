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

Route::get('/home', 'HomeController@index')->name('home');

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