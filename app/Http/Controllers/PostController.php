<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Pages;
use App\Image;
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
        $images = Image::all();
        return view('admin/posts/create', ['pages' => $pages,
                                            'images' => $images]);
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
            'linkA' => 'url|max:255|nullable',
            'linkB' => 'url|max:255|nullable',
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
        
        if ($request->bg_url !=  'none') $post->image_id = (int) $request->bg_url;
        
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
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::find($id);
        $linkA = null;
        $linkB = null;
        if ($post->links){

            $links = json_decode($post->links);
            $links_count = count($links);
            
            for ($i = 0; $i < $links_count; $i++){
                
                if ($i % 2 == 0){
                    $linkA = $links[$i];
                }
                else {
                    $linkB = $links[$i];
                }
            }
        }
        
        $pages = Pages::all();
        $images = Image::all();
        
        return view('admin/posts/edit', ['post' => $post,
                                            'pages' => $pages,
                                            'images' => $images,
                                            'linkA' => $linkA,
                                            'linkB' => $linkB,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        dd($request->all());
        $request->validate([
            'post_title' => 'required|unique:posts,post_title,' . $id,
            'post_subtitle' => 'required|unique:posts,post_title,' . $id,
            'page_id' => 'required|integer',
            'content' => 'required',
            'bg_url' => 'nullable',
            'linkA' => 'url|max:255|nullable',
            'linkB' => 'url|max:255|nullable',
            'nameLinkA' => 'required_with:linkA',
            'nameLinkA' => 'required_with:linkB',
        ]);
        
        $links = array();
        if (isset($request->linkA)){
            
            $links[] = array('name' => $request->nameLinkA,
                             'href' => $request->linkA);
            
        }
        if (isset($request->linkB)){
            
            $links[] = array('name' => $request->nameLinkB,
                             'href' => $request->linkB);
            
        }
        $post = Posts::find($id);
        $post->post_title = $request->post_title;
        $post->post_subtitle = $request->post_subtitle;
        $post->pages_id = $request->page_id;
        $post->image_id = ($request->bg_url == 'none') ? null : $request->bg_url;
        $post->content = $request->content;
        $post->links = json_encode($links);
        $post->save();
        
        return redirect('/admin/posts/' . $id);
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
