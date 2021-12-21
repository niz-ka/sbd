<?php

use App\Http\Controllers\RequestTypeController;
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
    return redirect()->route("others.request-types.index");
});

Route::name("others.")->group(function () {
    Route::resource("request-types", RequestTypeController::class);
});


