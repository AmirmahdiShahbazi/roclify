<?php

use App\Http\Controllers\Album\AlbumController;
use App\Http\Controllers\Band\BandController;
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



