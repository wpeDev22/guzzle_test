<?php

namespace App\Http\Resources\user_info;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserInfoCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       return[
           'success' => true,
           'data' => $this->collection,
       ];
    }
}
