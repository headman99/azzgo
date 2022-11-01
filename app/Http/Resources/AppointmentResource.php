<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
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
            'requestcode' => $this->requestcode,
            'appointmentdate' => $this->appointmentdate,
            'appointmentime' => $this->appointmentime,
            'appointmentenddate' => $this->appointmentenddate,
            'appointmentendtime' => $this->appointmentendtime,
            'title' => $this->product->title,
            'user' => $this->user->surname . ' ' . $this->user->name
        ];
    }
}
