<?php

namespace App\Http\Resources\township;

use Illuminate\Http\Resources\Json\JsonResource;

class Township extends JsonResource
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
            'township_name' => $this->township_name,
            'cities_id' => $this->cities_id,
            'cities' => $this->city? $this->city:'',
          
        ];
    }
}
