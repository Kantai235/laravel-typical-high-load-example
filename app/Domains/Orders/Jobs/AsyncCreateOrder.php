<?php

namespace App\Domains\Orders\Jobs;

use App\Domains\Orders\Models\Orders;
use App\Domains\Orders\Services\OrderService;
use App\Domains\Products\Services\ProductService;
use Illuminate\Bus\Queueable;
use Illuminate\Container\Container;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Class AsyncCreateOrder.
 */
class AsyncCreateOrder implements ShouldQueue
{
    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    /**
     * @var string
     */
    protected $number;

    /**
     * Create a new job instance.
     *
     * @param string $number
     *
     * @return void
     */
    public function __construct(string $number)
    {
        $this->number = $number;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $container = Container::getInstance();
        $orderService = $container->make(OrderService::class);
        $productService = $container->make(ProductService::class);

        $products = array();
        for ($i = 0; $i < mt_rand(1, 10); $i++) {
            $product = $productService->firstActive();
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

        $orderService->store(array(
            'model_id' => mt_rand(2, 11),
            'type' => Orders::UNPAID,
            'active' => true,
            'items' => $products,
            'number' => $this->number,
        ));
    }
}
