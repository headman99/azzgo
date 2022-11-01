<?php

namespace App\Http\Resources;

use App\Enums\ProductTypeEnum;
use Illuminate\Http\Resources\Json\JsonResource;

class RequestReverseProductFromOfferResource extends JsonResource
{
    /**
     * TO BE DELETED
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->pricelist->product->id,
            'requestcode' => $this->pricelist->product->requestcode,
            'title' => $this->pricelist->product->title,
            'description' => $this->pricelist->product->description,
            'type' => $this->pricelist->product->type,
            'price' => $this->pricelist->price,
            'mainphoto' => PhotoResource::collection($this->pricelist->product->mainphoto),
            'photos' => PhotoResource::collection($this->pricelist->product->photos),
            $this->mergeWhen(!empty($this->pricelist->product->productcategory) && !empty($this->pricelist->product->productcategory->description), function ()
            {
                return ['category' =>   $this->pricelist->product->productcategory->description];
            }),
            $this->mergeWhen(!empty($this->pricelist->product->type) && $this->pricelist->product->type == ProductTypeEnum::SERVICE, function ()
            {
                return ['appointmentdate' =>   $this->appointmentdate,
                    'appointmenttime' => $this->appointmentime];
            }),
            'ispublished' => $this->pricelist->product->ispublished,
            'offer' => $this->pricelist->activeoffer
        ];
    }
}
