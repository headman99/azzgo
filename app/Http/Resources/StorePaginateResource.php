<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class StorePaginateResource extends ResourceCollection
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
            'stores' =>  StoreResource::collection($this),
            'count' => $this->count(),
            'total' => $this->total(),
            'prev' => $this->currentPage() > 1 ? $this->currentPage() : null,
            'next' => $this->currentPage() < $this->lastPage() ? $this->currentPage() + 1 : null
        ];
    }
}