<?php

namespace App\Domains\Orders\Models\Traits\Relationship;

use App\Domains\Orders\Models\Orders;
use App\Domains\Products\Models\Products;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class OrderItemsRelationship.
 */
trait OrderItemsRelationship
{
    /**
     * Get the order associated with the Item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function order(): HasOne
    {
        return $this->hasOne(Orders::class, 'id', 'order_id');
    }

    /**
     * Get the product associated with the Item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product(): HasOne
    {
        return $this->hasOne(Products::class, 'id', 'product_id');
    }
}
