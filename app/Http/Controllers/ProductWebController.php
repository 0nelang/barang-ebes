<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Subcategory;
use App\Type;
use App\User;
use Illuminate\Http\Request;

class ProductWebController extends Controller
{
    public function index($type, $category, Request $request)
    {
        $data['type'] = Type::whereName(str_replace('-', ' ', $type))->first();
        $data['category'] = Category::whereName(str_replace('-', ' ', $category))->first();
        $data['subcategory'] = null;
        if ($request->subkategori) {
            $data['subcategory'] = Subcategory::whereName(str_replace('-', ' ', $request->subkategori))->first();
        }
        if ($data['type']) {
            $data['users'] = User::whereHas('products', function ($q) use ($data) {
                $q->where('type_id', $data['type']->id);
            })->get();
        }
        if ($data['category']) {
            $data['users'] = User::whereHas('products', function ($q) use ($data) {
                $q->whereHas('details', function ($d) use ($data) {
                    $d->where('category_id', $data['category']->id);
                });
            })->get();
        }
        if ($data['subcategory']) {
            $data['users'] = User::whereHas('products', function ($q) use ($data) {
                $q->whereHas('details', function ($d) use ($data) {
                    $d->where('subcategory_id', $data['subcategory']->id);
                });
            })->get();
        }

        return view('product_all', $data);
    }

    public function detail($id, $name)
    {
        $data['product'] = Product::find($id);
        $data['user'] = User::find($data['product']->user->id);
        $data['others'] = Product::where('id', '!=', $id)
            ->where('user_id', $data['product']->user_id)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('product_detail', $data);
    }

    public function data(Request $request)
    {
        $product = Product::with('productImages')->with('user');
        if ($request->user) {
            $product->whereIn('user_id', $request->user);
        }
        if ($request->type_id) {
            $product->where('type_id', $request->type_id);
        }
        $product->where(function ($q) use ($request) {
            if ($request->subcategory_id) {
                $q->whereHas('details', function ($q) use ($request) {
                    $q->where('subcategory_id', $request->subcategory_id);
                });
            } else {
                $q->whereHas('details', function ($q) use ($request) {
                    $q->where('category_id', $request->category_id);
                });
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
        $link_limit = 4;
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
            <li class="' . $firstPageStatus . ' ">
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
