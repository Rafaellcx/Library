<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RentResource extends JsonResource
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
            'devolution_date' => $this->devolution_date_formatted,
            'client_id' => $this->client_id,
            'client_full_name' => $this->client_full_name,
            'status' => $this->status,
            'total_rent_price' =>$this->total_price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];

    }
}
