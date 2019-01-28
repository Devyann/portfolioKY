<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
   protected $table = 'posts';
   
   public function page(){
       
       return $this->belongsTo('App\Pages');
       
   }
}
