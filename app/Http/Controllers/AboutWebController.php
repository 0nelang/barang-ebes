<?php

namespace App\Http\Controllers;

use App\About;
use App\Setting;
use App\Value;

class AboutWebController extends Controller
{
    public function index()
    {
        $data['setting'] = Setting::first();
        $data['about'] = About::first();
        $data['values'] = Value::all();
        return view('about', $data);
    }
}
