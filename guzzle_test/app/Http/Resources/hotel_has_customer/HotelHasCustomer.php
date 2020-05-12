<?php

namespace App\Http\Resources\hotel_has_customer;

use Illuminate\Http\Resources\Json\JsonResource;

class HotelHasCustomer extends JsonResource
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
            'hotels_id' => $this->hotels_id,           
            'hotels_cities_id' => $this->hotels_cities_id,            
            'hotels_townships_id' => $this->hotels_townships_id,
            'customers_id' => $this->customers_id,
            'city' => $this->city ? $this->city: '',
            'township' => $this->township ? $this->township: '',
            'hotel' => $this->hotel ? $this->hotel: '',
            'customer' => $this->customer ? $this->customer : '',
              
        ];
    }
}
