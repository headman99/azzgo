<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductFavouriteResource extends JsonResource
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
            'id' => $this->product->id,
            'title' => $this->product->title,
            'description' => $this->product->description,
            'type' => $this->product->type,
            'price' => $this->product->pricelist->price,
            'mainphoto' => PhotoResource::collection($this->product->mainphoto),
            'photos' => PhotoResource::collection($this->product->photos),
            $this->mergeWhen(!empty($this->product->productcategory) && !empty($this->product->productcategory->description), function ()
            {
                return ['category' =>   $this->product->productcategory->description];
            }),
            'ispublished' => $this->product->ispublished,
            $this->mergeWhen(!empty($this->product->pricelist) && !empty($this->product->pricelist->activeoffer), function ()
            {
                return ['offer' => new OfferResource($this->product->pricelist->activeoffer)];
            }),
            'publisher' => new StoreResource($this->product->store)
            // inserimento di flag isfavourite (da parlarne con franco)
        ];
    }
}
