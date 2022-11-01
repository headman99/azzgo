<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerCompleteResource extends JsonResource
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
            'name' => $this->name,
            'surname' => $this->surname,
            $this->mergeWhen(!empty($this->contacts) , function ()
            {
                return ['contacts' => ContactResource::collection($this->contacts)];
            }),
            $this->mergeWhen(!empty($this->profilephoto) , function ()
            {
                return ['mainphoto' => PhotoResource::collection($this->profilephoto)];
            })
        ];
    }
}
