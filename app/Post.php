<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Define the relationships between the (Anime) Post model and Comment and User and Tag
     */
    public function comments() {
        return $this -> hasMany('App\Comment');
    }

    public function user() {
        return $this -> belongsTo('App\User');
    }

    public function tags() {
        return $this -> belongsToMany('App\Tag', 'post_tag');
    }

    /**
     * Get this post's image
     */
    public function image() {
        return $this->morphOne('App\Image', 'imageable');
    }
}
