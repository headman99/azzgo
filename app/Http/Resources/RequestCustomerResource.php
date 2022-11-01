<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RequestCustomerResource extends JsonResource
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
            'groupcode' => $this->groupcode,
            'customer' => new CustomerRequestResource($this->user),
            'productcount' => $this->productcount
        ];
    }
}
