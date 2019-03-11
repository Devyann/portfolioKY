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
//        return response()->json($header);
        $bgUrl = (empty($header->image)) ? $header->image->imagepath : '';
        $rounded_image = (empty($header->rounded_image)) ? $header->rounded_image->imagepath : '';
        $header = array('siteTitle' => $header['site_title'], 'siteSubtitle' => $header['site_subtitle'], 'bgUrl' => $header->image->imagepath, 'rounded_image' => $header->rounded_image->imagepath);
        $posts = $home->posts;
        $computed_posts = array();
        foreach ($posts as $post) {
            
            $post = array('title' => $post['post_title'],
                          'subtitle' => $post['post_subtitle'],
                          'content' => $post['content'], 
                          'links' => json_decode($post['links'])
                );
            
            $computed_posts[] = $post;
        }
        $page = array('header' => $header, 'posts' => $computed_posts);
        return response()->json($page);
    }
}
