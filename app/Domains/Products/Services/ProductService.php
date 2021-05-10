<?php

namespace App\Domains\Products\Services;

use App\Domains\Products\Models\Products;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class ProductService.
 */
class ProductService extends BaseService
{
    /**
     * ProductService constructor.
     *
     * @param Products $product
     */
    public function __construct(Products $product)
    {
        $this->model = $product;
    }

    /**
     * @param array $data
     *
     * @return mixed
     * @throws GeneralException
     */
    public function registerProduct(array $data = []): Products
    {
        DB::beginTransaction();

        try {
            $product = $this->createProduct($data);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating your product.'));
        }

        DB::commit();

        return $product;
    }

    /**
     * @param array $data
     *
     * @return Products
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Products
    {
        DB::beginTransaction();

        try {
            $product = $this->createProduct([
                'name' => $data['name'],
                'avatar' => $data['avatar'] ?? 'img/users/default.png',
                'description' => $data['description'],
                'active' => isset($data['active']) && $data['active'] === '1',
                'price' => $data['price'] ?? 0,
                'count' => $data['count'] ?? 0,
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating this product. Please try again.'));
        }

        // event(new ProductCreated($product));

        DB::commit();

        return $product;
    }

    /**
     * @param Products $product
     * @param array $data
     *
     * @return Products
     * @throws \Throwable
     */
    public function update(Products $product, array $data = []): Products
    {
        DB::beginTransaction();

        try {
            $product->update([
                'name' => $data['name'] ?? $product->name,
                'avatar' => $data['avatar'] ?? $product->avatar,
                'description' => $data['description'] ?? $product->description,
                'active' => isset($data['active']) && $data['active'] === '1',
                'price' => $data['price'] ?? $product->price,
                'count' => $data['count'] ?? $product->count,
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this product. Please try again.'));
        }

        // event(new ProductUpdated($product));

        DB::commit();

        return $product;
    }

    /**
     * @param Products $product
     * @param $status
     *
     * @return Products
     * @throws GeneralException
     */
    public function mark(Products $product, $status): Products
    {
        $product->active = $status;

        if ($product->save()) {
            // event(new ProductStatusChanged($product, $status));

            return $product;
        }

        throw new GeneralException(__('There was a problem updating this product. Please try again.'));
    }

    /**
     * @param Products $product
     *
     * @return Products
     * @throws GeneralException
     */
    public function delete(Products $product): Products
    {
        if ($this->deleteById($product->id)) {
            // event(new ProductDeleted($product));

            return $product;
        }

        throw new GeneralException('There was a problem deleting this product. Please try again.');
    }

    /**
     * @param Products $product
     *
     * @throws GeneralException
     * @return Products
     */
    public function restore(Products $product): Products
    {
        if ($product->restore()) {
            // event(new ProductRestored($product));

            return $product;
        }

        throw new GeneralException(__('There was a problem restoring this product. Please try again.'));
    }

    /**
     * @param Products $product
     *
     * @return bool
     * @throws GeneralException
     */
    public function destroy(Products $product): bool
    {
        if ($product->forceDelete()) {
            // event(new ProductDestroyed($product));

            return true;
        }

        throw new GeneralException(__('There was a problem permanently deleting this product. Please try again.'));
    }

    /**
     * @param array $data
     *
     * @return Products
     */
    protected function createProduct(array $data = []): Products
    {
        return $this->model::create([
            'name' => $data['name'],
            'avatar' => $data['avatar'] ?? 'img/users/default.png',
            'description' => $data['description'],
            'active' => $data['active'] ?? true,
            'price' => $data['price'] ?? 0,
            'count' => $data['count'] ?? 0,
        ]);
    }
}
