<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminMainController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\MasterCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Seller\SellerMainController;
use App\Http\Controllers\Seller\SellerStoreController;
use App\Http\Controllers\Seller\SellerProductController;
use App\Http\Controllers\Customer\CustomerMainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'rolemanager:customer'])->name('dashboard');

// admin routes
Route::middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {
    Route::prefix('admin')->group(function(){
        Route::controller(AdminMainController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('admin');
            Route::get('/settings', 'setting')->name('admin.settings');
            Route::get('/manage/users', 'manage_user')->name('admin.manage.user');
            Route::get('/manage/stores', 'manage_store')->name('admin.manage.store');
            Route::get('/cart/history', 'cart_history')->name('admin.cart.history');
            Route::get('/order/history', 'order_history')->name('admin.order.history');
        });

        Route::controller(CategoryController::class)->group(function () {
                Route::get('/category/create', 'index')->name('admin.category.create');
                Route::get('/category/manage', 'manage')->name('admin.category.manage');
        });

        Route::controller(ProductController::class)->group(function () {
                Route::get('/product/manage', 'index')->name('admin.product.manage');
                Route::get('/product/review', 'review_manage')->name('admin.product.manage_product_review');
        });

        Route::controller(MasterCategoryController::class)->group(function () {
                Route::post( '/store/category', 'storecat')->name('store.cat');
                Route::get( '/category/{id}', 'showcat')->name('show.cat');
                Route::put( '/category/update/{id}', 'updatecat')->name('update.cat');
                Route::delete( '/category/delete/{id}', 'deletecat')->name('delete.cat');
        });
    });
});


// vendor routes
Route::middleware(['auth', 'verified', 'rolemanager:vendor'])->group(function () {
    Route::prefix('vendor')->group(function(){
        Route::controller(SellerMainController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('vendor');
            Route::get('/order/history', 'orderhistory')->name('vendor.order.history');
        });

        Route::controller(SellerStoreController::class)->group(function () {
            Route::get('/store/create', 'index')->name('vendor.store');
            Route::get('/store/manage', 'manage')->name('vendor.store.manage');
        });

        Route::controller(SellerProductController::class)->group(function () {
            Route::get('/product/create', 'index')->name('vendor.product');
            Route::get('/product/manage', 'manage')->name('vendor.product.manage');
        });
    });
});


// cutomer routes
Route::middleware(['auth', 'verified', 'rolemanager:customer'])->group(function () {
    Route::prefix('user')->group(function(){
        Route::controller(CustomerMainController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('dashboard');
            Route::get('/order/history', 'history')->name('customer.history');
            Route::get('/setting/payment', 'payment')->name('customer.payment');
            Route::get('/affiliate', 'affiliate')->name('customer.affiliate');
        });
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
