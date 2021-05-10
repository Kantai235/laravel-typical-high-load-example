<?php

namespace App\Domains\Products\Models;

use App\Domains\Products\Models\Traits\Attribute\ProductsAttribute;
use App\Domains\Products\Models\Traits\Method\ProductsMethod;
use App\Domains\Products\Models\Traits\Scope\ProductsScope;
use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Products.
 */
class Products extends Model
{
    use Uuid,
        HasFactory,
        SoftDeletes,
        ProductsAttribute,
        ProductsMethod,
        ProductsScope;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'uuid',
        'name',
        'avatar',
        'description',
        'active',
        'price',
        'count',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
        'price' => 'integer',
        'count' => 'integer',
    ];
}
