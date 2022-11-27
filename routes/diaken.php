<?php

use App\Http\Controllers\LAP\TransaksiLap;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('diaken.dashboard.index');
})->name('diaken');

Route::get('laporan', function () {
    return view('diaken.lap.index');
})->name('diaken.laporan');

Route::get('laporan/pdf/transaksi', [TransaksiLap::class, 'date'])->name('lap.transaksi.pdf.date');
