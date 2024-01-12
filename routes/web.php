<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UkuranController;
use App\Http\Controllers\User;
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
    return view('frontend.homepage.index');
});

Route::get('/dashboard', function () {
    return view('backend.dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => 'role:admin'], function () {
    Route::controller(KategoriController::class)->group(function () {
        Route::get('kategori', 'index')->name('kategori');
        Route::get('/kategoriAjax', 'ajaxKategori')->name('kategoriAjax');
        Route::post('/kategori', 'store')->name('kategori.save');
        Route::get('/kategori/{kategori}/edit', 'edit')->name('kategori.edit');
        Route::patch('/kategori/{kategori}', 'update')->name('kategori.update');
        Route::delete('/kategori/{kategori}', 'destroy')->name('kategori.delete');
    });

    Route::controller(UkuranController::class)->group(function () {
        Route::get('ukuran', 'index')->name('ukuran');
        Route::post('/ukuran', 'store')->name('ukuran.save');
        Route::get('/ajaxUkuran', 'ajaxUkuran')->name('ajaxUkuran');
        Route::get('/ukuran/{ukuran}/edit', 'edit')->name('ukuran.edit');
        Route::patch('/ukuran/{ukuran}', 'update')->name('ukuran.update');
        Route::delete('/ukuran/{ukuran}', 'destroy')->name('ukuran.delete');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('product', 'index')->name('product');
        Route::post('/product', 'store')->name('product.save');
        Route::get('/product/{product}/edit', 'edit')->name('product.edit');
        Route::get('/productAjax', 'productAjax')->name('productAjax');
        Route::patch('/product/{product}', 'update')->name('product.update');
        Route::delete('/product/{product}', 'destroy')->name('product.delete');
    });
});

require __DIR__ . '/auth.php';
