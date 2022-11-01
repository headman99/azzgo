<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RequestHistoryConsumerResource extends JsonResource
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
            'closed_at' => $this->closed_at,
            'status' => $this->status
            //'productcount' => $this->productcount
        ];
    }
}
