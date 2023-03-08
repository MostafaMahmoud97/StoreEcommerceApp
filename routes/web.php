<?php

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

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/{name_route}',function ($name_route){
//    return view($name_route);
//});


Route::controller(\App\Http\Controllers\User\UserController::class)->prefix('user')->group(function (){
   Route::get('/profile','showProfile')->name('user.profile');
   Route::post('/update-profile','editUser')->name('user.update.profile');
});

Route::controller(\App\Http\Controllers\User\Product\ProductController::class)->group(function (){
    Route::get('/home','index')->name('home');
    Route::post('/home','filterProducts')->name('home.filter');
});
