<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * Define the relationships between the (Anime)Tag model and (Anime)Post
     */
    public function posts()
    {
        return $this->belongsToMany('App\Post', 'post_tag');
    }
}
