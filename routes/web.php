<?php

use App\Http\Controllers\AuctionController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use Diary\Controllers\General;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\LotController;
use App\Http\Controllers\UsersController;

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

Route::get('/home', function () {
    return view('test');
});

Route::get('/', [GeneralController::class, "home"])->name("home");
Route::get('/login', [LoginController::class, "index"])->name("login");
Route::post('/login', [LoginController::class, "authorise"]);

Route::get('/logout', [LogoutController::class, "index"])->name("logout");

Route::get('/admin', [GeneralController::class, "admin"])->name("admin");
Route::get('/construction', [GeneralController::class, "construction"])->name("general.construction");

Route::get('/lot/new', [LotController::class, "new"])->name("lot.new");
Route::get('/lot/home', [LotController::class, "home"])->name("lot.home");
Route::get('/lot/new/finalise', [LotController::class, "new"]);
Route::post('/lot/new/finalise', [LotController::class, "save"])->name("lot.save");
Route::get('lot/view', [LotController::class, "view"])->name("lot.view");
Route::get('lot/view/single', [LotController::class, "single"])->name("lot.view-single");

Route::delete('/lot/delete/{lot}', [LotController::class, "destroy"])->name("lot.destroy");

Route::get('/lot/new/stage', [LotController::class, "new"]);
Route::post('/lot/new/stage', [LotController::class, "stage"])->name("lot.stage");
Route::get('/lot/search', [LotController::class, "find"])->name("lot.find");

Route::get('/auction/home', [AuctionController::class, "home"])->name("auction.home");

Route::get('/user/home', [UsersController::class, "home"])->name("user.home");
