<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'email' => $this->email,
            'surname' => $this->surname,
            'isactive' => $this->isactive,
            'isvalid' => $this->isvalid,
            'isbanned' => $this->isbanned,
            'email_verified_at'=>$this->email_verified_at,
            $this->mergeWhen(!empty($this->store) , function ()
            {
                return ['store' => new StoreResource($this->store)];
            }),
            'roles' => $this->getRoleNames(),
            'iduser' => $this->id,
            'mainphoto' => PhotoResource::collection($this->profilephoto),
        ];

    }
}
