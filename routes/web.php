<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', \App\Http\Controllers\HomeController::class)->name('home');
Route::get('/wishlist', [\App\Http\Controllers\ShopController::class, 'wishlist'])->name('wishlist');
Route::get('/shop', [\App\Http\Controllers\ShopController::class, 'index'])->name('shop');
Route::get('/shop/{categories:slug}', [\App\Http\Controllers\ShopController::class, 'categories'])->name('shop.categories');
Route::name('products.')->prefix('products')->group(function (){
    Route::get('{product:slug}/{color:slug?}', [\App\Http\Controllers\ShopController::class, 'show'])->name('show');
});

Route::get('checkout', \App\Http\Controllers\CheckoutController::class)->name('checkout');
Route::get('mail', function () {
    Mail::to( 'homeandriy@gmail.com' )
        ->send( new \App\Mail\MyTestEmail() );
})->name('mail');

Route::name('cart.')->prefix('cart')->group(function() {
    Route::get('/', [\App\Http\Controllers\CartController::class, 'index'])->name('index');
    Route::post('/add', [\App\Http\Controllers\CartController::class, 'add'])->name('add');
    Route::delete('/', [\App\Http\Controllers\CartController::class, 'remove'])->name('remove');
    Route::put('{product}/count', [\App\Http\Controllers\CartController::class, 'countUpdate'])->name('count.update');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::name('ajax.')->middleware('auth')->prefix('ajax')->group(function() {
    Route::group(['role:admin|moderator'], function() {
        Route::delete('images/{image}', \App\Http\Controllers\Ajax\RemoveImageController::class)->name('images.delete');
    });
});

Route::name('admin.')->prefix('admin')->middleware(['role:admin|moderator'])->group(function() {
    Route::get('dashboard', \App\Http\Controllers\Admin\DashboardController::class)->name('dashboard');
    Route::resource('products', \App\Http\Controllers\Admin\ProductsController::class)->except(['show']);
    Route::put('products/{product}/variation/update', [\App\Http\Controllers\Admin\ProductsController::class, 'updateVariation'])->name('products.variation-update');
    Route::post('products/{product}/variation/create', [\App\Http\Controllers\Admin\ProductsController::class, 'createVariation'])->name('products.variation-create');
    Route::post('products/{product}/variation/delete', [\App\Http\Controllers\Admin\ProductsController::class, 'deleteVariation'])->name('products.variation-delete');
    Route::resource('categories', \App\Http\Controllers\Admin\CategoriesController::class)->except(['show']);
    Route::resource('brands', \App\Http\Controllers\Admin\BrandsController::class)->except(['show']);
    Route::resource('colors', \App\Http\Controllers\Admin\ColorsController::class)->except(['show']);
    Route::resource('images', \App\Http\Controllers\Admin\ImagesController::class)->except(['show']);
    Route::resource('users', \App\Http\Controllers\Admin\UsersController::class)->except(['show']);
    Route::resource('orders', \App\Http\Controllers\Admin\OrdersController::class)->except(
        [
            'create', 'store', 'destroy', 'show'
        ]
    );
});
