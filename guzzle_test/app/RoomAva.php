<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class RoomAva extends Model
{
    
    use SoftDeletes;
    protected $fillable=[
        'startdate','enddate','price','extrabed_price','room_id'

    ];
    public function room(){
        return $this->belongsTo('App\Room','room_id');
    }
}
