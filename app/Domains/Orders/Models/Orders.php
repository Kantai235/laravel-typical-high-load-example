<?php

namespace App\Domains\Orders\Models;

use App\Domains\Orders\Models\Traits\Method\OrdersMethod;
use App\Domains\Orders\Models\Traits\Relationship\OrdersRelationship;
use App\Domains\Orders\Models\Traits\Scope\OrdersScope;
use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Orders.
 */
class Orders extends Model
{
    use Uuid,
        HasFactory,
        SoftDeletes,
        OrdersMethod,
        OrdersRelationship,
        OrdersScope;

    /**
     * 狀態：尚未付款
     *
     * @var int
     */
    public const UNPAID = 1;

    /**
     * 狀態：尚未付款並取消訂單
     *
     * @var int
     */
    public const UNPAID_CANCEL = 2;

    /**
     * 狀態：已付款
     *
     * @var int
     */
    public const PAID = 3;

    /**
     * 狀態：已付款但取消訂單，並且尚未退款
     *
     * @var int
     */
    public const PAID_CANCEL_NO_REFUND = 4;

    /**
     * 狀態：已付款但取消訂單，並且已退款
     *
     * @var int
     */
    public const PAID_CANCEL_REFUND = 5;

    /**
     * 狀態：已付款並開立發票
     *
     * @var int
     */
    public const PAID_INVOICE = 6;

    /**
     * 狀態：已付款並開立發票
     *
     * @var int
     */
    public const PAID_INVOICE_CANCEL = 7;

    /**
     * 狀態：已付款並開立發票，但取消訂單，已退款
     *
     * @var int
     */
    public const PAID_INVOICE_CANCEL_REFUND = 8;

    /**
     * 狀態：已付款並開立發票，但取消訂單，已退款、已取消發票
     *
     * @var int
     */
    public const PAID_INVOICE_CANCEL_REFUND_REINVOICE = 9;

    /**
     * 狀態：完成訂單
     *
     * @var int
     */
    public const COMPLETED = 10;

    /**
     * 狀態：完成訂單，但退貨等待受理
     *
     * @var int
     */
    public const COMPLETED_RETURN_WAITING = 11;

    /**
     * 狀態：完成訂單，但退貨取消受理
     *
     * @var int
     */
    public const COMPLETED_CANCEL_RETURN = 12;

    /**
     * 狀態：接受退貨
     *
     * @var int
     */
    public const ACCEPT_RETURN = 13;

    /**
     * 狀態：接受退貨，已完成退款
     *
     * @var int
     */
    public const ACCEPT_RETURN_REFUND = 14;

    /**
     * 狀態：接受退貨，已完成退款、已完成取消發票
     *
     * @var int
     */
    public const ACCEPT_RETURN_REFUND_REINVOICE = 15;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'uuid',
        'type',
        'active',
        'price',
        'payment',
        'invoice',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
        'price' => 'integer',
    ];
}
