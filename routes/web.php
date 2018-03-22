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
