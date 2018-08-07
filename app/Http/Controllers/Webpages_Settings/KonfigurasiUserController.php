<?php

namespace App\Http\Controllers\Webpages_Settings;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use auth;
use DataTables;
use Exception;

class KonfigurasiUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('backend.webpages_settings.konfigurasi_user.main');
    }

    public function getall_list_user(){
        
        $User = User::where('status', 'active');

        return DataTables::of($User)->make(true);
    }

    public function update_password(Request $request){
        try{
           
            $return =   User::where('email', $request->txt_username)->update(['password' => Hash::make($request->txt_password)]);
            $result = ($return == 1)? "S":"F";
            $message = "-";
          }
          catch(Exception $e){
              $result = "E";
              $message = $e->getMessage();
          }
              
          return response()->json(['code' =>  $result, 'message' =>$message] );
    }
}
