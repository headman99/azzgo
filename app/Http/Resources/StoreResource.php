<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
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
            'vatnumber' => $this->vatnumber,
            'nickname' => $this->nickname,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'atecocode' => $this->atecocode,
            'contacts' => ContactResource::collection($this->user->contacts),
            'mainphoto' => PhotoResource::collection($this->user->profilephoto),
            'categorycode' => $this->categorycode,
            'isactive'=> $this->user->isactive
        ];
    }
}
