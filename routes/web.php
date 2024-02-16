<?php

use App\Http\Controllers\admincontroller;
use App\Http\Controllers\kasircontroller;
use App\Http\Controllers\ownercontroller;
use App\Http\Controllers\usercontroller;
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
route::middleware(['auth'])->group(function () {

    //kasir
    route::get('kasir',[kasircontroller::class,'kasir'])->name('kasir');
    route::post('postpilih/{id}',[kasircontroller::class,'postpilih'])->name('postpilih');
    route::get('report',[kasircontroller::class,'report'])->name('report');
    route::get('paket/{paket}',[kasircontroller::class,'paket'])->name('paket');
    route::get('cetakpdf/{transaksi}',[kasircontroller::class,'cetakpdf'])->name('cetakpdf');

    //user
    route::get('logout',[usercontroller::class,'logout'])->name('logout');
    route::get('log',[usercontroller::class,'log'])->name('log');
    route::get('user',[usercontroller::class,'user'])->name('user');
    route::get('search',[usercontroller::class,'search'])->name('search');
    route::get('hapususer/{user}',[usercontroller::class,'hapususer'])->name('hapususer');
    route::post('postuser',[usercontroller::class,'postuser'])->name('postuser');
    route::post('postedituser/{user}',[usercontroller::class,'postedituser'])->name('postedituser');
    route::get('edituser/{user}',[usercontroller::class,'edituser'])->name('edituser');

    //owner
    route::get('cetakpdfow/',[ownercontroller::class,'cetakpdfow'])->name('cetakpdfow');
    route::get('pdfByDate/',[ownercontroller::class,'pdfByDate'])->name('pdfByDate');
    route::get('cetakpdfo/{transaksi}',[ownercontroller::class,'cetakpdfo'])->name('cetakpdfo');
    route::get('reportowner',[ownercontroller::class,'reportowner'])->name('reportowner');
    route::get('clearAll',[ownercontroller::class,'clearAll'])->name('clearAll');

    //admin
    route::post('posttambah',[admincontroller::class,'posttambah'])->name('posttambah');
    route::post('postedit/{produk}',[admincontroller::class,'postedit'])->name('postedit');
    route::get('tambah',[admincontroller::class,'tambah'])->name('tambah');
    route::get('home',[admincontroller::class,'home'])->name('home');
    route::get('hapus/{produk}',[admincontroller::class,'hapus'])->name('hapus');
    route::get('edit/{produk}',[admincontroller::class,'edit'])->name('edit');
});
route::get('/',[usercontroller::class,'login'])->name('login');
route::post('postlogin',[usercontroller::class,'postlogin'])->name('postlogin');
