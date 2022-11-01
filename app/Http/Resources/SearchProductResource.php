<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SearchProductResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->pricelist->price,
            'type' => $this->type,
            'mainphoto' => PhotoResource::collection($this->mainphoto),
            'photos' => PhotoResource::collection($this->photos),
            $this->mergeWhen(!empty($this->productcategory) && !empty($this->productcategory->description), function ()
            {
                return ['category' =>   $this->productcategory->description];
            }),
            'ispublished' => $this->ispublished,
            'offer' => $this->pricelist->activeoffer,
            'publisher' => new StoreResource($this->store),
            $this->mergeWhen(auth('api')->check(), function ()
            {
                return['isfavourite' => !empty($this->isfavourite(auth('api')->user()->id))];
            }),
            $this->mergeWhen(!(auth('api')->check()), function ()
            {
                return['isfavourite' => false];
            })
        ];
    }
}
