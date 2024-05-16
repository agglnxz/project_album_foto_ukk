<?php

use App\Http\Controllers\AlbumController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\LikeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// dashboard
Route::get('/',[DashboardController::class,'index'])->name('dashboard');
Route::get('/foto_index',[FotoController::class,'index'])->name('foto_index');
Route::get('/detail/{id}',[FotoController::class,'show'])->name('detail');

// login and register
Route::middleware(['guest'])->group(function () {

    Route::get('/login',[AuthController::class,'view_login'])->name('login');
    Route::get('/register',[AuthController::class,'view_register'])->name('register');

    Route::post('/register_proses',[AuthController::class,'create_register'])->name('register_proses');
    Route::post('/login_proses',[AuthController::class,'create_login'])->name('login_proses');

});


Route::middleware(['auth'])->group(function () {
    // profile
    Route::get('/profil_index',[DashboardController::class,'view_profil'])->name('profil_index');

    // album
    Route::get('/album',[AlbumController::class,'index'])->name('album');
    Route::post('/upload_album',[AlbumController::class,'store'])->name('upload_album');
    Route::get('/detail_album/{id}',[AlbumController::class,'show'])->name('detail_album');
    Route::put('/edit_album/{id}',[AlbumController::class,'update'])->name('edit_album');
    Route::delete('/delete_album/{id}',[AlbumController::class,'destroy'])->name('delete_album');
    // logout
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');

    //postingan
     Route::post('/posting',[FotoController::class,'store'])->name('posting');
     Route::put('/edit_postingan/{id}',[FotoController::class,'update'])->name('edit_postingan');
     Route::delete('/delete_postingan/{id}',[FotoController::class,'destroy'])->name('delete_postingan');
     Route::post('/like/{id}',[LikeController::class,'store'])->name('like');

    //  komentar
     Route::post('/comments/{id}',[KomentarController::class,'store_comments'])->name('comments');
});

