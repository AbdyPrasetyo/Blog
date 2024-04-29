<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserPostController;

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
    return view('home');
});



Route::controller(LoginController::class)->group(function(){
    Route::get('/login','index')->name('login');
    Route::post('login/proses','proses');
    Route::get('logout','logout');
    Route::resource('register', RegisterController::class);


 });

 Route::group(['middleware' => ['auth']], function (){
    Route::group(['middleware' => ['cekUserLogin:admin']], function () {

    Route::get('/admin/home', function () {
        return view('admin/home');
    });
        Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
        Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
        Route::get('/posts/{id_post}', [PostController::class, 'show'])->name('posts.show');
        Route::get('/posts/{id_post}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::put('/posts/{id_post}', [PostController::class, 'update'])->name('posts.update');
        Route::delete('/posts/{id_post}', [PostController::class, 'destroy'])->name('posts.destroy');

        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});
    Route::group(['middleware' => ['cekUserLogin:user']], function () {
        Route::get('/user/home', function () {
            return view('user/home');
        });
        Route::get('/user/posts', [UserPostController::class, 'index'])->name('user.posts.index');
        Route::get('/user/posts/create', [UserPostController::class, 'create'])->name('user.posts.create');
        Route::post('/user/posts', [UserPostController::class, 'store'])->name('user.posts.store');
        Route::get('/user/posts/{id}/edit', [UserPostController::class, 'edit'])->name('user.posts.edit');
        Route::put('/user/posts/{id}', [UserPostController::class, 'update'])->name('user.posts.update');
        Route::delete('/user/posts/{id}', [UserPostController::class, 'destroy'])->name('user.posts.destroy');
});
});

