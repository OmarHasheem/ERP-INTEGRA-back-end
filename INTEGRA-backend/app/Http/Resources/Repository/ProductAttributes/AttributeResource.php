<?php

namespace App\Http\Resources\Repository\ProductAttributes;

use Illuminate\Http\Resources\Json\JsonResource;

class AttributeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        dd(parent::toArray($request));
        return [
            'id' => $this->id,
            'name' => $this->name,
            'group_name' => $this->group_name,
            'values' => [
                $this->attribute_values
            ]
        ];
    }
}
