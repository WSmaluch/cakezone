<?php

use App\Http\Controllers\ChefsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/Products", [ProductsController::class, "index"]) ;
Route::get("/Products/edit/{id}", [ProductsController::class, "edit"]) ;
Route::post("/Products/update/{id}", [ProductsController::class, "update"]) ;
Route::get("/Products/create", [ProductsController::class, "create"]) ;
Route::get("/Products/delete/{id}", [ProductsController::class, "delete"]) ;
Route::post("/Products/create", [ProductsController::class, "addToDb"]) ;

Route::get("/Orders", [OrdersController::class, "index"]) ;
Route::get("/Orders/create", [OrdersController::class, "create"]) ;
Route::get("/Orders/edit/{id}", [OrdersController::class, "edit"]) ;
Route::post("/Orders/update/{id}", [OrdersController::class, "update"]) ;
Route::post("/Orders/create", [OrdersController::class, "store"]) ;
Route::get("/Orders/details/{id}", [OrdersController::class, "details"]) ;
Route::get("/Orders/delete/{id}", [OrdersController::class, "delete"]) ;
Route::get('/Orders/search', [OrdersController::class, 'search'])->name('orders.search');



Route::get("/Chefs", [ChefsController::class, "index"]) ;
Route::get("/Chefs/edit/{id}", [ChefsController::class, "edit"]) ;
Route::post("/Chefs/update/{id}", [ChefsController::class, "update"]) ;
Route::get("/Chefs/create", [ChefsController::class, "create"]) ;
Route::get("/Chefs/delete/{id}", [ChefsController::class, "delete"]) ;
Route::post("/Chefs/create", [ChefsController::class, "addToDb"]) ;


Route::get('/Contact', function () {
    return view('Other/contact');
});

Route::get('/About', function () {
    return view('Other/about');
});