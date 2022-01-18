<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IsAdmin;
use App\Http\Controllers\IsCustomer;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ContactController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Routing\RouteGroup;

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

Route::Group(['prefix' => 'admin', 'middleware' => ['ChkAdmin']], function () {
    Route::resource('/contacts', ContactController::class);
    Route::resource('/customers', CustomersController::class);
    Route::get('/customer_details/{id}', [CustomersController::class, 'details'])->name('customer_details');
    Route::get('/customer', [IsAdmin::class, 'customer'])->name('customer');
    Route::get('/', [IsAdmin::class, 'index'])->name('dashboard');
});


Route::Group(['middleware' => ['ChkCustomer']], function () {
    Route::get('/customer_panel', [IsCustomer::class, 'index'])->name('customer_panel');
});


Auth::routes(['register' => false]);

Route::get('/', [IsAdmin::class, 'leed']);
