<?php 
namespace App\Http\Composers;
use Illuminate\Contracts\View\View;
use App\webpages;

class SidebarComposer{
    public function compose(View $view){
        //$view->with('Webpages',webpages::all());

        $view->with('Webpages',webpages::where('status', 'active')
        ->orderBy('nama', 'asc')
        ->get());

    }
}