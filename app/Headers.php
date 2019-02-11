<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Headers extends Model
{
    protected $table = 'headers';
    
    protected $fillable = ['site_title', 'site_subtitle', 'pages_id', 'image_id'];
    
    public function page(){
        
        return $this->belongsTo('App\Pages', 'pages_id');
        
    }
    public function image(){
        
        return $this->belongsTo('App\Image');
        
    }
}
