<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function comment(){
        return $this->belongsToMany('App\Comment');
    }

    public function tags(){
        return $this->belongsToMany('App/Tag');
    }
}
