<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RequestHistoryPublisherResource extends JsonResource
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
            'publisher' => new StoreResource($this->store),
            'closed_at' => $this->closed_at,
            'status' => $this->status
            //'productcount' => $this->productcount
        ];
    }
}
