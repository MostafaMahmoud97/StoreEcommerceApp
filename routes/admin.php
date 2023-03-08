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

    Route::controller(\App\Http\Controllers\Admin\Categories\CategoryController::class)->prefix('categories')->group(function (){
        Route::get('/','index')->name("admin.category.index");
        Route::post('/store','store')->name("admin.category.store");
        Route::get('/update/{id}','update')->name("admin.category.update");
        Route::put('/edit/{id}','edit')->name('admin.category.edit');
        Route::get('/delete/{id}','delete')->name('admin.category.delete');
    });

    Route::controller(\App\Http\Controllers\Admin\Products\ProductController::class)->prefix('products')->group(function (){
       Route::get('/','index')->name('admin.product.index');
       Route::post('/store','store')->name("admin.product.store");
       Route::get('/gallery/{id}','showProductGallery')->name("admin.product.gallery");
       Route::get('/show-details/{id}','showProductColorSize')->name("admin.product.details");
       Route::post('/update-product-color-size','updateProductColorSize')->name("admin.product.detail.update");
    });
});



