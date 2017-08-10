<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users() {
        return $this->hasMany('App\User', 'users_roles', 'user_id');
    }
}
