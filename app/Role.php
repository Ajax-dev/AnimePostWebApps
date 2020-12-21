<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Get the user's that have this role
     */
    public function users() {
        return $this->belongsToMany('App\User', 'role_user');
    }
}
