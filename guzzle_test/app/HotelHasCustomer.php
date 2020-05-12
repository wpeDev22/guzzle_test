<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class HotelHasCustomer extends Model
{
      
    use SoftDeletes;
    protected $fillable=[
        'hotels_id',
        'hotels_cities_id',
        'hotels_townships_id',
        'customers_id',       
    ];

    public function hotel() {
    	return $this->belongsTo('App\Hotel','hotels_id');
    }
    public function city() {
    	return $this->belongsTo('App\City','hotels_cities_id');
    }
    public function township() {
    	return $this->belongsTo('App\Township','hotels_townships_id');
    }
    public function customer() {
        return $this->belongsTo('App\Customer','customers_id');
    }


}
