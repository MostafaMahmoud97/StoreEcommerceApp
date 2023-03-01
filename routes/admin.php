<?php

use Illuminate\Support\Facades\Route;

Route::get('/lol', function () {
    return dd('lol');
})->middleware('auth:admin');

//Auth::routes();

