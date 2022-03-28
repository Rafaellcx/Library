<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RentDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'rent_id' => $this->rent_id,
            'rent_status' => $this->rent_status,
            'book_id' => $this->book_id,
            'book_title' => $this->book_title,
            'book_price' => $this->book_price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];

    }
}
