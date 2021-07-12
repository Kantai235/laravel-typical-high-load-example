<?php

namespace App\Domains\Orders\Services;

use App\Domains\Auth\Models\User;
use App\Domains\Orders\Models\OrderItems;
use App\Domains\Orders\Models\Orders;
use App\Domains\Products\Models\Products;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * Class OrderService.
 */
class OrderService extends BaseService
{
    /**
     * OrderService constructor.
     *
     * @param Orders $order
     */
    public function __construct(Orders $order)
    {
        $this->model = $order;
    }

    /**
     * @param array $data
     *
     * @return Orders
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Orders
    {
        DB::beginTransaction();

        try {
            $order = $this->createOrder([
                'model_id' => $data['model_id'],
                'type' => $data['type'],
                'active' => isset($data['active']) && $data['active'] === '1',
                'payment' => isset($data['payment']) ? json_encode($data['payment']) : '{}',
                'invoice' => isset($data['invoice']) ? json_encode($data['invoice']) : '{}',
                'number' => isset($data['number']) ? $data['number'] : null,
            ]);

            $price = 0;
            foreach ($data['items'] as $item) {
                $product = Products::find($item['id']);
                $product->count = $product->count - $item['count'];
                $product->save();

                $model = new OrderItems();
                $model->order_id = $order->id;
                $model->product_id = $product->id;
                $model->price = $product->price;
                $model->count = $item['count'];
                $model->save();

                $price = $price + ($model->price * $model->count);
            }

            $order->price = $price;
            $order->save();
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this order. Please try again.'));
        }

        // event(new OrdersCreated($order));

        DB::commit();

        return $order;
    }

    /**
     * @param Orders $order
     * @param $status
     *
     * @return Orders
     * @throws GeneralException
     */
    public function mark(Orders $order, $status): Orders
    {
        $order->active = $status;

        if ($order->save()) {
            // event(new OrderStatusChanged($order, $status));

            return $order;
        }

        throw new GeneralException(__('There was a problem updating this order. Please try again.'));
    }

    /**
     * @param Orders $order
     *
     * @return Orders
     * @throws GeneralException
     */
    public function delete(Orders $order): Orders
    {
        if ($this->deleteById($order->id)) {
            // event(new OrderDeleted($order));

            return $order;
        }

        throw new GeneralException('There was a problem deleting this order. Please try again.');
    }

    /**
     * @param Orders $order
     *
     * @throws GeneralException
     * @return Orders
     */
    public function restore(Orders $order): Orders
    {
        if ($order->restore()) {
            // event(new OrderRestored($order));

            return $order;
        }

        throw new GeneralException(__('There was a problem restoring this order. Please try again.'));
    }

    /**
     * @param Orders $order
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Orders $order): bool
    {
        if ($order->forceDelete()) {
            // event(new OrderDestroyed($order));

            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this order. Please try again.'));
    }

    /**
     * @param array $data
     *
     * @return Orders
     */
    protected function createOrder(array $data = []): Orders
    {
        return $this->model::create([
            'model_type' => User::class,
            'model_id' => $data['model_id'],
            'type' => $data['type'],
            'active' => $data['active'] ?? true,
            'price' => $data['price'] ?? 0,
            'payment' => isset($data['payment']) ? json_encode($data['payment']) : '{}',
            'invoice' => isset($data['invoice']) ? json_encode($data['invoice']) : '{}',
            'number' => $data['number'] ?? Str::random(32),
        ]);
    }
}
