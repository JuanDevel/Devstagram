<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', HomeController::class)->name('home');

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store']);

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);

Route::post('/logout',[LogoutController::class,'store'])->name('logout');

// rutas perfil

Route::get('/edit-profile',[ProfileController::class,'index'])->name('profile.index');
Route::post('/edit-profile',[ProfileController::class,'store'])->name('profile.store');


// rutas image
Route::post('/images',[ImagenController::class,'store'])->name('images.store');


Route::post('/posts',[PostController::class,'store'])->name('posts.store');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
Route::get('/{user:username}',[PostController::class,'index'])->name('posts.index');
Route::get('/{user:username}/posts/{post}',[PostController::class,'show'])->name('posts.show');

Route::post('/{user:username}/posts/{post}',[CommentController::class,'store'])->name('comment.store');
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');

// like fotos

Route::post('/posts/{post}/likes', [LikeController::class,'store'])->name('posts.likes.store');
Route::delete('/posts/{post}/likes', [LikeController::class,'destroy'])->name('posts.likes.destroy');

// siguiendo usuarios
Route::post('/{user:username}/follow',[FollowerController::class,'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow',[FollowerController::class,'destroy'])->name('users.unfollow');



