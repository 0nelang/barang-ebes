<?php

namespace App\Http\Controllers;

use App\Produkdata;
use Illuminate\Http\Request;
use Session;

class Dashboardcontroller extends Controller
{
    public function index()
    {
        $data['menu'] = 'dashboard';
        $data['name'] = Session::get('name');
        $data['total'] = Produkdata::find(1)->total;
        $data['terjual'] = Produkdata::find(1)->terjual;

        return view('dashboard.index', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
