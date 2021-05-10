<?php

namespace App\Domains\Orders\Models\Traits\Method;

/**
 * Trait OrdersMethod.
 */
trait OrdersMethod
{
    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }
}
