<?php

use App\Http\Controllers\Album\AlbumController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Band\BandController;
use App\Http\Middleware\AdminMiddleware;
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

    Route::get('',[BandController::class,'index'])->name('dashbord')->middleware('admin');

    Route::get('bands',[BandController::class,'index'])->name('dashbord.bands')->middleware('admin');

    Route::get('albums',[AlbumController::class,'index'])->name('dashbord.albums')->middleware('admin');

    Route::get('albums/create',[AlbumController::class,'create'])->name('dashbord.albums.create')->middleware('admin');

    Route::get('bands/create',[BandController::class,'create'])->name('dashbord.bands.create')->middleware('admin');

    Route::get('albums/create',[AlbumController::class,'create'])->name('dashbord.albums.create')->middleware('admin');

    Route::get('albums/ajax-search',[AlbumController::class,'ajaxSearch'])->name('dashbord.albums.ajaxSearch')->middleware('admin');

    Route::post('bands/store',[BandController::class,'store'])->name('dashbord.bands.store')->middleware('admin');
    
    Route::post('albums/store',[AlbumController::class,'store'])->name('dashbord.albums.store')->middleware('admin');

    Route::get('bands/{id}/edit',[BandController::class,'edit'])->name('dashbord.bands.edit')->middleware('admin');

    Route::put('bands/{id}/update',[BandController::class,'update'])->name('dashbord.bands.update')->middleware('admin');

    Route::get('albums/{id}/edit',[AlbumController::class,'edit'])->name('dashbord.albums.edit')->middleware('admin');

    Route::put('albums/{id}/update',[AlbumController::class,'update'])->name('dashbord.albums.update')->middleware('admin');

    Route::delete('bands/{id}/delete',[BandController::class,'delete'])->name('dashbord.bands.delete')->middleware('admin');

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

    Route::post('reset-password',[PasswordController::class,'resetPassword'])->name('auth.reset-password.reset');

})->middleware('guest');





Route::prefix('bands')->group(function(){

    Route::get('/',[BandController::class,'archive'])->name('bands.archive');

    Route::get('/{band_id}',[BandController::class,'single'])->name('bands.single');

});

Route::prefix('albums')->group(function(){

    Route::get('/',[AlbumController::class,'archive'])->name('albums.archive');  

    Route::get('/{album_id}',[AlbumController::class,'single'])->name('albums.single');


});




