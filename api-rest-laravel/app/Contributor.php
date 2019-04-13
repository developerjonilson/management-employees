<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contributor extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'contributors';
    protected $fillable = [
        'cpf', 'pis', 'position', 'team'
    ];
    public $timestamps = true;

    public function user() {
        return $this->morphOne('App\User', 'userable');
    }

    public function schedules() {
        return $this->hasMany('App\Schedule');
    }
}
