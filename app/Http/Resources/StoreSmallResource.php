<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoreSmallResource extends JsonResource
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
            'iduser' => $this->user->id, //for chat purposes
            'businessname' => $this->businessname,
            'mainphoto' => PhotoResource::collection($this->user->profilephoto),
            'categorycode' => $this->categorycode
            ];
    }
}
