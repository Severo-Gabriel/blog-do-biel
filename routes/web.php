<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\StatusController;


Route::get('/', function (): View {
    return view('welcome');
});

// Rotas de Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::resource('categories', CategoryController::class);
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/new', [BlogController::class, 'newPosts'])->name('blog.new');
Route::get('/blog/old', [BlogController::class, 'oldPosts'])->name('blog.old');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
Route::resource('tags', TagController::class);
Route::resource('status', StatusController::class);
});
