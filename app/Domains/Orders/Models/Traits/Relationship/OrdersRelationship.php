<?php

namespace App\Domains\Orders\Models\Traits\Relationship;

use App\Domains\Orders\Models\OrderItems;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class OrdersRelationship.
 */
trait OrdersRelationship
{
    /**
     * Get all of the items for the Order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items(): HasMany
    {
        return $this->hasMany(OrderItems::class, 'order_id', 'id');
    }
}
