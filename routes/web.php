<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\PreorderCategoryController;
use App\Http\Controllers\StockController;

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
Route::post('/testing', function(){
    dd(request());
})->name('testing');

Route::get('/test', function(){
    return view('testing.test-sidebar');
});
//log
Route::get('log-viewer/logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

Route::get('/administrator/login', fn()=>view('auth.login'))->middleware('guest')->name('login');
Route::post('/administrator/login',[AuthController::class, 'authenticate'])->middleware('guest')->name('login.post');
Route::get('/administrator/logout', [AuthController::class,'logout'])->middleware('auth')->name('logout');




Route::group(['prefix' => 'cms','middleware'=>['auth']], function () {

    // DASHBOARD
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', fn () => view('content.dashboard.home'))->name('dashboard');
    });

    // MANAJEMEN USER
    Route::group(['prefix' => 'manajemen-user'], function () {
        //ADMIN
        Route::get('/admin', [AdminController::class,'index'])->name('admin.index');
        Route::post('/admin', [AdminController::class,'store'])->name('manajemen-user.admin.store');
        Route::delete('/admin/delete',[AdminController::class,'destroy'])->name('manajemen-user.admin.destroy');
        //ADMIN ROLE
        Route::get('/role', [AdminRoleController::class,'index'])->name('role.index');
        Route::post('/role', [AdminRoleController::class,'store'])->name('manajemen-user.admin-role.store');
        Route::put('/role/update', [AdminRoleController::class,'update'])->name('manajemen-user.admin-role.update');
        Route::delete('/role/delete',[AdminRoleController::class,'destroy'])->name('manajemen-user.admin-role.destroy');
        //CUSTOMER
        Route::get('/test', fn()=>view('testing.test-sidebar'))->name('customer.index');
        
    });
    // MANAJEMEN PRODUK
    Route::group(['prefix'=>'manajemen-produk'], function(){
        //KATEGORI PRODUK
        Route::get('/productcategory', fn()=>view('content.manajemen-produk.kategori-produk'))->name('productcategory.index');

        //BRAND
        Route::get('/brand', fn()=>view('content.manajemen-produk.brand'))->name('brand.index');

        //PRODUCTMASS
        Route::get('/productmass', fn()=>view('content.manajemen-produk.productmass'))->name('productmass.index');
        Route::post('/productmass', [ProductController::class, 'store'])->name('manajemen-produk.productmass.store');
        Route::put('/productmass/update', [ProductController::class, 'update'])->name('manajemen-produk.productmass.update');
        Route::delete('/productmass/delete', [ProductController::class, 'destroy'])->name('manajemen-produk.productmass.destroy');
        
        Route::get('/productmass/tambah', fn()=>view('content.manajemen-produk.productmass.tambah'))->name('manajemen-produk.productmass.create');
        Route::get('/productmass/edit/{product_id}',[ProductController::class, 'edit'])->name('manajemen-produk.productmass.edit');
        
        //KATEGORI PREORDER
        Route::get('/kategoripreorder', fn()=>view('content.manajemen-produk.kategori-preorder.kategori-preorder'))->name('kategoripreorder.index');
        Route::post('/kategoripreorder', [PreorderCategoryController::class,'store'])->name('manajmen-produk.kategori-preorder.store');
        Route::put('/kategoripreorder/update', [PreorderCategoryController::class,'update'])->name('manajmen-produk.kategori-preorder.update');
        Route::delete('/kategoripreorder/delete', [PreorderCategoryController::class, 'destroy'])->name('manajemen-produk.kategori-preorder.destroy');

        //MERK
        Route::get('/merk', fn()=>view('content.manajemen-produk.merk'))->name('merk.index');
    });

    // PENGATURAN STOK
    Route::group(['prefix'=>'pengaturan-stok'], function(){
        // TOKO
        Route::get('/store', fn()=>view('content.pengaturan-stok.toko.index'))->name('store.index');
        Route::get('/store/tambah', fn()=>view('content.pengaturan-stok.toko.tambah'))->name('pengaturan-stok.toko.tambah');
        Route::get('/store/stock/{store_id}',fn()=>view('content.pengaturan-stok.toko.stock',['store_id' => request()->store_id,]))->name('pengaturan-stok.toko.stock');
        Route::get('/store/edit/{store_id}',[StoreController::class, 'edit'])->name('pengaturan-stok.toko.edit');

        Route::put('/store/update',[StoreController::class, 'update'])->name('pengaturan-stok.toko.update');
        Route::put('/store/stock/update', [StockController::class, 'update'])->name('pengaturan-stok.toko.stock.update');

        Route::post('/store/tambah', [StoreController::class, 'store'])->name('pengaturan-stok.toko.store');
        
        Route::delete('/store/delete', [StoreController::class, 'destroy'])->name('pengaturan-stok.toko.destroy');
        // Stock Barang
        Route::get('/stok', fn()=>view('testing.test-sidebar'))->name('stok.index');

        //Threshold Cabang
        Route::get('/thresholdcabang', fn()=>view('testing.test-sidebar'))->name('thresholdcabang.index');

        //Cabang
        Route::get('/cabang', fn()=>view('testing.test-sidebar'))->name('cabang.index');

        //Stock SB
        Route::get('/stocksb', fn()=>view('testing.test-sidebar'))->name('stocksb.index');
    });

    // POTONGAN HARGA
    Route::group(['prefix' => 'potongan-harga'], function(){
        //VOUCHER
        Route::get('/voucher', fn()=>view('testing.test-sidebar'))->name('voucher.index');

        //GRUP DISKON
        Route::get('/groupdiskon', fn()=>view('testing.test-sidebar'))->name('groupdiskon.index');

        //FLASH SALE
        Route::get('/flashsale', fn()=>view('testing.test-sidebar'))->name('flashsale.index');

        //BUNDLE
        Route::get('/bundle', fn()=>view('testing.test-sidebar'))->name('bundle.index');

        //VOUCHER OFFLINE
        Route::get('/voucheroffline', fn()=>view('testing.test-sidebar'))->name('voucheroffline.index');


    });


    // KONTEN HALAMAN HOME
    Route::group(['prefix' => 'konten-halaman-home'], function(){
        //SLIDER UTAMA
        Route::get('/homeslider', fn()=>view('testing.test-sidebar'))->name('homeslider.index');

        //BANNER GAMBAR
        Route::get('/feedgambar', fn()=>view('testing.test-sidebar'))->name('feedgambar.index');

        //GRUP PRODUK
        Route::get('/grupproduk', fn()=>view('testing.test-sidebar'))->name('grupproduk.index');

        //SLIDER GAMBAR
        Route::get('/decorationslider.index', fn()=>view('testing.test-sidebar'))->name('decorationslider.index');
        
        //KONTEN POP UP
        Route::get('/popup.index', fn()=>view('testing.test-sidebar'))->name('popup.index');

        //TAMPILAN KONTEN HALAMAN HOME
        Route::get('/posisigrup.index', fn()=>view('testing.test-sidebar'))->name('posisigrup.index');
        
    });


    // PENGATURAN KONTEN
    Route::group(['prefix' => 'pengaturan-konten'], function(){
        //NOTIFIKASI
        Route::get('/notifikasi', fn()=>view('testing.test-sidebar'))->name('notifikasi.index');

        //KURIR
        Route::get('/kurir', fn()=>view('testing.test-sidebar'))->name('kurir.index');

        //VARIABLE
        Route::get('/variable', fn()=>view('testing.test-sidebar'))->name('variable.index');

        //KIRIM PUSH NOTIFICATION
        Route::get('/pushnotif', fn()=>view('testing.test-sidebar'))->name('pushnotif.index');

        //AKOIN
        Route::get('/akoin', fn()=>view('testing.test-sidebar'))->name('akoin.index');
    });

    // TRANSAKSI
    Route::group(['prefix' => 'transaksi'],function(){
        //DAFTAR TRANSAKSI
        Route::get('/daftartransaksi', fn()=>view('testing.test-sidebar'))->name('daftartransaksi.index');

        //PARAMETER
        Route::get('/parameter', fn()=>view('testing.test-sidebar'))->name('parameter.index');

        //METODE PEMBAYARAN
        Route::get('/metodebayar', fn()=>view('testing.test-sidebar'))->name('metodebayar.index');

        //WAKTU PENGIRIMAN
        Route::get('/waktupengiriman', fn()=>view('testing.test-sidebar'))->name('waktupengiriman.index');

        //DONASI
        Route::get('/donasi', fn()=>view('testing.test-sidebar'))->name('donasi.index');

        //EXPORT TRANSAKSI BKL
        Route::get('/exportpesanan', fn()=>view('testing.test-sidebar'))->name('exportpesanan.index');

        //LAPORAN KENDALA
        Route::get('/laporankendalareguler', fn()=>view('testing.test-sidebar'))->name('laporankendalareguler.index');
    });

    // TRANSAKSI DIGITAL
    Route::group(['prefix'=>'transaksi-digital'],function(){
        //DAFTAR TRANSAKSI
        Route::get('/daftartransaksidigital', fn()=>view('testing.test-sidebar'))->name('daftartransaksidigital.index');

        //KATEGORI KENDALA
        Route::get('/kategorikendala', fn()=>view('testing.test-sidebar'))->name('kategorikendala.index');

        //LAPORAN KENDALA
        Route::get('/laporankendala', fn()=>view('testing.test-sidebar'))->name('laporankendala.index');
        
        //BILLER
        Route::get('/biller', fn()=>view('testing.test-sidebar'))->name('biller.index');

        //PULSA & PAKET DATA
        Route::get('/ppd', fn()=>view('testing.test-sidebar'))->name('ppd.index');

        //DOWNLOAD FILE REKON
        Route::get('/filerekon', fn()=>view('testing.test-sidebar'))->name('filerekon.index');
        
    });

    // LAPORAN
    Route::group(['prefix'=>'laporan'],function(){
        //Produk
        Route::get('/laporanproduk', fn()=>view('testing.test-sidebar'))->name('laporanproduk.index');

        //PENJUALAN
        Route::get('/laporanpenjualan', fn()=>view('testing.test-sidebar'))->name('laporanpenjualan.index');

        //PROMO
        Route::get('/laporanpromo', fn()=>view('testing.test-sidebar'))->name('laporanpromo.index');

        //LAPORAN UTAMA
        Route::get('/laporanutama', fn()=>view('testing.test-sidebar'))->name('laporanutama.index');

    });

    // MEMBERSHIP
    Route::group(['prefix'=>'membership'],function(){

    });
    
});

