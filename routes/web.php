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
Route::get('/shop', [\App\Http\Controllers\ShopController::class, 'index'])->name('shop');
Route::name('products.')->prefix('products')->group(function (){
    Route::get('{product:slug}', [\App\Http\Controllers\ShopController::class, 'show'])->name('show');
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

Route::name('admin.')->prefix('admin')->middleware(['role:admin|moderator'])->group(function() {
    Route::get('dashboard', \App\Http\Controllers\Admin\DashboardController::class)->name('dashboard');
    Route::resource('products', \App\Http\Controllers\Admin\ProductsController::class)->except(['show']);
    Route::post('products/{product}/variation', [\App\Http\Controllers\Admin\ProductsController::class, 'updateVariation'])->name('products.variation-update');
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
