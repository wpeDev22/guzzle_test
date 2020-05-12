<?php

namespace App\Http\Resources\agent_fee;

use Illuminate\Http\Resources\Json\JsonResource;

class AgentFee extends JsonResource
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
            'fees' => $this->fees,
            'type' => $this->type,
            'user_id' => $this->user_id,
            'user' => $this->user ? $this->user :"",
          
        ];
    }
}
