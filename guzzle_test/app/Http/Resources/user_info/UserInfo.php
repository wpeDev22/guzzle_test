<?php

namespace App\Http\Resources\user_info;

use Illuminate\Http\Resources\Json\JsonResource;

class UserInfo extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       
        return [
            'id' => $this->id,
            'user_type' => $this->user_type,
            'user_phone' => $this->user_phone,   
            'user_wechat' => $this->user_wechat,    
            'user_viber'  => $this->user_viber,
            'user_website'  => $this->user_website,
            'user_id' => $this->user_id,
            'user_name' => $this->user ? $this->user->name :'' ,
        ];
    }
}
