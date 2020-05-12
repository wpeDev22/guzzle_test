<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Room extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'room_name','extrabed','hotels_id'

    ];
    public function hotel(){
        return $this->belongsTo('App\Hotel','hotels_id');
    }
}
