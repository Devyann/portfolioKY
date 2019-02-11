<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    
    protected $fillable =  ['imagepath', 'thumbpath'];
    
    public function page(){
        
        return $this->hasMany('App\Pages');
        
    }
    public function header(){
        
        return $this->hasMany('App\Headers');
        
    }
    public function post(){
        
        return $this->hasMany('App\Posts');
        
    }
}
