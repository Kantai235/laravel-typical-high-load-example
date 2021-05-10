<?php

namespace App\Domains\Orders\Models;

use App\Domains\Orders\Models\Traits\Method\OrderItemsMethod;
use App\Domains\Orders\Models\Traits\Relationship\OrderItemsRelationship;
use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrderItems.
 */
class OrderItems extends Model
{
    use Uuid,
        HasFactory,
        SoftDeletes,
        OrderItemsMethod,
        OrderItemsRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'uuid',
        'order_id',
        'product_id',
        'price',
        'count',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'price' => 'integer',
        'count' => 'integer',
    ];
}
