<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Type;
use App\User;
use Illuminate\Http\Request;

class PengrajinController extends Controller
{
    public function index()
    {
        $data['users'] = User::all();
        $data['types'] = Type::all();

        return view('pengrajin', $data);
    }

    public function detail($id, $name)
    {
        $data['user'] = User::find($id);
        $types = Type::whereHas('products', function ($q) use ($id) {
            $q->where('user_id', $id);
        })->get();

        $types->map(function ($q) use ($id) {
            $q->products = Product::where('user_id', $id)->where('type_id', $q->id)->inRandomOrder()->limit(8)->get();
        });

        $data['user_types'] = collect($types);

        return view('pengrajin_detail', $data);
    }

    public function product(Request $request, $id)
    {
        $data['user'] = User::find($id);
        $data['type'] = Type::find($request->type_id);
        $data['categories'] = Category::where('type_id', $request->type_id)
            ->whereHas('productDetails', function ($q) use ($request, $id) {
                $q->whereHas('product', function ($p) use ($request, $id) {
                    $p->where('type_id', $request->type_id);
                    $p->where('user_id', $id);
                });
            })->get();

        // dd($data);

        return view('pengrajin_product', $data);
    }

    public function data(Request $request)
    {
        $product = Product::with('productImages')->with('user');
        if ($request->user_id) {
            $product->where('user_id', $request->user_id);
        }
        if ($request->type_id) {
            $product->where('type_id', $request->type_id);
        }
        $product->where(function ($q) use ($request) {
            if ($request->type_id == 1) {
                if ($request->category1) {
                    $q->whereHas('details', function ($q) use ($request) {
                        $q->where(function ($c) use ($request) {
                            $c->where('category_id', 1);
                            $c->whereIn('subcategory_id', $request->category1);
                        });
                    });
                }
                if ($request->category2) {
                    $q->whereHas('details', function ($q) use ($request) {
                        $q->where(function ($c) use ($request) {
                            $c->where('category_id', 2);
                            $c->whereIn('subcategory_id', $request->category2);
                        });
                    });
                }

            } else if ($request->type_id == 2) {
                if ($request->category || $request->category3) {
                    if ($request->category3) {
                        $q->whereHas('details', function ($q) use ($request) {
                            $q->where(function ($c) use ($request) {
                                $c->where('category_id', 3);
                                if ($request->category3) {
                                    $c->whereIn('subcategory_id', $request['category3']);
                                }
                            });
                        });
                    }
                    if (in_array(4, $request->category ?? [])) {
                        $q->orWhereHas('details', function ($q) use ($request) {
                            $q->where(function ($c) use ($request) {
                                $c->where('category_id', 4);
                            });
                        });
                    }
                }
            } else {
                if ($request->category) {
                    $q->whereHas('details', function ($q) use ($request) {
                        $q->whereIn('category_id', $request->category);
                    });
                }
                if ($request->subcategory) {
                    $q->whereHas('details', function ($q) use ($request) {
                        $q->whereIn('subcategory_id', $request->subcategory);
                    });
                }
            }
        });

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
