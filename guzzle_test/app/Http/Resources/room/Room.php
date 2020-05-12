<?php

namespace App\Http\Resources\room;

use Illuminate\Http\Resources\Json\JsonResource;

class Room extends JsonResource
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
            'room_name' => $this->room_name,
            'extrabed' => $this->extrabed,
            'hotels_id' => $this->hotels_id,
            'hotel' => $this->hotel ? $this->hotel: '',


        ];
    }
}
