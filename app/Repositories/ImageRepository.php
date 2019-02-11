<?php

namespace App\Repositories;

use App\Image;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;
use Symfony\Component\Finder\SplFileInfo;

class ImageRepository {
    
    public function store($request)
    {
//        dd($request->image->extension());
        $extension = '.' . $request->image->extension();
        $imageName = $request->nom_image . $extension;
        // Save image
        $path = basename ($request->image->storeAs('images', $imageName));

        // Save thumb
        $image = InterventionImage::make ($request->image)->widen (500)->encode ();
        Storage::put ('thumbs/' . $path, $image);
        
        // Save in base
        $image = new Image;
        $image->thumbpath = 'thumbs/' . $path;
        $image->imagepath = 'images/' . $path;
        $image->name = $request->nom_image;
        $image->save();
       
    }
    
    public function getAllImages()
    {

        return Image::paginate (config ('app.pagination'));
        
    }
    
    public function delete($image){
        
        Storage::delete($image->imagepath);
        Storage::delete($image->thumbpath);
        
        
    }
    
}

