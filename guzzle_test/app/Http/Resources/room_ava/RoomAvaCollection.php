<?php

namespace App\Http\Resources\room_ava;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RoomAvaCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'success'=> true,
            'data' => $this->collection,
        ];
    }
}
