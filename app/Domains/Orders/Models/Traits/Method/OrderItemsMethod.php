<?php

namespace App\Domains\Orders\Models\Traits\Method;

/**
 * Trait OrderItemsMethod.
 */
trait OrderItemsMethod
{
    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->price * $this->count;
    }
}
