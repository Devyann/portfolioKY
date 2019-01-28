<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $table = 'pages';
    
    protected $fillable = ['name'];
    
    public function header(){
        
        return $this->hasOne('App\Headers');
        
    }
    
    public function posts(){
        
        return $this->hasMany('App\Posts');
        
    }
}
