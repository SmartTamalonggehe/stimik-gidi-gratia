<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiApi extends Controller
{
    public function index()
    {
        $data = Transaksi::all();
        return response()->json($data);
    }
}
