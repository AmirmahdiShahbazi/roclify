<?php

use App\Http\Controllers\Album\AlbumController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Band\BandController;
use App\Jobs\SendEmailJob;
use App\Mail\SampleMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
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



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');






Route::prefix('/dashboard')->group(function(){

    Route::get('',[BandController::class,'index'])->name('dashbord');

    Route::get('bands',[BandController::class,'index'])->name('dashbord.bands');

    Route::get('albums',[AlbumController::class,'index'])->name('dashbord.albums');

    Route::get('albums/create',[AlbumController::class,'create'])->name('dashbord.albums.create');

    Route::get('bands/create',[BandController::class,'create'])->name('dashbord.bands.create');

    Route::get('albums/create',[AlbumController::class,'create'])->name('dashbord.albums.create');

    Route::get('albums/ajax-search',[AlbumController::class,'ajaxSearch'])->name('dashbord.albums.ajaxSearch');


    Route::post('bands/store',[BandController::class,'store'])->name('dashbord.bands.store');
    
    Route::post('albums/store',[AlbumController::class,'store'])->name('dashbord.albums.store');

    Route::get('bands/{id}/edit',[BandController::class,'edit'])->name('dashbord.bands.edit');

    Route::put('bands/{id}/update',[BandController::class,'update'])->name('dashbord.bands.update');

    Route::get('albums/{id}/edit',[AlbumController::class,'edit'])->name('dashbord.albums.edit');

    Route::put('albums/{id}/update',[AlbumController::class,'update'])->name('dashbord.albums.update');


    Route::delete('bands/{id}/delete',[BandController::class,'delete'])->name('dashbord.bands.delete');

});
Route::prefix('auth')->group(function(){

    Route::get('login',[LoginController::class,'index'])->name('auth.login.index');

    Route::post('login',[LoginController::class,'login'])->name('auth.login');


    Route::get('register',[RegisterController::class,'index'])->name('auth.register.index');

    Route::post('register',[RegisterController::class,'register'])->name('auth.register');

    Route::get('logout',[LoginController::class,'logout'])->name('auth.logout');

    Route::get('forgot-password',[PasswordController::class,'index'])->name('auth.forgot-password');

    Route::post('forgot-password',[PasswordController::class,'sendEmail'])->name('auth.forgot-password.notif');

    Route::get('reset-password/{token}',[PasswordController::class,'showResetForm'])->name('auth.reset-password');

})->middleware('guest');




