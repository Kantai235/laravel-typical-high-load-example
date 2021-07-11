<?php

namespace App\Domains\Orders\Controllers\Frontend;

use App\Domains\Auth\Models\User;
use App\Domains\Orders\Jobs\AsyncCreateOrder;
use App\Domains\Orders\Models\Orders;
use App\Domains\Orders\Services\OrderService;
use App\Domains\Products\Services\ProductService;
use App\Http\Controllers\Controller;

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
        $order = $this->createOrder();

        return view('frontend.order.index')
            ->with('order', $order)
            ->with('items', $order->items);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function shoppingDelete()
    {
        $order = $this->createOrder();
        $items = $order->items;

        $this->orderService->delete($order);
        $this->orderService->destroy($order);

        return view('frontend.order.index')
            ->with('order', $order)
            ->with('items', $items);
    }

    /**
     * @param Orders $order
     *
     * @return \Illuminate\View\View
     */
    public function order(Orders $order)
    {
        return view('frontend.order.index')
            ->with('order', $order);
    }

    /**
     * @param array $data
     *
     * @return Orders
     */
    protected function createOrder(): Orders
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

        AsyncCreateOrder::dispatch($user, $products);

        return new Orders([
            'model_type' => User::class,
            'model_id' => $user->id,
            'type' => Orders::UNPAID,
            'active' => true,
            'price' => $data['price'] ?? 0,
            'payment' => '{}',
            'invoice' => '{}',
        ]);

        $order = $this->orderService->store(array(
            'model_id' => $user->id,
            'type' => Orders::UNPAID,
            'active' => true,
            'items' => $products,
        ));

        return $order;
    }
}
