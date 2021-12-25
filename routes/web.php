<?php

use App\Http\Controllers\AccountTypeController;
use App\Http\Controllers\RequestStatusController;
use App\Http\Controllers\RequestTypeController;
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

// Development only
Route::get('/', function () {
    return redirect()->route("others.account-types.index");
});

Route::name("others.")->group(function () {
    Route::resource("request-types", RequestTypeController::class)->except("show");
    Route::resource("request-statuses", RequestStatusController::class)->except("show");
    Route::resource("transfer-types", TransferTypeController::class)->except("show");
    Route::resource("account-types", AccountTypeController::class)->except("show");
});


