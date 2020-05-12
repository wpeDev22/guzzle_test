<?php

namespace App\Http\Resources\customer;

use Illuminate\Http\Resources\Json\JsonResource;

class Customer extends JsonResource
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
            'customer_address' => $this->customer_address,
            'customer_phone' => $this->customer_phone,   
            'customer_info' => $this->customer_info, 
            'user_id' => $this->user_id,
            'user_name'=> $this->user ? $this->user->name :'',
        ];
    }
}
