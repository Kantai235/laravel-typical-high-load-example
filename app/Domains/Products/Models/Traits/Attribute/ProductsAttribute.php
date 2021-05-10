<?php

namespace App\Domains\Products\Models\Traits\Attribute;

/**
 * Trait ProductsAttribute.
 */
trait ProductsAttribute
{
    /**
     * @return mixed
     */
    public function getAvatarAttribute()
    {
        return $this->getAvatar();
    }
}
