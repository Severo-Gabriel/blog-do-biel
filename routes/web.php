<?php

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

// Controllers
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;

// Admin Controllers
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\PostController;


/*
|--------------------------------------------------------------------------
| Rotas Públicas
|--------------------------------------------------------------------------
*/

Route::get('/', fn(): View => view('welcome'));

// Login & Registro
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Blog Público
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/new', [BlogController::class, 'newPosts'])->name('blog.new');
Route::get('/blog/old', [BlogController::class, 'oldPosts'])->name('blog.old');


/*
|--------------------------------------------------------------------------
| Rotas Protegidas por Autenticação
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Post único do Blog
    Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
});


/*
|--------------------------------------------------------------------------
| Rotas do Painel Admin
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth') 
    ->group(function () {

        Route::resource('categories', CategoryController::class);
        Route::resource('tags', TagController::class);
        Route::resource('status', StatusController::class);
        Route::resource('authors', AuthorController::class);
        Route::resource('posts', PostController::class);
    });