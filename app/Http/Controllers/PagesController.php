<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pages;
use App\Image;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Pages::all();
        $images = Image::all();
        $success = (session('success')) ? session('success') : false;
        $error = (session('error')) ? session('error') : false;

        $datas = array('pages' => $pages,
                        'images' => $images);
        
        if ($success != false) $datas['success'] = $success;
        if ($error != false) $datas['error'] = $error;

        return view('admin/pages/index', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $images = Image::all();
        
        return view('admin/pages/create',
                ['images' => $images]);
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
            'name' => 'required|unique:pages|max:255',
          ]);
        $page = new Pages([
            'name' => $request->name,
          ]);
        if ($request->bg_url !=  'none') $page->image_id = (int) $request->bg_url;
        if($page->save()) {
            
            return redirect('admin/pages')->with('success', 'Page ajoutée');
            
        } else {
            
            return redirect('admin/pages')->with('error', 'La page n\'a pas pu être créer');
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'voir une page';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'éditer une page';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Pages::find($id);
        $page->delete();

        return redirect('/admin/pages')->with('success', 'La page a bien été supprimée');
    }
}
