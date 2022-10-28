<?php

use App\Http\Controllers\CRUD\JenisController;
use App\Http\Controllers\CRUD\PersembahanController;
use Illuminate\Support\Facades\Route;

Route::resources([
    'jenis' => JenisController::class,
    'persembahan' => PersembahanController::class
]);
