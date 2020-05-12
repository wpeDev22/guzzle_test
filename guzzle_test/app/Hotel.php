<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Hotel extends Model
{
   
    use SoftDeletes;
    protected $fillable=[
        'hotel_name',
        'hotel_phone',
        'hotel_image',
        'hotel_address',
        'hotel_email',
        'hotel_website',
        'cities_id',
        'townships_id',
    ];

    public function city()
    {
        return $this->belongsTo('App\City','cities_id');
    }
    public function township()
    {
        return $this->belongsTo('App\Township','townships_id');
    }
}

