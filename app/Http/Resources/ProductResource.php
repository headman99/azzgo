<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $otherDate = Carbon::parse($this->updated_at);
        $nowDate = Carbon::now()->addDays(2);
        $isvetrina = $otherDate->gt($nowDate);

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'type' => $this->type,
            $this->mergeWhen(!empty($this->pricelist) && !empty($this->pricelist->price), function ()
            {
                return ['price' => $this->pricelist->price];
            }),
            'mainphoto' => PhotoResource::collection($this->mainphoto),
            'photos' => PhotoResource::collection($this->photos),
            $this->mergeWhen(!empty($this->productcategory) && !empty($this->productcategory->description), function ()
            {
                return ['category' =>   $this->productcategory->description];
            }),
            'ispublished' => $this->ispublished,
            $this->mergeWhen(!empty($this->pricelist) && !empty($this->pricelist->activeoffer), function ()
            {
                return ['offer' => new OfferResource($this->pricelist->activeoffer)];
            }),
            'publisher' => new StoreResource($this->store),
            'isvetrina' => $isvetrina
        ];
    }
}
