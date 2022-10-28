<?php

namespace App\Http\Controllers\API;

use App\Models\Jenis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JenisApi extends Controller
{
    public function index()
    {
        $data = Jenis::orderBy('nm_jenis')->get();
        return response()->json($data);
    }
}
