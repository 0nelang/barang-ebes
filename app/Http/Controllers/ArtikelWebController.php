<?php

namespace App\Http\Controllers;

use App\Article;

class ArtikelWebController extends Controller
{
    public function index()
    {
        $data['artikel'] = Article::select('title', 'slug', 'image', 'text')
            ->orderBy('id', 'desc')
            ->paginate(6);

        return view('artikel', $data);
    }

    public function detail($slug)
    {
        $data['detail'] = Article::where('slug', $slug)->first();

        $data['artikel'] = Article::select('title', 'slug', 'image', 'text')
            ->where('slug', '!=', $slug)
            ->inRandomOrder()
            ->limit(3)
            ->get();

        return view('artikel_detail', $data);
    }
}
