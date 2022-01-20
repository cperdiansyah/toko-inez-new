<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
| --------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route Guest */
/* Guest user can access */

Route::get('/', [HomeController::class, 'index']);
Route::get('/products', function () {
    return view('customer.products', [
        'title' => 'Product',
        'products' => Product::all(),
        'categories' => Category::all(),
        'user' => Auth::user(),
    ]);
});

Route::group(["middleware" => ['auth:sanctum', 'verified']], function () {
    Route::view('/dashboard', "dashboard")->name('dashboard');

    /* User Sidebar */
    Route::get('/admin/user', [UserController::class, "index_view"])->name('user');

    Route::view('/admin/user/new', "pages.user.user-new")->name('user.new');

    Route::view('/admin/user/edit/{userId}', "pages.user.user-edit")->name('user.edit');

    /* Product Sidebar */

    Route::get('/admin/product', [ProductController::class, "index"])->name('product');

    Route::view('/admin/product/new', "pages.product.product-new")->name('product.new');

    Route::view('/admin/product/edit/{productId}', "pages.product.product-edit")->name('product.edit');

    /* Category Sidebar */
    Route::get('/admin/category', [Cate::class, "index"])->name('product');

    Route::view('/admin/category/new', "pages.product.product-new")->name('product.new');

    Route::view('/admin/category/edit/{productId}', "pages.product.product-edit")->name('product.edit');

});
