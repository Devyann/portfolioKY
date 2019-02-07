<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Pages;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts= Posts::all();
        $success = (session('success')) ? session('success') : false;
        $error = (session('error')) ? session('error') : false;
        
        foreach ($posts as $post){
            
            $post->links = json_decode($post->links);
            $post = $post->page;
        }
        $datas = array('posts' => $posts);
        if ($success != false) $datas['success'] = $success;
        if ($error != false) $datas['error'] = $error;

        return view('admin/posts/index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Pages::all();

        return view('admin/posts/create', ['pages' => $pages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'post_title' => 'required|unique:posts|max:255',
            'post_subtitle' => 'required|unique:posts|max:255',
            'pages_id' => 'required|integer',
            'content' => 'required',
            'linkA' => 'url|max:255',
            'linkB' => 'url|max:255',
            'nameLinkA' => 'required_with:linkA',
            'nameLinkA' => 'required_with:linkB',
        ]);
        
        // - affecter ordre article
        $ordre = Posts::where('pages_id', $request->pages_id)
                            ->orderBy('order',  'desc')
                            ->select('order')
                            ->first();
        $ordre = ($ordre) ? $ordre->order++ : 1;

        // todo 
        // - générer json champs links
        $links = array();
        if (isset($request->linkA)){
            
            $links[] = array('name' => $request->nameLinkA,
                             'href' => $request->linkA);
            
        }
        if (isset($request->linkB)){
            
            $links[] = array('name' => $request->nameLinkB,
                             'href' => $request->linkB);
            
        }
        $post = new Posts([
            'post_title' => $request->post_title,
            'post_subtitle' => $request->post_subtitle,
            'pages_id' => $request->pages_id,
            'content' => $request->content,
            'order' => $ordre, 
            'links' => json_encode($links)
          ]);
        dd($post);
        if($post->save()) {
            
            return redirect('admin/posts')->with('success', 'Article ajouté');
            
        } else {
            
            return redirect('admin/posts')->with('error', 'L\'article n\'a pas pu être créer');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $posts)
    {
        //
    }
}
