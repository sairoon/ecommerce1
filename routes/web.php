<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\CustomerDashboardController;

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

Route::get('/',[EcommerceController::class,'index'])->name('home');
Route::get('/shop/{id}',[EcommerceController::class,'shop'])->name('shop');
Route::get('/product-details/{id}',[EcommerceController::class,'productDetails'])->name('product-details');

Route::post('/cart/add/{id}',[CartController::class,'index'])->name('cart.add');
Route::get('/cart/show',[CartController::class,'show'])->name('cart.show');
Route::get('/cart/remove/{id}',[CartController::class,'remove'])->name('cart.remove');
Route::post('/cart/update/{id}',[CartController::class,'update'])->name('cart.update');

Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');
Route::post('/order/new',[CheckoutController::class,'newOrder'])->name('order.new');
Route::get('/order/complete',[CheckoutController::class,'completeOrder'])->name('complete-order');

Route::get('/customer/login', [CustomerAuthController::class,'login'])->name('customer.login');
Route::post('/customer/login', [CustomerAuthController::class,'loginCheck'])->name('customer.login');
Route::post('/customer/register', [CustomerAuthController::class,'register'])->name('customer.register');
Route::post('/customer/logout', [CustomerAuthController::class,'logout'])->name('customer.logout');

Route::get('/customer/dashboard', [CustomerDashboardController::class,'index'])->name('customer.dashboard')->middleware('customer');
Route::get('/customer/all-order', [CustomerDashboardController::class,'allOrder'])->name('customer.all-order')->middleware('customer');



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::get('/category',[CategoryController::class,'index'])->name('category');
    Route::post('/category',[CategoryController::class,'saveCategory'])->name('category');
    Route::get('/status/{id}',[CategoryController::class,'status'])->name('status');
    Route::post('/delete',[CategoryController::class,'categoryDelete'])->name('delete');
    Route::get('/edit/{id}',[CategoryController::class,'categoryEdit'])->name('edit');


    Route::get('/sub-category',[SubCategoryController::class,'index'])->name('sub-category');
    Route::post('/sub-category',[SubCategoryController::class,'saveSubCategory'])->name('sub-category');
    Route::get('/sub-status/{id}',[SubCategoryController::class,'status'])->name('sub-status');
    Route::post('/sub-delete',[SubCategoryController::class,'subCategoryDelete'])->name('sub-delete');
    Route::get('/sub-edit/{id}',[SubCategoryController::class,'subCategoryEdit'])->name('sub-edit');
    Route::post('/update-sub-category/{id}',[SubCategoryController::class,'subCategoryUpdate'])->name('update-sub-category');

    Route::get('/brand/add',[BrandController::class,'index'])->name('brand.add');
    Route::post('/brand/create',[BrandController::class,'create'])->name('brand.create');
    Route::get('/brand/edit/{id}',[BrandController::class,'edit'])->name('brand.edit');
    Route::post('/brand/update/{id}',[BrandController::class,'update'])->name('brand.update');
    Route::get('/brand/delete/{id}',[BrandController::class,'delete'])->name('brand.delete');

    Route::get('/product/add',[ProductController::class,'index'])->name('product.add');
    Route::post('/product/create',[ProductController::class,'create'])->name('product.create');
    Route::get('/product/manage',[ProductController::class,'manage'])->name('product.manage');
    Route::get('/product/detail/{id}',[ProductController::class,'detail'])->name('product.detail');
    Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::post('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
    Route::get('/product/delete/{id}',[ProductController::class,'delete'])->name('product.delete');

    Route::get('/admin/order-manage',[AdminOrderController::class,'manage'])->name('admin.manage-order');
    Route::get('/admin/order-detail/{id}',[AdminOrderController::class,'detail'])->name('admin.order-detail');
    Route::get('/admin/order-invoice/{id}',[AdminOrderController::class,'invoice'])->name('admin.order-invoice');
    Route::get('/admin/order-delete/{id}',[AdminOrderController::class,'delete'])->name('admin.order-delete');

});
