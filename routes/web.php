<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\DateOfInjectionController;
use App\Http\Controllers\Admin\OxyController;
use App\Http\Controllers\Admin\OxyProducerController;
use App\Http\Controllers\Admin\QLRegisterController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Admin\SignUpVaccController;
use App\Http\Controllers\Admin\UserProfileController;
use App\Http\Controllers\DetailOxyController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\User\FormInfoController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserOrderController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/oxy/{slug}', [DetailOxyController::class, 'index'])->name('oxy.detail');
Route::get('/oxy/detail/payment', [DetailOxyController::class, 'payment'])->name('oxy.detail.payment');
Route::post('/oxy/order', [OrderController::class, 'order'])->name('oxy.order');

Route::middleware('auth')->group(function () {
    Route::get('signupvacc', [SignUpVaccController::class, 'index'])->name('signupvacc');
    Route::post('signupvacc/register', [SignUpVaccController::class, 'register'])->name('signupvacc.register');
});

Route::middleware(['auth', 'authAdmin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        //oxy_producer
        Route::get('oxy_producer', [OxyProducerController::class, 'index'])->name('admin.oxy_producer');
        Route::get('oxy_producer/read', [OxyProducerController::class, 'read'])->name('admin.oxy_producer.read');
        Route::get('oxy_producer/create', [OxyProducerController::class, 'create'])->name('admin.oxy_producer.create');
        Route::post('oxy_producer/store', [OxyProducerController::class, 'store'])->name('admin.oxy_producer.store');
        Route::get('oxy_producer/edit/{id}', [OxyProducerController::class, 'edit'])->name('admin.oxy_producer.edit');
        Route::delete('oxy_producer/remove/{id}', [OxyProducerController::class, 'remove'])->name('admin.oxy_producer.remove');
        // oxy
        Route::get('oxy_product', [OxyController::class, 'index'])->name('admin.oxy_product');
        Route::post('oxy_product/post', [OxyController::class, 'post'])->name('admin.oxy_product.post');
        Route::get('oxy_product/read', [OxyController::class, 'read'])->name('admin.oxy_product.read');
        Route::get('oxy_product/create', [OxyController::class, 'create'])->name('admin.oxy_product.create');
        Route::post('oxy_product/store', [OxyController::class, 'store'])->name('admin.oxy_product.store');
        Route::get('oxy_product/edit/{id}', [OxyController::class, 'edit'])->name('admin.oxy_product.edit');
        Route::delete('oxy_product/remove/{id}', [OxyController::class, 'remove'])->name('admin.oxy_product.remove');
        // order
        Route::get('orders', [OrderController::class, 'index'])->name('admin.order');
        Route::get('orders/detail/{id}', [OrderController::class, 'detail'])->name('admin.order.detail');
        Route::post('orders/detail/update/{id}', [OrderController::class, 'update'])->name('admin.order.update');
        Route::get('orders/item', [OrderController::class, 'getItem'])->name('admin.order.item');
        //DateOfInjection
        Route::get('date', [DateOfInjectionController::class, 'index'])->name('admin.date');
        Route::get('date/read', [DateOfInjectionController::class, 'read'])->name('admin.date.read');
        Route::get('date/create', [DateOfInjectionController::class, 'create'])->name('admin.date.create');
        Route::post('date/store', [DateOfInjectionController::class, 'store'])->name('admin.date.store');
        Route::get('date/edit/{id}', [DateOfInjectionController::class, 'edit'])->name('admin.date.edit');
        Route::delete('date/remove/{id}', [DateOfInjectionController::class, 'remove'])->name('admin.date.remove');
        //QL register
        Route::get('register-vaccine', [QLRegisterController::class, 'index'])->name('admin.register-vaccine');
        Route::get('register-vaccine/read', [QLRegisterController::class, 'read'])->name('admin.register-vaccine.read');
        Route::get('register-vaccine/create', [QLRegisterController::class, 'create'])->name('admin.register-vaccine.create');
        Route::post('register-vaccine/store', [QLRegisterController::class, 'store'])->name('admin.register-vaccine.store');
        Route::get('register-vaccine/edit/{id}', [QLRegisterController::class, 'edit'])->name('admin.register-vaccine.edit');
        Route::delete('register-vaccine/remove/{id}', [QLRegisterController::class, 'remove'])->name('admin.register-vaccine.remove');
        // order
        Route::get('user-profile', [UserProfileController::class, 'index'])->name('admin.user-profile');
        Route::get('user-profile/detail/{id}', [UserProfileController::class, 'detail'])->name('admin.user-profile.detail');
        Route::post('user-profile/detail/update/{id}', [UserProfileController::class, 'update'])->name('admin.user-profile.update');
        Route::get('user-profile/item', [UserProfileController::class, 'getItem'])->name('admin.user-profile.item');
    });
});

Route::middleware('auth')->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
        // form information
        Route::get('/formInfo', [FormInfoController::class, 'index'])->name('user.formInfo');
        Route::post('/formInfo/update', [FormInfoController::class, 'update'])->name('user.formInfo.update');

        Route::get('orders', [UserOrderController::class, 'index'])->name('user.orders');
        Route::get('orders/detail/{id}', [UserOrderController::class, 'detail'])->name('user.orders.detail');
        Route::post('orders/update/{id}', [UserOrderController::class, 'update'])->name('user.orders.update');
        Route::get('orders/item', [UserOrderController::class, 'getItem'])->name('user.orders.item');
    });
});
