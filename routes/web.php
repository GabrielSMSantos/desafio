<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::controller(CustomerController::class)->name('customer.')->group(function() {
    Route::get('/', 'index')->name('index');
    Route::get('/novo', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{customer}', 'edit')->where('customer', '[0-9]+')->name('edit');
    Route::put('/{customer}', 'update')->where('customer', '[0-9]+')->name('update');
    Route::delete('/{customer}', 'delete')->where('customer', '[0-9]+')->name('delete');
});

