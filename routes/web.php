<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group([
    'prefix' => '/dashboard',
    'namespace' => 'Dashboard',
    'middleware' => ['auth'],
], function () {

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
});

//require __DIR__.'/auth.php';
