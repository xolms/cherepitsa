<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles() {
        return $this->belongsToMany('App\Role', 'users_roles', 'user_id', 'role_id');
    }

    /**
     * @return bool
     */
    public function isEmployee() {
        $roles = $this->roles()->toArray();
        return !empty($roles);
    }

    /**
     * @param $check
     * @return bool
     */
    public function hasRole($check) {
        return in_array($check, array_pluck($this->roles->toArray(), 'name'));
    }

    /**
     * @param $array
     * @param $term
     * @return bool|int|string
     */
    private function getIdInArray($array, $term) {
        foreach ($array as $key => $value) {
            if($value == $term) {
                return $key + 1;
            }
        }
        return false;
    }
}
