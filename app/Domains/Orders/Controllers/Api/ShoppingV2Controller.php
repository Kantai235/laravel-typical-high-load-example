<?php

namespace App\Domains\Orders\Controllers\Api;

use App\Domains\Orders\Services\OrderService;
use App\Http\Controllers\Controller;
use App\Domains\Orders\Resources\OrderResource;

/**
 * Class ShoppingV2Controller.
 */
class ShoppingV2Controller extends Controller
{
    /**
     * @var OrderService
     */
    protected $orderService;

    /**
     * ShoppingV2Controller constructor.
     *
     * @param OrderService $orderService
     */
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * @param string $number
     *
     * @return \Illuminate\View\View
     */
    public function order(string $number)
    {
        if ($order = $this->orderService->findByNumber($number)) {
            return new OrderResource($order);
        }

        return [
            'data' => [],
        ];
    }
}
