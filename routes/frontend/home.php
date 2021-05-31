<?php

use App\Domains\Orders\Controllers\Frontend\ShoppingController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TermsController;
use Tabuna\Breadcrumbs\Trail;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */

Route::get('/', [HomeController::class, 'index'])
    ->name('index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('frontend.index'));
    });

Route::get('shopping', [ShoppingController::class, 'shopping'])
    ->name('shopping');

Route::get('shopping/delete', [ShoppingController::class, 'shoppingDelete'])
    ->name('shopping.delete');

Route::get('order/{order}', [ShoppingController::class, 'order'])
    ->name('order');

Route::get('terms', [TermsController::class, 'index'])
    ->name('pages.terms')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('Terms & Conditions'), route('frontend.pages.terms'));
    });
