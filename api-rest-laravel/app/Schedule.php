<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'schedules';
    protected $fillable = [
        'contributor_id', 'date', 'schedule'
    ];
    public $timestamps = true;

    public function contributor() {
        return $this->belongsTo('App\Contributor');
    }
}
