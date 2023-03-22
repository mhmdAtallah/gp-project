<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
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

Route::get('/', fn() => view('home', ['products' => Product::all()]));

Route::get('/products', [ProductController::class, "index"]);
Route::get('/product/{product}', [ProductController::class, "show"]);
Route::get('products/create', [ProductController::class, "create"]);
Route::post('product/store', [ProductController::class, "store"]);
Route::get('product/update/{product}', [ProductController::class, "edit"]);
Route::post('product/update/{product}', [ProductController::class, "update"]);
Route::post('product/destroy/{product}', [ProductController::class, "destroy"]);