<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
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
        ];
    }
}
