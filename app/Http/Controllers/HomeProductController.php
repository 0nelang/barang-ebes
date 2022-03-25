<?php

namespace App\Http\Controllers;

use App\HomeProduct;
use Illuminate\Http\Request;

class HomeProductController extends Controller
{
    public function index()
    {
        $data['menu'] = 'datamaster';
        $data['home_products'] = HomeProduct::all();

        return view('home_product.index', $data);
    }

    public function create()
    {
        //
    }

    public function update($id, Request $request)
    {
        $home_product = HomeProduct::find($id);
        $home_product->product_id = $request->product_id;
        $home_product->save();

        return response()->json("success");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
