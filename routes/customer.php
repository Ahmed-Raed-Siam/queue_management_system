<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/customer',
    'middleware' => 'role:customer',
    'as' => 'customer.',
], function () {
    Route::get('/', [CustomerController::class, 'create_tickets'])
        ->name('create_tickets');

    Route::post('/', [CustomerController::class, 'store_ticket'])
        ->name('store_ticket');
});

?>
