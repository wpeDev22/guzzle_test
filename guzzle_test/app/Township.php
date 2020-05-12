<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Township extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'township_name','cities_id'
    ];
    public function city()
    {
        return $this->belongsTo('App\City','cities_id');
    }
}
