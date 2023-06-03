<?php

namespace App\Http\Resources\Repository;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

        public function toArray($request): array
        {
            return [
                'id'      => $this->id ,
                'name' => $this->description,
                'price'  => $this->price,
                'quantity_in_stock' => $this->quantity_in_stock,
                'details' => $this->details,
                'category_id' => $this->category_id,
                'employee_id' => $this->employee_id,
                
            ];
        }
    }

