<?php
use App\Http\Controllers\Admin\Coupen\CoupenController;
use App\Http\Controllers\Admin\SiteSetting\SiteSettingController;
use App\Http\Controllers\Admin\UserController;

use Illuminate\Support\Facades\Route;
// AUTHENTICATION CONTROLLERS
use App\Http\Controllers\Authentication\RegistrationController;
use App\Http\Controllers\Authentication\LoginController;
// AUTHENTICATION CONTROLLERS END

// ADMIN CONTROLLERS
use App\Http\Controllers\Admin\Color\ColorController;
use App\Http\Controllers\Admin\Slider\SliderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Order\AdminOrderController;
// ADMIN CONTROLLERS END

// USER CONTROLERS 
use App\Http\Controllers\User\Frontend\FrontendController;
use App\Http\Controllers\User\Frontend\CartController;
use App\Http\Controllers\User\Frontend\CheckoutController;
use App\Http\Controllers\User\Frontend\OrderController;
use App\Http\Controllers\User\Frontend\ShopController;
// USER CONTROLLERS END
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
/*
Primary Routes Mean That They are Open For All User Anyone Can Use.
*/
// PRIMARY ROUTES
Route::get('/register',[RegistrationController::class,'index'])->name('register');
Route::post('/register',[RegistrationController::class,'register'])->name('register');
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name('login');
Route::get('logout',function(){
    session()->forget('user_id');
        return redirect('/');
});
Route::get('/',[FrontendController::class,'index']);

// PRIMARY ROUTES ENDS

// ADMIN ROUTES
Route::prefix('admin')->group(function(){
    
    Route::get('dashboard',[DashboardController::class,'index'])->name('admin_dashboard');
    // CATEGORY ROUTES
    Route::controller(CategoryController::class)->group(function(){
        Route::get('category','index');
        Route::get('category/create','create');
        Route::post('category','insert');
        Route::get('category/edit/{id}','edit');
        Route::put('category/{id}','update');
        Route::get('category/delete/{id}','delete');
    });
    // CATEGORY ROUTES ENDS

    // BRAND ROUTES
    Route::controller(BrandController::class)->group(function(){
        Route::get('brand','index');
        Route::get('brand/create','create');
        Route::post('brand','insert');
        Route::get('brand/edit/{id}','edit');
        Route::put('brand/{id}','update');
        Route::get('brand/delete/{id}','delete');
    });
    // BRAND ROUTES ENDS
    
    // PRODUCT ROUTES
    Route::controller(ProductController::class)->group(function(){
        Route::get('product','index');
        Route::get('product/create','create');
        Route::post('product','insert');
        Route::get('product/edit/{id}','edit');
        Route::put('product/{id}','update');
        Route::get('product/delete/{id}','delete');
        Route::get('product/image/{id}','delete_image');
        Route::post('product-color/{id}','update_product_color_qty');
        Route::get('product-color-delete/{id}','delete_product_color_qty');
   });
    // PRODUCT ROUTES END

    // COLOR ROUTES
    Route::controller(ColorController::class)->group(function(){
        Route::get('color','index');
        Route::get('color/create','create');
        Route::post('color','insert');
        Route::get('color/edit/{id}','edit');
        Route::put('color/{id}','update');
        Route::get('color/delete/{id}','delete');
    });
    // COLOR ROUTES END

    // SLIDER ROUTES
    Route::controller(SliderController::class)->group(function(){
        Route::get('slider','index');
        Route::get('slider/create','create');
        Route::post('slider','insert');
        Route::get('slider/edit/{slider}','edit');
        Route::put('slider/{slider}','update');
        Route::get('slider/delete/{id}','delete');
    });
    // SLIDER ROUTES END

     // ORDER ROUTES
     Route::controller(AdminOrderController::class)->group(function(){
        Route::get('order','index');
        Route::get('order/{order_id}','show');
        Route::put('order/{order_id}','update');
        Route::get('invoice/{order_id}','view_invoice');
        Route::get('invoice/generate/{order_id}','download_invoice');
        Route::get('invoice/mail/{order_id}','mail_invoice');
    });
    // ORDER ROUTES END

    // SITE SETTING ROUTES
    Route::controller(SiteSettingController::class)->group(function(){
        Route::get('settings','index');
        Route::post('settings','insert');
       
    });
    // SITE SETTING ROUTES END

    Route::controller(UserController::class)->group(function(){
        Route::get('users','index');
        Route::get('users/create','create');
        Route::post('users','insert');
        Route::get('users/edit/{id}','edit');
        Route::put('users/{id}','update');
        Route::get('users/delete/{id}','delete');
    });

    Route::controller( CoupenController::class )->group(function(){
        Route::get('coupens','index');
        Route::get('coupens/create','create');
    });
});
// ADMIN ROUTES ENDS

// USER ROUTES
Route::prefix('user')->group(function(){

  
    Route::controller(FrontendController::class)->group(function(){
         // CATEGORIES ROUTES
         Route::get('/collections','categories');
         Route::get('/collections/{category_slug}/','products');
         Route::get('/search','search_products');
         // CATEGORIES ROUTES END

        //  BRAND ROUTES
        Route::get('/brands','brands');
        Route::get('/brands/{brand_name}','products');
        // BRAND ROUTES END

    });
     //  PRODUCTS ROUTES
     Route::get('/collection/{category_slug}/{product_slug}',[FrontendController::class,'product_view']);
     // PRODUCTS ROUTES END

    // CART ROUTES
    Route::get('/cart',[CartController::class,'index']);
    // CART ROUTES END

    //CHECK-OUT ROUTES
    Route::get('checkout',[CheckoutController::class,'index']);
    Route::get('thank-you',[FrontendController::class,'thank_you']);
    //CHECK-OUT ROUTES END

    // ORDERS ROUTES
    Route::get('orders',[OrderController::class,'index']);
    Route::get('orders/{order_id}',[OrderController::class,'show']);
    
    // ORDERS ROUTES END
    Route::get('shop',[ShopController::class,'index']);
   
});
// USER ROUTES END