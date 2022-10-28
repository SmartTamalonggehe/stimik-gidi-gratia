<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Persembahan;
use Illuminate\Http\Request;

class PersembahanApi extends Controller
{
    public function index()
    {
        $data = Persembahan::orderBy('nm_persembahan')->get();
        return response()->json($data);
    }
}
