<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgentFee extends Model
{
     use SoftDeletes;
    protected $fillable=[
        'fees','type','user_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    
    
}
