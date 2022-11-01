<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InfoBoxResouce extends JsonResource
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
            'name' => $this->user->name,
            'surname' => $this->user->surname,
            'shippingaddress' => $this->shippingaddress,
            'contacts' => ContactResource::collection($this->user->contacts)
        ];
    }
}
