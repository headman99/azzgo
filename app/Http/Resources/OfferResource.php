<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OfferResource extends JsonResource
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
            'pricelistid' => $this->pricelistid,
            'startdate' => $this->startdate,
            'endate' => $this->endate,
            'price' => $this->price,
            'isactive' => $this->isactive,
            'percent' => $this->percent
        ];
    }
}
