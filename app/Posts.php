<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
   protected $table = 'posts';
   
   protected $fillable = ['post_title', 'post_subtitle', 'pages_id', 'content', 'links', 'order'];
   
   public function page(){
       
       return $this->belongsTo('App\Pages', 'pages_id');
       
   }
}
