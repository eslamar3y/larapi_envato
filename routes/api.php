<?php

use App\Http\Controllers\Api\V1\CustomerController;
use App\Http\Controllers\Api\V1\InvoiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// api/v1
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1', 'middleware' => 'auth:sanctum'], function () {
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('invoices', InvoiceController::class);

    Route::post('invoices/bulk', [InvoiceController::class, 'bulkStore']);
    // Route::post('invoices/bulk', ['uses' => 'invoiceController@bulkStore']);
});

// tokens
// "admin": "4|mS8I3m1ca5ZXb9bgmGzXCe9itrktO7K9UVOUxSZke0b5ba83",
// "update": "5|4SsNtFtToMh0qAqAVFP9KiGvzNlWgfMP1vpb9jrb73aa0cc6",
// "basic": "6|NoofrvS4PxpkSTzVb9kfnBixZ7Alb7q9YdvpfvITf6489c30"
