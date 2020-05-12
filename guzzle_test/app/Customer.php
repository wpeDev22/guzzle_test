<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Customer extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'customer_address',
        'customer_phone',
        'customer_info',
        'user_id',     
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
