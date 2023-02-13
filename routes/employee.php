<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/employee',
    'middleware' => 'role:employee',
    'as' => 'employee.',
], function () {
    Route::get('/', [EmployeeController::class, 'index'])
        ->name('tickets');

    Route::post('/{id}', [EmployeeController::class, 'update_ticket_status'])
        ->name('update_ticket_status');
});

?>
