<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BahanBatikController extends Controller
{
    public function index()
    {
        return view('bahan_batik');
    }
}
