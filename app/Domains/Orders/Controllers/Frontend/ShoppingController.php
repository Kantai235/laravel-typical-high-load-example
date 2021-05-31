<?php

namespace App\Domains\Orders\Controllers\Frontend;

use App\Domains\Auth\Models\User;
use App\Domains\Orders\Models\Orders;
use App\Domains\Orders\Services\OrderService;
use App\Domains\Products\Services\ProductService;
use App\Http\Controllers\Controller;

/**
 * Class ShoppingController.
 */
class ShoppingController extends Controller
{
    /**
     * @var OrderService
     */
    protected $orderService;

    /**
     * @var ProductService
     */
    protected $productService;

    /**
     * ShoppingController constructor.
     *
     * @param OrderService $orderService
     * @param ProductService $productService
     */
    public function __construct(OrderService $orderService, ProductService $productService)
    {
        $this->orderService = $orderService;
        $this->productService = $productService;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function shopping()
    {
        $user = User::find(mt_rand(2, 11));
        $products = array();
        for ($i = 0; $i < mt_rand(1, 10); $i++) {
            $product = $this->productService->firstActive();
            if ($product->count >= 10) {
                array_push($products, array(
                    'id' => $product->id,
                    'count' => mt_rand(1, 10),
                ));
            } else {
                array_push($products, array(
                    'id' => $product->id,
                    'count' => mt_rand(1, $product->count),
                ));
            }
        }

        $order = $this->orderService->store(array(
            'model_id' => $user->id,
            'type' => Orders::UNPAID,
            'active' => true,
            'items' => $products,
        ));

        return view('frontend.order.index')->withOrder($order);
    }

    /**
     * @param Orders $order
     *
     * @return \Illuminate\View\View
     */
    public function order(Orders $order)
    {
        return view('frontend.order.index')->withOrder($order);
    }
}
