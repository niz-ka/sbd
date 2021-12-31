<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AccountTypeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerRequestController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\RequestStatusController;
use App\Http\Controllers\RequestTypeController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\TransferTypeController;
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
    return redirect()->route("customers.index");
});

Route::name("others.")->group(function () {
    Route::resource("request-types", RequestTypeController::class)->except("show");
    Route::resource("request-statuses", RequestStatusController::class)->except("show");
    Route::resource("transfer-types", TransferTypeController::class)->except("show");
    Route::resource("account-types", AccountTypeController::class)->except("show");
});

Route::resource("customers", CustomerController::class);
Route::resource("customer-requests", CustomerRequestController::class);
Route::resource("loans", LoanController::class);

Route::post("accounts/report", [AccountController::class, "report"])->name("accounts.report");
Route::resource("accounts", AccountController::class);

Route::post("transfers/report", [TransferController::class, "report"])->name("transfers.report");
Route::resource("transfers", TransferController::class);
