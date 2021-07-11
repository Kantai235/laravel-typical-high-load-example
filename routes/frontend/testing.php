<?php

use App\Domains\Orders\Controllers\Frontend\ShoppingV1Controller;
use App\Domains\Orders\Controllers\Frontend\ShoppingV2Controller;

/*
 * Shopping Testing Controllers
 * All route names are prefixed with 'frontend.testing'.
 */
Route::group([
    'prefix' => 'testing',
    'as' => 'testing.',
], function () {
    /**
     * All route names are prefixed with 'frontend.testing.v1'.
     */
    Route::group([
        'prefix' => 'v1',
        'as' => 'v1.',
    ], function () {
        Route::get('shopping', [ShoppingV1Controller::class, 'shopping'])
            ->name('shopping');

        Route::get('shopping/delete', [ShoppingV1Controller::class, 'shoppingDelete'])
            ->name('shopping.delete');

        Route::get('order/{order}', [ShoppingV1Controller::class, 'order'])
            ->name('order');
    });

    /**
     * All route names are prefixed with 'frontend.testing.v2'.
     */
    Route::group([
        'prefix' => 'v2',
        'as' => 'v2.',
    ], function () {
        Route::get('shopping', [ShoppingV2Controller::class, 'shopping'])
            ->name('shopping');

        Route::get('shopping/delete', [ShoppingV2Controller::class, 'shoppingDelete'])
            ->name('shopping.delete');

        Route::get('order/{order}', [ShoppingV2Controller::class, 'order'])
            ->name('order');
    });
});
