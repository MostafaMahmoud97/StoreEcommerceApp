<?php

use Illuminate\Support\Facades\Route;



Route::group(['middleware' => 'auth.admin'],function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'indexAdmin'])->name('admin.home');
    Route::controller(\App\Http\Controllers\User\UserController::class)->group(function (){
        Route::get('/profile','showProfile')->name('admin.profile');
        Route::post('/update-profile','editUser')->name('admin.update.profile');
    });

    Route::controller(\App\Http\Controllers\Admin\Settings\SettingController::class)->prefix('setting')->group(function (){
        Route::get('/','showSettingPage')->name('admin.setting.show');
        Route::put('/{id}','updateSetting')->name('admin.setting.update');
    });
});



