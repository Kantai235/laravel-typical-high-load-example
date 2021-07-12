<?php

namespace App\Domains\Orders\Controllers\Frontend;

use App\Domains\Orders\Jobs\AsyncCreateAndDeleteOrder;
use App\Domains\Orders\Jobs\AsyncCreateOrder;
use App\Domains\Orders\Models\Orders;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

/**
 * Class ShoppingV2Controller.
 */
class ShoppingV2Controller extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function shopping()
    {
        $number = Str::random(32);

        AsyncCreateOrder::dispatch($number);

        return view('frontend.order.index-v2')
            ->with('number', $number);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function shoppingDelete()
    {
        $number = Str::random(32);

        AsyncCreateAndDeleteOrder::dispatch($number);

        return view('frontend.order.index-v2')
            ->with('number', $number);
    }

    /**
     * @param Orders $order
     *
     * @return \Illuminate\View\View
     */
    public function order(Orders $order)
    {
        return view('frontend.order.index-v2')
            ->with('order', $order)
            ->with('items', $order->items);
    }
}
