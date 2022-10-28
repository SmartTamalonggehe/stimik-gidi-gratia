<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard.index');
})->name('admin');

Route::get('jenis', function () {
    return view('admin.jenis.index');
})->name('admin.jenis');

Route::get('persembahan', function () {
    return view('admin.persembahan.index');
})->name('admin.persembahan');

Route::get('transaksi/{jenis}', function ($jenis) {
    return view('admin.transaksi.index', compact('jenis'));
})->name('admin.transaksi');
