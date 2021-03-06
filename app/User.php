<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\Comment as EmailComment;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relationships between the User and their respective posts and comments
     */
    public function posts() {
        return $this -> hasMany('App\AnimePost');
    }

    public function comments() {
        return $this -> hasMany('App\Comment');
    }

    public function notify($notification) {
        return new EmailComment($notification);
    }
    /**
     * Get the user's image.
     */
    public function image() {
        return $this->morphOne('App\Image', 'imageable');
    }

    /**
     * Get the user's roles
     */
    public function roles() {
        return $this->belongsToMany('App\Role', 'role_user');
    }
}
