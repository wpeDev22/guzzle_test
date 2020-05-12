<?php

namespace App\Http\Resources\hotel;

use Illuminate\Http\Resources\Json\JsonResource;

class Hotel extends JsonResource
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
            'hotel_name' => $this->hotel_name,
            'hotel_phone' => $this->hotel_phone,
            'hotel_image' => $this->hotel_image,
            'hotel_address' => $this->hotel_address,
            'hotel_email' => $this->hotel_email,
            'hotel_website' => $this->hotel_website,
            'cities_id' => $this->cities_id,
            'townships_id' => $this->townships_id,   
            'cities_name' => $this->city? $this->city->city_name : '',
            'townships_name' => $this->township? $this->township->township_name : '',       
        ];
    }
}
