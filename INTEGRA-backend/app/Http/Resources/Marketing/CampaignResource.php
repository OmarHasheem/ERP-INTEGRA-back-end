<?php

namespace App\Http\Resources\Marketing;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CampaignResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            "id"               =>$this->id ,
            'name'             =>$this->name ,
            'description'      =>$this->description ,
            'start_date'       =>$this->start_date ,
            'end_date'         =>$this->end_date ,
            'budget'           =>$this->budget ,
            'status'           =>$this->status ,
            'expected_revenue' =>$this->expected_revenue ,
            'actual_revenue'   =>$this->actual_revenue,
                       

      ];
    }
}
