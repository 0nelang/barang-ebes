<?php

namespace App\Http\Controllers;

use App\Article;
use App\Banner;
use App\Product;
use App\Type;
use Illuminate\Http\Request;
use Str;

class IndexController extends Controller
{
    public function index()
    {
        $data['banners'] = Banner::where('type_id', null)->get();
        $categories = Type::whereHas('products')->get();

        $categories->map(function ($q) {
            $q->products = Product::where('type_id', $q->id)
                ->inRandomOrder()->limit(4)->get();
        });

        $data['types'] = collect($categories);
        $data['articles'] = Article::inRandomOrder()->limit(3)->get();

        return view('index', $data);
    }

    public function autocomplete(Request $request)
    {
        $data_tags = [];
        $tags = Product::where('tags', '!=', null)->pluck('tags');
        foreach ($tags as $tag) {
            foreach ($tag as $t) {
                if (!in_array(strtolower($t), $data_tags)) {
                    array_push($data_tags, strtolower($t));
                }
            }
        }

        $result_tags = [];
        foreach ($data_tags as $t) {
            if (Str::contains($t, $request->search)) {
                array_push($result_tags, $t);
            }
        }

        return response()->json($data_tags);
    }
}
