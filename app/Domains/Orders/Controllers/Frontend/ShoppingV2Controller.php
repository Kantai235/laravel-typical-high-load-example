<?php

namespace App\Domains\Orders\Controllers\Frontend;

use App\Domains\Orders\Jobs\AsyncCreateAndDeleteOrder;
use App\Domains\Orders\Jobs\AsyncCreateOrder;
use App\Domains\Orders\Models\Orders;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
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
     * @param string $uuid
     *
     * @return \Illuminate\View\View
     */
    public function order(string $uuid)
    {
        if ($order = Redis::get('order:' . $uuid)) {
            return view('frontend.order.index-v2r')
                ->with('order', json_decode($order));
        }

        if ($order = Orders::uuid($uuid)->first()) {
            $items = $order->items;
            foreach ($items as $item) {
                $item->product;
            }
            Redis::set("order:$uuid", $order);

            return view('frontend.order.index-v2r')
                ->with('order', $order);
        }

        return redirect()->route('frontend.index')->withFlashDanger(__('Order is Not Found.'));
    }
}
