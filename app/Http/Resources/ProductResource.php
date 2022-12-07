<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'category_id' => $this->category_id,
            'img' => $this->img,
            'description' => $this->description,
            'content' => $this->content,
            'sale_price' => $this->sale_price,
            'old_price' => $this->old_price,
            'quantity' => $this->quantity,
        ];
    }
}
