<?php

use App\Http\Controllers\TbBarangController;
use App\Http\Controllers\TbTransaksiController;
use App\Models\tb_transaksi;
use Illuminate\Support\Facades\Route;

Route::resource('barang', TbBarangController::class);
Route::resource('transaksi', TbTransaksiController::class);