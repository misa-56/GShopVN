<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Str;
// $random = Str::random(8);



Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login', [LoginController::class, 'store']);

Route::middleware(['AdminRole'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);

        #Menu
        Route::prefix('menus')->group(function () {
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
        });

        #Product
        Route::prefix('products')->group(function () {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index']);
            Route::get('edit/{product}', [ProductController::class, 'show']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
            Route::DELETE('destroy', [ProductController::class, 'destroy']);
            Route::get('attribute/{product_id}', [ProductAttributeController::class, 'show']);
            // Route::match(['get','post'], [ProductAttributeController::class, 'insert']);
            Route::post('attribute/{product_id}', [ProductAttributeController::class, 'add']);
        });
        #Attribute
        // Route::prefix('products')->group(function () {
        //     Route::get('attribute', [ProductAttributeController::class, 'add']);
            // Route::post('add', [ProductController::class, 'store']);
            // Route::get('list', [ProductController::class, 'index']);
            // Route::get('edit/{product}', [ProductController::class, 'show']);
            // Route::post('edit/{product}', [ProductController::class, 'update']);
            // Route::DELETE('destroy', [ProductController::class, 'destroy']);
        // });
        #Pages
        Route::prefix('pages')->group(function () {
            Route::get('list', [PageController::class, 'index']);
            Route::get('edit/{page}', [PageController::class, 'show']);
            Route::post('edit/{page}', [PageController::class, 'update']);
        });

        #Slider
        Route::prefix('sliders')->group(function () {
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store']);
            Route::get('list', [SliderController::class, 'index']);
            Route::get('edit/{slider}', [SliderController::class, 'show']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);
            Route::DELETE('destroy', [SliderController::class, 'destroy']);
        });

        #Upload
        Route::post('upload/services', [\App\Http\Controllers\Admin\UploadController::class, 'store']);

        #Cart
        Route::get('customers', [\App\Http\Controllers\Admin\CartController::class, 'index']);
        Route::get('customers/view/{customer}', [\App\Http\Controllers\Admin\CartController::class, 'show']);
        Route::post('customers/view/{customer}', [\App\Http\Controllers\Admin\CartController::class, 'admin_update']);
    });
});

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('home');
Route::post('/services/load-product', [App\Http\Controllers\MainController::class, 'loadProduct']);

#User

Route::post('/register', [App\Http\Controllers\LoginController::class, 'signup'])->name('signup');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'signin']);
Route::get('/logout', [App\Http\Controllers\LoginController::class, 'logout']);
Route::get('/quen-mat-khau', [App\Http\Controllers\ForgotPasswordController::class, 'getEmail']);
Route::post('/quen-mat-khau', [App\Http\Controllers\ForgotPasswordController::class, 'postEmail']);
Route::get('/dat-lai-mat-khau/{token}', [App\Http\Controllers\ResetPasswordController::class, 'getPassword']);
Route::post('/dat-lai-mat-khau', [App\Http\Controllers\ResetPasswordController::class, 'updatePassword']);
//social
Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('auth', [SocialController::class, 'loginUsingFacebook'])->name('login');
    Route::get('callback', [SocialController::class, 'callbackFromFacebook'])->name('callback');
});
Route::prefix('google')->name('google.')->group( function(){
    Route::get('login', [SocialController::class, 'loginUsingGoogle'])->name('login');
    Route::get('callback', [SocialController::class, 'callbackFromGoogle'])->name('callback');
});

#Profile User
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index']);
Route::post('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('update');
Route::get('/my-order', [App\Http\Controllers\ProfileController::class, 'my_order']);
Route::get('/my-order/view/{customer}', [App\Http\Controllers\ProfileController::class, 'detail']);
Route::get('/profile_logout', [App\Http\Controllers\ProfileController::class, 'profile_logout']);

#Danh muc
Route::get('danh-muc/{slug}.html', [App\Http\Controllers\MenuController::class, 'index']);
#Product
Route::get('san-pham/{id}-{name}.html', [App\Http\Controllers\ProductController::class, 'index']);
Route::post('san-pham/{id}-{name}.html', [App\Http\Controllers\ProductController::class, 'additional_information']);
Route::get('san-pham', [App\Http\Controllers\AllProductController::class, 'index']);
Route::get('/services/load-product', [App\Http\Controllers\AllProductController::class, 'loadProduct']);
//cart
Route::post('add-cart', [App\Http\Controllers\CartController::class, 'index']);
Route::get('carts', [App\Http\Controllers\CartController::class, 'show']);
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'update']);
Route::get('carts/delete/{id}', [App\Http\Controllers\CartController::class, 'remove']);
Route::post('carts', [App\Http\Controllers\CartController::class, 'addCart']);
//checkout
Route::get('checkout', [App\Http\Controllers\CartController::class, 'checkout']);
Route::get('checkout/{customer}-{order_key}', [App\Http\Controllers\CartController::class, 'checkout'])->name('checkout');
// Route::get('checkout/{customer}/'. $random, [App\Http\Controllers\CartController::class, 'checkout'])->name('checkout');




#pages
Route::get('{id}-{slug}', [App\Http\Controllers\PageController::class, 'index']);

#search
Route::get('search',[App\Http\Controllers\SearchController::class, 'getSearch'])->name('search');
