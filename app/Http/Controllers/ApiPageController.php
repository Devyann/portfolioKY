<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pages;


class ApiPageController extends Controller
{
    private $route = '';
    
    public function index($route){
        
        switch ($route){
            
            case 'home':
                $this->route = $route;
                return $this->home();
                break;
            default :
                return $this->home();
        }
    }
    
    protected function home(){
        
        $home = Pages::where('name', 'home')->first();
        $header = $home->header;
        $posts = $home->posts;
        $page = array(array('header' => $header), array('posts' => $posts));
        return response()->json($page);
    }
}
