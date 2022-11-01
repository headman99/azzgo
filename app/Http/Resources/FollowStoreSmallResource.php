<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FollowStoreSmallResource extends JsonResource
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
            'id' => $this->store->id,
            'iduser' => $this->user->id, //for chat purposes
            'businessname' => $this->store->businessname,
            'mainphoto' => PhotoResource::collection($this->store->user->profilephoto),
            'categorycode' => $this->store->categorycode
        ];
    }
}
