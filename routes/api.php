<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerApiController;

Route::post('/customer', [CustomerApiController::class, 'store']);
