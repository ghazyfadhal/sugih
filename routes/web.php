<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KarirController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - SUGIH (CV. Prioritas Group)
|--------------------------------------------------------------------------
*/

// Landing page (Beranda)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Sejarah / About
Route::get('/sejarah', [AboutController::class, 'index'])->name('about');

// Produk
Route::get('/produk',          [ProductController::class, 'index'])->name('products.index');
Route::get('/produk/{slug}',   [ProductController::class, 'show'])->name('products.show');

// Berita / Artikel
Route::get('/berita',          [ArticleController::class, 'index'])->name('articles.index');

// Karir
Route::get('/karir',           [KarirController::class, 'index'])->name('karir.index');
Route::get('/karir/{slug}',    [KarirController::class, 'show'])->name('karir.show');

// Kontak
Route::get('/kontak',          [ContactController::class, 'index'])->name('contact');
Route::post('/kontak',         [ContactController::class, 'store'])->name('contact.store');

// Admin Panel Routes
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminArticleController;
use App\Http\Controllers\AdminCareerController;

Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AdminController::class, 'login']);

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    
    // CRUD
    Route::post('products/update-order', [AdminProductController::class, 'updateOrder'])->name('products.updateOrder');
    Route::resource('products', AdminProductController::class);
    Route::resource('articles', AdminArticleController::class);
    Route::resource('careers', AdminCareerController::class);
});
