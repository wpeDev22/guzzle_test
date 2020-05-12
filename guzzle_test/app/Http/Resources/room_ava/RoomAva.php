<?php

namespace App\Http\Resources\room_ava;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomAva extends JsonResource
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
            'startdate' => $this->startdate,
            'enddate' => $this->enddate,
            'price' => $this->price,
            'extrabed_price'=> $this->extrabed_price,
            'room_id' => $this->room_id,
            'room' => $this->room? $this->room: '',


        ];
    }
}
