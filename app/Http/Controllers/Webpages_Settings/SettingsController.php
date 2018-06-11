<?php

namespace App\Http\Controllers\Webpages_Settings;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\mstr_privilages;
use auth;
use DataTables;
use Exception;

class SettingsController extends Controller
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
    {
        return view('backend.webpages_settings.master_privilages.main');
    }

    public function create(Request $request){
      
        try
        {
           
            $mstr_privilages = new mstr_privilages;
            $mstr_privilages->name = $request->txt_name;
            $mstr_privilages->created_by =  Auth::user()->email;
            //$mstr_privilages->status = $request->txt_status;
            $mstr_privilages->status = "active";  
            $mstr_privilages->save();
            
            $result = ($mstr_privilages == TRUE)? "S":"F";
            $message = "-";
        }
        catch(Exception $e){
            $result = "E";
            $message = $e->getMessage();
        }
            
        return response()->json(['code' => $result, 'message' =>$message] );
    }

    public function update(Request $request){
        try{
           
            $return =   mstr_privilages::where('id', $request->txt_status_id_updt)->update(['name' => $request->txt_name_updt]);
            $result = ($return == 1)? "S":"F";
            $message = "-";
          }
          catch(Exception $e){
              $result = "E";
              $message = $e->getMessage();
          }
              
          return response()->json(['code' =>  $result, 'message' =>$message] );
    }

    // master tidak bisa di delete hanya bisa du update status menjadi non active
    public function delete(Request $request){
        try{
           
          $return =   mstr_privilages::where('id', $request->id)->update(['status' => 'non_active']);
          $result = ($return == 1)? "S":"F";
          $message = "-";
        }
        catch(Exception $e){
            $result = "E";
            $message = $e->getMessage();
        }

        return response()->json(['code' =>  $result, 'message' =>$message] );
    }

    public function getall_mstr_privilages(){
        $mstr_privilages = mstr_privilages::where('status', 'active');

        /*$mstr_privilages = mstr_privilages::where('u_id', '=', $userid)
            ->where('status', '=', 'active')
            ->select('id', 'name', 'created_at', 'updated_at', 'created_by', 'status')
            ->get();*/ 

        return DataTables::of($mstr_privilages)->make(true);
    }
   
}
