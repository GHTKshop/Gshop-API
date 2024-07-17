<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\tbl_productController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;


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

Route::middleware('auth.token')->get('/me', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function ($router) {
    Route::post('login', 'login')->name('login');
    Route::post('register', 'register')->name('register');
    Route::post('logout', 'logout')->name('logout')->middleware('auth.token');
    Route::post('refresh', 'refresh')->name('refresh');
});

//Route::apiResource('products', \App\Http\Controllers\ProductController::class);

//// Route::apiResource('products', tbl_productController::class);
Route::get('products', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('products/{id}', [\App\Http\Controllers\ProductController::class, 'show']);
Route::put('products/{id}', [\App\Http\Controllers\ProductController::class, 'update']);
Route::delete('products/{id}', [\App\Http\Controllers\ProductController::class, 'destroy']);



//Route::apiResource('brands', tbl_brandController::class);
//Route::apiResource('category-products', tbl_categoryProductController::class);

// Route để lấy giỏ hàng theo user_id
//Route::get('carts/user/{user_id}', [CartController::class, 'getCartByUserId']);
//
//// Route để get sản phẩm mới nhất
//Route::get('new-products', [tbl_ProductController::class, 'getNewProducts']);
//
//Route::post('carts/add', [CartController::class, 'addToCart']);
//
//Route::get('new-products', [tbl_ProductController::class, 'getNewProducts']);
//
//// Route để get sản phẩm theo category_id
//Route::get('products_by_category_id/{category_id}', [tbl_ProductController::class, 'getProductsByCategoryId']);
//
//// Route để get sản phẩm theo brand_id
//Route::get('products_by_brand_id/{brand_id}', [tbl_productController::class, 'getProductsByBrandId']);
//
//// Route để lấy wishlist theo user_id
//Route::get('wishlists/user/{user_id}', [WishlistController::class, 'getWishlistByUserId']);
//
//// Route để thêm sản phẩm vào wishlist
//Route::post('wishlists/add', [WishlistController::class, 'addToWishlist']);

