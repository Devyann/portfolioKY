<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Headers extends Model
{
    protected $table = 'headers';
    
    public function page(){
        return $this->belongsTo('App\Pages');
        
    }
}
