<?php

namespace App\Domains\Products\Models\Traits\Method;

/**
 * Trait ProductsMethod.
 */
trait ProductsMethod
{
    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param  bool  $size
     *
     * @return mixed|string
     * @throws \Creativeorange\Gravatar\Exceptions\InvalidEmailException
     */
    public function getAvatar($size = null)
    {
        return 'https://gravatar.com/avatar/' . md5(strtolower(trim($this->email))) . '?s=' . config('boilerplate.avatar.size', $size) . '&d=mp';
    }
}
