<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;
use Symfony\Component\Finder\SplFileInfo;

class ImageRepository {
    
    public function store($request)
    {
        // Save image
        $path = basename ($request->image->store('images'));

        // Save thumb
        $image = InterventionImage::make ($request->image)->widen (500)->encode ();
        Storage::put ('thumbs/' . $path, $image);
       
    }
    public function getAllImages()
    {
        $bg_imgs = \File::files('images');
        $imgs_array = array();
        foreach ($bg_imgs as $bg_img){

            $imgs_array[] = pathinfo($bg_img);
            
        }
//        dd($imgs_array);
        
        return $imgs_array;
    }
    
}

