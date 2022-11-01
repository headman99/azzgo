<?php

namespace App\Http\Resources;

use App\Enums\UserMarkTypeEnum;
use Illuminate\Http\Resources\Json\JsonResource;

class RequestMarkResource extends JsonResource
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
            'marker' => $this->markertype == UserMarkTypeEnum::CUSTOMER ? new UserResource($this->markeruser) : new StoreResource($this->markeruser->store),
            'markertype' => $this->markertype,
            'marked' => $this->markedtype == UserMarkTypeEnum::CUSTOMER ? new UserResource($this->markeduser) : new StoreResource($this->markeduser->store),
            'markedtype' => $this->markedtype,
            'comment' => $this->comment,
            'status' => $this->status,
            'created' => $this->created_at,
            'last_update' => $this->updated_at
        ];
    }
}
