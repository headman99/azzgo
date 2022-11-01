<?php

namespace App\Http\Resources;

use App\Enums\ProductTypeEnum;
use Illuminate\Http\Resources\Json\JsonResource;

class RequestProductResource extends JsonResource
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
            'requestcode' => $this->requestcode,
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
            $this->mergeWhen(!empty($this->product->type) && $this->product->type == ProductTypeEnum::SERVICE, function ()
            {
                return ['appointmentdate' =>   $this->appointmentdate,
                        'appointmenttime' => $this->appointmentime];
            }),
            'ispublished' => $this->product->ispublished,
            'offer' => $this->product->pricelist->activeoffer
        ];
    }
}
