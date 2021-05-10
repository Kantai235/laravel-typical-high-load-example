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

    /**
     * @return array
     */
    public function getPayment(): array
    {
        return json_decode($this->payment, true);
    }

    /**
     * @return array
     */
    public function getInvoice(): array
    {
        return json_decode($this->invoice, true);
    }
}
