<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RequestResource extends JsonResource
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
            'productcount' => $this->productcount
        ];
    }
}
