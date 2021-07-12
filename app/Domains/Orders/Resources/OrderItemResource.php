<?php

namespace App\Domains\Orders\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class OrderItemResource.
 */
class OrderItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->product->name,
            'avatar' => $this->product->avatar,
            'description' => $this->product->description,
            'price' => $this->price,
            'count' => $this->count,
        ];
    }
}
