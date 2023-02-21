<?php

use App\Http\Controllers\api\V1\CustomerController;
use App\Http\Controllers\api\V1\InvoiceController;
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

//api/v1
Route::group(['prefix' => 'v1'], function () {
    Route::get('/customers', function (Request $request) {
        return (new CustomerController())->index();
    });
    Route::get('/invoices', function (Request $request) {
        return (new InvoiceController())->index();
    });
});
