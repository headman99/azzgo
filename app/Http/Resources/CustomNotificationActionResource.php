<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomNotificationActionResource extends JsonResource
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
            'id' => $this->notificationid,
            'userid' => $this->userid,
            'type' => $this->type,
            'notification' => new NotificationActionResource($this->notificationaction),
            'title' => $this->title,
            'description'  => $this->description,
            'extrafield' => $this->extrafield,
            'isread'  => $this->isread
        ];
    }
}
