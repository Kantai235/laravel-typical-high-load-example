<?php

namespace App\Domains\Orders\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class OrderResource.
 */
class OrderResource extends JsonResource
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
            'uuid' => $this->uuid,
            'number' => $this->number,
            'type' => $this->type,
            'active' => $this->active,
            'price' => $this->price,
            'payment' => $this->payment,
            'items' => OrderItemResource::collection($this->items),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
