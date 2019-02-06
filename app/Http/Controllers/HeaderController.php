<?php

namespace App\Http\Controllers;

use App\Headers;
use Illuminate\Http\Request;

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
        
        foreach ($headers as $header){
            
            $img_name = explode('/', $header->bg_url);
            $img_name = array_pop($img_name);
            $header->bg_url = $img_name;
            $header = $header->page;
            
        }
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
        return view('admin/headers/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(Headers $headers)
    {
        //
    }
}
