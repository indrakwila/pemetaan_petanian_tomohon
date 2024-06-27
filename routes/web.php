<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZonasiLahanController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomepageController::class, 'index'])->name('homepage.home');
Route::get('/hasilproduksi', [App\Http\Controllers\HomepageController::class, 'hasilproduksi'])->name('homepage.hasilproduksi');
Route::get('/hasilproduksi/{id}', [App\Http\Controllers\HomepageController::class, 'detailproduksi'])->name('homepage.detailproduksi');
Route::get('/kecamatan/{id}', [App\Http\Controllers\HomepageController::class, 'detailkecamatan'])->name('homepage.detailkecamatan');

Route::group(['prefix' => 'admin', 'middleware' => ['level_admin','auth']], function(){
    // users route
	
	Route::get('/home', [App\Http\Controllers\AdminController::class, 'Home'])->name('admin.home')->middleware('level_admin');
	
    Route::get('/kecamatan', [App\Http\Controllers\AdminController::class, 'tampilkecamatan'])->name('kecamatan.home')->middleware('level_admin');
    Route::get('/kecamatan/tambah', [App\Http\Controllers\AdminController::class, 'tambahkecamatan'])->name('kecamatan.tambah')->middleware('level_admin');
    Route::delete('/kecamatan/{id}', [App\Http\Controllers\AdminController::class, 'hapuskecamatan'])->name('kecamatan.hapus')->middleware('level_admin');	
    Route::post('/kecamatan/', [App\Http\Controllers\AdminController::class, 'prosestambahkecamatan'])->name('kecamatan.prosestambah')->middleware('level_admin');
    Route::get('/kecamatan/{id}', [App\Http\Controllers\AdminController::class, 'editkecamatan'])->name('kecamatan.edit')->middleware('level_admin');
    Route::put('/kecamatan/{id}', [App\Http\Controllers\AdminController::class, 'prosesupdatekecamatan'])->name('kecamatan.prosesupdate')->middleware('level_admin');	

    Route::get('/produksi', [App\Http\Controllers\AdminController::class, 'tampilproduksi'])->name('produksi.home')->middleware('level_admin');
    Route::get('/produksi/tambah', [App\Http\Controllers\AdminController::class, 'tambahproduksi'])->name('produksi.tambah')->middleware('level_admin');
    Route::delete('/produksi/{id}', [App\Http\Controllers\AdminController::class, 'hapusproduksi'])->name('produksi.hapus')->middleware('level_admin');	
    Route::post('/produksi/', [App\Http\Controllers\AdminController::class, 'prosestambahproduksi'])->name('produksi.prosestambah')->middleware('level_admin');
    Route::get('/produksi/{id}', [App\Http\Controllers\AdminController::class, 'editproduksi'])->name('produksi.edit')->middleware('level_admin');
    Route::put('/produksi/{id}', [App\Http\Controllers\AdminController::class, 'prosesupdateproduksi'])->name('produksi.prosesupdate')->middleware('level_admin');	    
	

    Route::resource('/zonasi',ZonasiLahanController::class);
}); 