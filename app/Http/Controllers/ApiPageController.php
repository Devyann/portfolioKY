<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pages;
use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;


class ApiPageController extends Controller
{
    private $route = '';
    
    public function index($route){
        
        $this->route = $route;
        
        switch ($route){
            
            case 'home':
                
                return $this->home();
                
                break;
            
            case 'skills':
                
                return $this->skills();
                
                break;
            
            case 'contact':
                
                return $this->contact($request);
                
                break;
            
            default :
                return $this->home();
        }
    }
    
    protected function home(){
        
        $home = Pages::where('name', 'home')->first();
        $header = $home->header;
//        return response()->json($header);
        $bgUrl = (!empty($header->image)) ? $header->image->imagepath : '';
        $rounded_image = (!empty($header->rounded_image)) ? $header->rounded_image->imagepath : '';
        $header = array('siteTitle' => $header['site_title'], 'siteSubtitle' => $header['site_subtitle'], 'bgUrl' => $bgUrl, 'rounded_image' => $rounded_image);
        $posts = $home->posts;

        $computed_posts = array();
        foreach ($posts as $post) {
            
            $post = array('title' => $post['post_title'],
                          'subtitle' => $post['post_subtitle'],
                          'content' => $post['content'], 
                          'links' => json_decode($post['links']),
                          'bg_image' => $post->image['imagepath']
                );
            
            $computed_posts[] = $post;
        }
        $page = array('header' => $header, 'posts' => $computed_posts);
        return response()->json($page);
    }
    protected function skills(){
        
        $skills = Pages::where('name', 'skills')->first();
//        return response()->json($skills->image->imagepath);
        $image = $skills->image->imagepath;
        $bgUrl = (!empty($image)) ? $image : '';
        $posts = $skills->posts;
        $page = array('bg_url' => $bgUrl, 'posts' => $posts);
        $datas = array('coucou');
        return response()->json($page);
        
    }
    protected function contact(Request $request){
        
//        dd($request->all()); // tableau associatif
//        return response()->json($request->all());
        $jsonData = $request->validate([
            'name' => 'bail|required|max:50',
            'surname' => 'bail|required|max:50',
            'email' => 'bail|required',
            'company' => 'nullable',
            'message' => 'bail|required|min:50|max:4000'
        ]);
        dd($jsonData);
        Mail::to('yannkhe@gmail.com')
            ->send(new Contact($request->all()));
        
    }
}
