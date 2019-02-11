<?php

namespace App\Http\Controllers;

use App\Headers;
use App\Pages;
use App\Image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Finder\SplFileInfo;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $headers = Headers::all();
        $success = (session('success')) ? session('success') : false;
        $error = (session('error')) ? session('error') : false;

        $datas = array('headers' => $headers);

        if ($success != false) $datas['success'] = $success;
        if ($error != false) $datas['error'] = $error;
//        dd($headers);
        return view('admin/headers/index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Pages::all();

        $bg_imgs = Image::all();
        

        return view('admin/headers/create', ['images' => $bg_imgs,
                                             'pages' => $pages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'site_title' => 'required|unique:headers|max:255',
            'site_subtitle' => 'required|unique:headers|max:255',
            'pages_id' => 'required|integer'
        ]);
        $header = new Headers([
            'site_title' => $request->site_title,
            'site_subtitle' => $request->site_subtitle,
            'pages_id' => $request->page_id,
            'image_id' => $request->bg_url
          ]);
        if($header->save()) {
            
            return redirect('admin/headers')->with('success', 'En-tête ajoutée');
            
        } else {
            
            return redirect('admin/headers')->with('error', 'L\'en-tête n\'a pas pu être créer');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Headers  $headers
     * @return \Illuminate\Http\Response
     */
    public function show(Headers $headers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Headers  $headers
     * @return \Illuminate\Http\Response
     */
    public function edit(Headers $headers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Headers  $headers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Headers $headers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Headers  $headers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $header = Headers::find($id);
        $header->delete();

        return redirect('/admin/headers')->with('success', 'L\'en-tête a bien été supprimée');
    }
}
