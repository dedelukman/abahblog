<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminControllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
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

// Front User

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('post.show');
Route::middleware(['auth'])->post('/post/{post:slug}', [PostController::class, 'addComment'])->name('post.addcomment');


Route::get('/categories', [CategoryController::class, 'index'])->name('category');
Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/tags/{tag:slug}', [TagController::class, 'show'])->name('tag.show');


Route::get('/about',AboutController::class)->name('about');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// Admin Dashboard

Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('index');
});


require __DIR__.'/auth.php';
