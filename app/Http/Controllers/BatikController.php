<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Category;
use App\Product;
use App\Subcategory;
use App\User;
use Illuminate\Http\Request;

class BatikController extends Controller
{
    public function index()
    {
        $data['banners'] = Banner::where('type_id', 1)->get();
        $data['users'] = Category::all();
        // User::whereHas('products', function ($q) {
        //     $q->where('type_id', 1);
        // })->get();

        return view('batik', $data);
    }

    public function category($category)
    {
        $category = Category::where('name', str_replace('-', ' ', $category))->firstOrFail();
        $subcategories = Subcategory::where('category_id', $category->id)->whereHas('productDetails')->get();

        $subcategories->map(function ($q) {
            $q->products = Product::whereHas('details', function ($d) use ($q) {
                $d->where('subcategory_id', $q->id);
            })->inRandomOrder()->limit(4)->get();
        });

        $data['category'] = $category;
        $data['subcategories'] = collect($subcategories);

        return view('batik_category', $data);
    }

    public function data(Request $request)
    {
        // dd($request->user);
        $product = Product::with('productImages')->with('user');
        $product->where('type_id', 1);
        $product->where(function ($q) use ($request) {
            if ($request->user) {
                $q->whereIn('kondisi', $request->user);
            }
        });
        if ($request->order == "price asc") {
            $product->orderBy('sell_price', 'asc');
        } else if ($request->order == "price desc") {
            $product->orderBy('sell_price', 'desc');
        } else {
            $product->orderBy('sell_price', 'asc');
        }
        $data = $product->paginate(8);

        $pagination = '';
        $link_limit = 5;
        if ($data->lastPage() > 1) {
            $firstPageStatus = "";
            if ($data->currentPage() == 1) {
                $firstPageStatus = "disabled";
                $prevPage = 1;
            } else {
                $prevPage = $data->currentPage() - 1;

            }

            $lastPageStatus = "";
            if ($data->currentPage() == $data->lastPage()) {
                $lastPageStatus = "disabled";
                $nextPage = $data->lastPage();
            } else {
                $nextPage = $data->currentPage() + 1;

            }

            $diff_start = $data->currentPage() - 1;
            $diff_end = $data->lastPage() - $data->currentPage();

            $pagination .= '<ul class="pagination">
            <li class="(' . $firstPageStatus . ' ">
            <a onclick="getProduct(`' . $data->url($prevPage) . '`) "><i class="fa fa-angle-left"></i></a>
            </li>';

            if ($data->lastPage() > 5 && $diff_start > $diff_end) {
                $pagination .= '<li class="">
                    <a onclick="getProduct(`' . $data->url(1) . '`)">1</a>
                </li>';
                $pagination .= '<li class=""><a>...</a></li>';
            }

            for ($i = 1; $i <= $data->lastPage(); $i++) {
                $currentPageStatus = "";
                if ($data->currentPage() == $i) {
                    $currentPageStatus = "active";
                }
                $half_total_links = floor($link_limit / 2);
                $from = $data->currentPage() - $half_total_links;
                $to = $data->currentPage() + $half_total_links;
                if ($data->currentPage() < $half_total_links) {
                    $to += $half_total_links - $data->currentPage();
                }
                if ($data->lastPage() - $data->currentPage() < $half_total_links) {
                    $from -= $half_total_links - ($data->lastPage() - $data->currentPage()) - 1;
                }
                if ($from < $i && $i < $to) {
                    $pagination .= '<li class="' . $currentPageStatus . ' ">
                    <a onclick="getProduct(`' . $data->url($i) . '`)">' . $i . ' </a>
                </li>';
                }
            }
            if ($data->lastPage() > 5 && $diff_start < $diff_end) {
                $pagination .= '<li class=""><a>...</a></li>';
                $pagination .= '<li class="">
                    <a onclick="getProduct(`' . $data->url($data->lastPage()) . '`)">' . $data->lastPage() . '</a>
                </li>';
            }
            $pagination .= '<li class="' . $lastPageStatus . ' ">
            <a onclick="getProduct(`' . $data->url($nextPage) . '`)"><i class="fa fa-angle-right"></i></a>
        </li>
    </ul>';

        } else {
            $pagination = '';
        }
        $response = [
            'data' => $data,
            'pagination' => $pagination,
        ];

        return response()->json($response);
    }
}
