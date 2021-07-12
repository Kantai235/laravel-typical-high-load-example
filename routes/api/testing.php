<?php

use App\Domains\Orders\Controllers\Api\ShoppingV2Controller;

/*
 * Shopping Testing Controllers
 * All route names are prefixed with 'api.testing'.
 */
Route::group([
    'prefix' => 'testing',
    'as' => 'testing.',
], function () {
    /**
     * All route names are prefixed with 'api.testing.v2'.
     */
    Route::group([
        'prefix' => 'v2',
        'as' => 'v2.',
    ], function () {
        Route::get('order/{number}', [ShoppingV2Controller::class, 'order'])
            ->name('order');
    });
});
