<?php

use App\Http\Controllers\CRUD\JenisController;
use App\Http\Controllers\CRUD\PersembahanController;
use App\Http\Controllers\CRUD\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::resources([
    'jenis' => JenisController::class,
    'persembahan' => PersembahanController::class,
    'transaksi' => TransaksiController::class,
]);
