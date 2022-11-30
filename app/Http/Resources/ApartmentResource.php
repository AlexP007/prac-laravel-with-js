<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApartmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
            return  [
                'address' => $this->address,
                'city' => $this->city,
                'metro' => $this->metro,
                'price' => $this->price,
                'id' => $this->id,
                'user_id' =>$this->user_id,
                'rooms' => $this->rooms,
                'meters' => $this->meters,
                'images' => [],
        ];

    }
}
