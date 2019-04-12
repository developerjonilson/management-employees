<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'masters';
    protected $fillable = ['is_master'];
    public $timestamps = false;

    public function user() {
        return $this->morphOne('App\User', 'userable');
    }
}
