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
        'name', 'email', 'password', 'userable_id', 'userable_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getMasterAttribute() {
        if($this->userable_type == 'App\Master') return $this->userable;
        
        return null;
    }

    public function getContributorAttribute() {
        if($this->userable_type == 'App\Contributor') return $this->userable;
        
        return null;
    }
    
    public function userable() {
        return $this->morphTo();
    }

    // public function contributor() {
    //     return $this->hasOne(Contributor::class, 'id', 'userable_id')
    //         ->where('userable_type', Contributor::class);
    // }
}
