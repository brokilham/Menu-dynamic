<?php 
namespace App\Http\Composers;
use Illuminate\Contracts\View\View;
use App\webpages;
use App\users;
use auth;
//use App\privilage_webpages;

class SidebarComposer{
    public function compose(View $view){
      
        $id_main_menus = array();
        $user = Auth::user();
        foreach($user->privilage_webpages as $privilage_webpages){
            $id_main_menus[] = $privilage_webpages->id_main_menu;
        }        
        
        $Webpages = webpages::where('status', 'active')->whereIn('id', $id_main_menus)->orderBy('nama', 'asc')->get();
        $view->with( 'datas', ['Webpages' => $Webpages]);      

    }
}