<?php

use App\Http\Controllers\API\JenisApi;
use App\Http\Controllers\API\PersembahanApi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('jenis', [JenisApi::class, 'index'])->name('api.jenis');
Route::get('persembahan', [PersembahanApi::class, 'index'])->name('api.persembahan');
