<?php

use App\Http\Controllers\admin\AuthController;

use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminAuthMiddleware;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\Ajax\ChangePublishController;
use App\Http\Controllers\customer\CustomerAuthController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\admin\OrderController;










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


/*CUSTOMER ROUTES*/


Route::get('/', [HomeController::class, 'index'])->name('customer.index');
Route::post('/tim-kiem', [HomeController::class, 'search'])->name('customer.search');


Route::get('category/{cat}', [HomeController::class, 'category'])->name('home.category');
Route::get('/chi-tiet-san-pham/{product}', [HomeController::class, 'product'])->name('home.product');


Route::group(['prefix' => 'cart', 'middleware' => 'customer'], function () {
    Route::get('/', [CartController::class,'index'], )->name('cart.index');
    Route::get('/add/{product}', [CartController::class,'add'], )->name('cart.add');
    Route::get('/delete/{product}', [CartController::class,'delete'], )->name('cart.delete');
    Route::get('/update/{product}', [CartController::class,'update'], )->name('cart.update');
    Route::get('/clear', [CartController::class,'clear'], )->name('cart.clear');
});

Route::group(['prefix' => 'order', 'middleware' => 'customer'], function () {
    Route::get('/checkout', [CheckoutController::class,'checkout'] )->name('order.checkout');
    Route::post('/checkout', [CheckoutController::class,'check_checkout'])->name('order.check_checkout');;
    Route::get('/verify/{token}', [CheckoutController::class,'verify'] )->name('order.verify');
    Route::get('/history', [CheckoutController::class,'history'] )->name('order.history');
    Route::get('/detail/{order}', [CheckoutController::class,'detail'] )->name('order.detail');
    
    Route::post('/momo_payment', [CheckoutController::class,'momo_payment'] )->name('order.checkout.momo');

    
});







Route::group(['prefix' => 'account'], function () {

    Route::get('/login', [CustomerAuthController::class,'index'], )->name('customer.account.login');
    Route::post('/login', [CustomerAuthController::class,'check_login'], )->name('customer.account.check_login');

    Route::get('logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');


    Route::get('/register', [CustomerAuthController::class,'register'], )->name('customer.account.register');
    Route::post('/register', [CustomerAuthController::class,'check_register'], )->name('customer.account.check_register');

    Route::get('/verify-account/{email}', [CustomerAuthController::class,'verify_account'], )->name('customer.account.verify');

    Route::get('/profile', [CustomerAuthController::class,'profile'], )->name('customer.account.profile');

});






/*ADMIN ROUTES*/


Route::group(['prefix' => 'dashboard'], function () {

    Route::get('login', [AuthController::class, 'index'])->name('admin.auth.index');
    Route::post('login', [AuthController::class, 'login'])->name('admin.auth.login');
    Route::get('logout', [AuthController::class, 'logout'])->name('admin.auth.logout');
    Route::get('/order', [OrderController::class, 'index'])->name('admin.order.index');
    Route::get('/order/detail/{order}', [OrderController::class, 'order_detail'])->name('admin.order.detail');
    Route::get('/order/update/{order}', [OrderController::class, 'update'])->name('admin.order.update');

});




/*DASHBOARD*/
Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboad.index')
    ->middleware(AdminAuthMiddleware::class);

/*USER*/

Route::group(['prefix' => 'user'], function () {

    Route::get('index', [UserController::class, 'index'])
        ->name('admin.dashboad.user')->middleware(AdminAuthMiddleware::class);
    Route::get('create', [UserController::class, 'create'])
        ->name('admin.user.create')->middleware(AdminAuthMiddleware::class);

    Route::post('create', [UserController::class, 'store'])
        ->name('admin.user.store')->middleware(AdminAuthMiddleware::class);

    // Route::post('update/{id}', [UserController::class, 'edit'])
    //     ->name('admin.user.edit')->middleware(AdminAuthMiddleware::class);

    // Route::get('update/{id}', [UserController::class, 'update'])
    //     ->name('admin.user.update')->middleware(AdminAuthMiddleware::class);

    Route::get('edit/{id}', [UserController::class, 'edit'])
        ->name('admin.user.edit')->middleware(AdminAuthMiddleware::class);

    Route::put('update/{id}', [UserController::class, 'update'])
        ->name('admin.user.update')->middleware(AdminAuthMiddleware::class);

    Route::get('delete/{id}', [UserController::class, 'delete'])
        ->name('admin.user.delete')->middleware(AdminAuthMiddleware::class);

    Route::delete('delete/{id}', [UserController::class, 'destroy'])
        ->name('admin.user.destroy')->middleware(AdminAuthMiddleware::class);

    Route::get('index/{keyword}', [UserController::class, 'paginationByKeyword'])
        ->name('admin.user.find')->middleware(AdminAuthMiddleware::class);
});



/*CATEGORY*/
Route::resource('category', CategoryController::class)->middleware(AdminAuthMiddleware::class);

/*PRODUCT*/
Route::resource('product', ProductController::class)->middleware(AdminAuthMiddleware::class);
Route::get('delete-image-product/{image}',[ProductController::class,'deleteImage'])->name('product.deleteImage');




/*AJAX*/

// Route::post('ajax/user/changeStatus', ChangePublishController::class, '__invoke')
//     ->name('ajax.dashboard.changeStatus')->middleware(AdminAuthMiddleware::class);


// Route::get('user', [UserController::class, 'index'])
//     ->name('admin.dashboad.user')->middleware(AdminAuthMiddleware::class);


// Route::get('user/create', [UserController::class, 'create'])
//     ->name('admin.user.create')->middleware(AdminAuthMiddleware::class);
