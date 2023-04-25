<?php

namespace App\Http\Resources\Marketing;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'name'    => $this->name ,
            'gender'  => $this->age,
            'address' => $this->address,
            'email'   => $this->email,
            'phone'   => $this->phone,
            'lead_id' => $this->lead_id,
        ];
    }
}
