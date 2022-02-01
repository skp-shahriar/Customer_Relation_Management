<?php

use App\Http\Controllers\IsAdmin;
use Illuminate\Routing\RouteGroup;
use App\Http\Controllers\IsCustomer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomersController;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\customer\EstimateController;

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
    Route::get('/gantt', [CustomersController::class, 'gantt'])->name('gantt');
    Route::resource('/contacts', ContactController::class);
    Route::resource('/customers', CustomersController::class);
    Route::get('/customer_details/{id}', [CustomersController::class, 'details'])->name('customer_details');
    Route::get('/customer', [IsAdmin::class, 'customer'])->name('customer');
    Route::get('/', [IsAdmin::class, 'index'])->name('dashboard');
});


Route::Group(['middleware' => ['ChkCustomer']], function () {
    Route::get('/customer_panel', [IsCustomer::class, 'index'])->name('customer_panel');
    Route::get('/estimate_list', [EstimateController::class, 'index'])->name('cm_estimate');
    Route::get('/estimate_View/{id}', [EstimateController::class, 'show'])->name('cm_estimate_view');
    Route::post('/estimate_accept/{id}', [EstimateController::class, 'accept'])->name('cm_estimate_accept');
    Route::post('/estimate_reject/{id}', [EstimateController::class, 'reject'])->name('cm_estimate_reject');
});


Auth::routes(['register' => false]);

Route::get('/', [IsAdmin::class, 'leed']);
