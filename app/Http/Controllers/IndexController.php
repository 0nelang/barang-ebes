<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Article;
use App\Banner;
use App\Faq;
use App\Product;
use App\Type;
use Illuminate\Http\Request;
=======
>>>>>>> b794ad68e2ad53e9dadb66853fd51187e8485c3d
use Str;
use App\Type;
use App\Banner;
use App\Article;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;

class IndexController extends Controller
{
    public function index()
    {
        $data['banners'] = Banner::where('type_id', null)->get();
        $categories = Type::whereHas('products')->get();

<<<<<<< HEAD
        $categories->map(function ($q) {
            $q->products = Product::where('type_id', $q->id)
                ->inRandomOrder()->limit(4)->get();
        });

        $data['types'] = collect($categories);
        $data['articles'] = Article::inRandomOrder()->limit(3)->get();
        $data['faq'] = Faq::all();

=======
        // $categories->map(function ($q) {
        //     $q->products = Product::where('type_id', $q->id)
        //         ->inRandomOrder()->limit(4)->get();
        // });
        // dd(Category::all());
        $data['types'] = Type::all();
        // $data['articles'] = Article::inRandomOrder()->limit(3)->get();
        // dd($data);
>>>>>>> b794ad68e2ad53e9dadb66853fd51187e8485c3d
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
