<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Userinfo extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'user_type',
        'user_phone',
        'user_wechat',
        'user_viber',
        'user_website',
        'user_id',    
    ];
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
