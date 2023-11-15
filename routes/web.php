<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\PreorderCategoryController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/testing', fn()=>view('testing.paginate'));
//log
Route::get('log-viewer/logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

Route::get('/administrator/login', fn()=>view('auth.login'))->middleware('guest')->name('login');
Route::post('/administrator/login',[AuthController::class, 'authenticate'])->middleware('guest')->name('login.post');
Route::get('/administrator/logout', [AuthController::class,'logout'])->middleware('auth')->name('logout');




Route::group(['prefix' => 'cms','middleware'=>['auth']], function () {

    // DASHBOARD
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('home', fn () => view('content.dashboard.home'))->name('dashboard.home.index');
    });

    // MANAJEMEN USER
    Route::group(['prefix' => 'manajemen-user'], function () {
        //ADMIN
        Route::get('/admin', [AdminController::class,'index'])->name('manajemen-user.admin.index');
        Route::post('/admin', [AdminController::class,'store'])->name('manajemen-user.admin.store');
        Route::delete('/admin/delete',[AdminController::class,'destroy'])->name('manajemen-user.admin.destroy');
        //ADMIN ROLE
        Route::get('/admin-role', [AdminRoleController::class,'index'])->name('manajemen-user.admin-role.index');
        Route::post('/admin-role', [AdminRoleController::class,'store'])->name('manajemen-user.admin-role.store');
        Route::put('/admin-role/update', [AdminRoleController::class,'update'])->name('manajemen-user.admin-role.update');
        Route::delete('/admin-role/delete',[AdminRoleController::class,'destroy'])->name('manajemen-user.admin-role.destroy');
        
    });
    // MANAJEMEN PRODUK
    Route::group(['prefix'=>'manajemen-produk'], function(){
        //KATEGORI PRODUK
        Route::get('/kategori-produk', fn()=>view('content.manajemen-produk.kategori-produk'))->name('manajemen-produk.kategori-produk.index');

        //BRAND
        Route::get('/brand', fn()=>view('content.manajemen-produk.brand'))->name('manajemen-produk.brand.index');

        //PRODUCTMASS
        Route::get('/productmass', fn()=>view('content.manajemen-produk.productmass'))->name('manajemen-produk.productmass.index');
        Route::delete('/productmass/delete', [ProductController::class, 'destroy'])->name('manajemen-produk.productmass.destroy');
        
        Route::post('/productmass/tambah', fn()=>view('content.manajemen-produk.productmass.tambah'))->name('manajemen-produk.productmass.create');
        Route::get('/productmass/edit/{product_id}',[ProductController::class, 'edit'])->name('manajemen-produk.productmass.edit');
        
        //KATEGORI PREORDER
        Route::get('/kategori-preorder', fn()=>view('content.manajemen-produk.kategori-preorder.kategori-preorder'))->name('manajemen-produk.kategori-preorder.index');
        Route::post('/kategori-preorder', [PreorderCategoryController::class,'store'])->name('manajmen-produk.kategori-preorder.store');
        Route::put('/kategori-preorder/update', [PreorderCategoryController::class,'update'])->name('manajmen-produk.kategori-preorder.update');
        Route::delete('/kategori-preorder/delete', [PreorderCategoryController::class, 'destroy'])->name('manajemen-produk.kategori-preorder.destroy');

        //MERK
        Route::get('/merk', fn()=>view('content.manajemen-produk.merk'))->name('manajemen-produk.merk.index');
    });

    // PENGATURAN STOK
    Route::group(['prefix'=>'pengaturan-stok'], function(){
        // TOKO
        Route::get('/toko', fn()=>view('content.pengaturan-stok.toko.index'))->name('pengaturan-stok.toko.index');
        Route::get('/toko/tambah', fn()=>view('content.pengaturan-stok.toko.tambah'))->name('pengaturan-stok.toko.tambah');
        Route::get('/toko/edit/{store_id}',[StoreController::class, 'edit'])->name('pengaturan-stok.toko.edit');
        Route::get('/toko/stock/{store_id}',[StoreController::class, 'stock'])->name('pengaturan-stok.toko.stock');
        Route::put('/toko/update',[StoreController::class, 'update'])->name('pengaturan-stok.toko.update');
        Route::post('/toko/tambah', [StoreController::class, 'store'])->name('pengaturan-stok.toko.store');
        Route::delete('/toko/delete', [StoreController::class, 'destroy'])->name('pengaturan-stok.toko.destroy');
        
    });
});
