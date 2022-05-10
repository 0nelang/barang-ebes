<?php

namespace App\Http\Controllers;

use DB;
use Str;
use Image;
use Storage;
use App\Type;
use App\User;
use App\Product;
use App\Category;
use App\ProductData;
use App\Subcategory;
use App\ProductImage;
use App\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage as FacadesStorage;

class ProductController extends Controller
{
    public function index()
    {
        $data['menu'] = 'product';
        $data['page'] = 'list product';
        $data['products'] = Product::all();

        return view('product.index', $data);
    }

    public function create()
    {
        $data['menu'] = 'product';
        $data['page'] = 'list product';
        $data['types'] = Type::all();
        $data['users'] = User::all();
        $data['categories'] = Category::all();
        $data_tags = [];
        $tags = Product::where('tags', '!=', null)->pluck('tags');
        foreach ($tags as $tag) {
            foreach ($tag as $t) {
                if (!in_array(strtolower($t), $data_tags)) {
                    array_push($data_tags, strtolower($t));
                }
            }
        }
        $data['tags'] = $data_tags;

        return view('product.create', $data);
    }

    public function store(Request $request)
    {
        // dd($request);
        DB::beginTransaction();
        try {
            $product = new Product();
            $product->code = $request->code;
            $product->user_id = $request->user_id;
            $product->type_id = $request->type_id;
            $product->category = $request->category;
            $product->kondisi = $request->kondisi;
            $product->name = $request->name;
            $product->slug = Str::slug($request->slug);
            $product->description = $request->description;
            $product->price = $request->price;
            $product->disc = $request->disc;
            $product->sell_price = $request->price - ($request->price * $request->disc / 100);
            $product->tags = $request->tags;
            $product->shopee = $request->shopee;
            $product->tokopedia = $request->tokopedia;
            // dd($product);
            if ($product->save()) {
                // if ($request->category_id) {
                //     foreach ($request->category_id as $key => $category) {
                //         ProductDetail::create(
                //             [
                //                 'product_id' => $product->id,
                //                 'category_id' => $category,
                //                 'subcategory_id' => $request->subcategory_id[$key] ?? null,
                //             ]
                //         );
                //     }
                // }
                $data = ProductData::find(1);
                $data->total = Product::all()->count();
                // dd($data);
                if ($product->category == 'atas') {
                    $data->atas = $data->atas + 1;
                }elseif ($product->category == 'bawah') {
                    $data->bawah = $data->bawah + 1;
                }
                // dd($data);
                $data->save();
                if ($request->images) {
                    foreach ($request->images as $key => $image) {
                        $fileName = time() . rand(1, 1000) . '_' . Str::slug($request->name) . ".jpg";

                        $image = Image::make($image);
                        $image->resize(500, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                        $file_path = 'product/' . $fileName;
                        Storage::put('product/' . $fileName, (string) $image->encode());

                        ProductImage::create(
                            [
                                'product_id' => $product->id,
                                'image' => $file_path,
                            ]
                        );
                    }
                }
            }

            DB::commit();

            $status = [
                'status' => 'success',
                'msg' => 'Data berhasil di simpan',
            ];

            return redirect()->route('product.index')->with($status);
        } catch (\Throwable$th) {
            DB::rollback();
            throw $th;

            $status = [
                'status' => 'success',
                'msg' => 'Data berhasil di simpan',
            ];

            return redirect()->route('product.index')->with($status);
        }
    }

    public function show($id)
    {
        $data['menu'] = 'product';
        $data['page'] = 'list product';
        $data['types'] = Type::all();
        $data['product'] = Product::find($id);
        $data['product_details'] = ProductDetail::whereProductId($id)->get();
        $data['product_images'] = ProductImage::whereProductId($id)->get();
        $data['categories'] = Category::all();
        $data['users'] = User::all();

        $data_tags = [];
        $tags = Product::where('tags', '!=', null)->pluck('tags');
        foreach ($tags as $tag) {
            foreach ($tag as $t) {
                if (!in_array(strtolower($t), $data_tags)) {
                    array_push($data_tags, strtolower($t));
                }
            }
        }
        $data['tags'] = $data_tags;

        return view('product.edit', $data);
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            $product = Product::find($id);
            $product->user_id = $request->user_id;
            $product->type_id = $request->type_id;
            $product->category = $request->category;
            $product->kondisi = $request->kondisi;
            $product->name = $request->name;
            $product->slug = Str::slug($request->name);
            $product->description = $request->description;
            $product->price = $request->price;
            $product->disc = $request->disc;
            $product->sell_price = $request->price - ($request->price * $request->disc / 100);
            if ($request->sold == 'on') {
                $product->sold = true;
            }else {
                $product->sold = false;
            }
            $product->tags = $request->tags;
            $product->shopee = $request->shopee;
            $product->tokopedia = $request->tokopedia;
            if ($product->save()) {
                // if ($request->category_id) {
                //     foreach ($request->category_id as $key => $category) {
                //         ProductDetail::create(
                //             [
                //                 'product_id' => $product->id,
                //                 'category_id' => $category,
                //                 'subcategory_id' => $request->subcategory_id[$key],
                //             ]
                //         );
                //     }
                // }
                
                $data = ProductData::find(1);
                $data->terjual = Product::where('sold', 1)->count();
                $data->total = Product::all()->count();
                $data->save();
                $imgs = ProductImage::where('product_id', $id)->get();
                // dd($request->photos);
                foreach ($imgs as $img) {
                    // dd($request->old);   
                    if ($request->old == null) {
                        $request->old = [];
                    }
                    if (!in_array($img->id, $request->old)) {
                        # code...
                        Storage::delete($img->image);
                        $img->delete();
                    }
                }
                if ($request->photos) {
                    foreach ($request->photos as $key => $image) {
                        $fileName = time() . rand(1, 1000) . '_' . Str::slug($request->name) . ".jpg";

                        $image = Image::make($image);
                        $image->resize(500, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                        $file_path = 'product/' . $fileName;
                        Storage::put('product/' . $fileName, (string) $image->encode());

                        ProductImage::create(
                            [
                                'product_id' => $product->id,
                                'image' => $file_path,
                            ]
                        );
                    }
                }
            }

            DB::commit();

            $status = [
                'status' => 'success',
                'msg' => 'Data berhasil di simpan',
            ];

            return redirect()->route('product.index')->with($status);
        } catch (\Throwable$th) {
            DB::rollback();
            throw $th;

            $status = [
                'status' => 'success',
                'msg' => 'Data berhasil di simpan',
            ];

            return redirect()->route('product.index')->with($status);
        }
    }

    public function destroy($id)
    {
        $product_images = ProductImage::whereProductId($id)->get();
        foreach ($product_images as $product_image) {
            Storage::delete($product_image->image);
            $product_image->delete();
        }

        Product::find($id)->delete();
        $data = ProductData::find(1);
        $data->terjual = Product::where('sold', 1)->count();
        $data->total = Product::all()->count();
        $data->save();
        $status = [
            'status' => 'success',
            'msg' => 'Data berhasil di hapus',
        ];

        return redirect()->route('product.index')->with($status);
    }

    public function imageDestroy(Request $request)
    {
        $image = ProductImage::find($request->id);
        Storage::delete($image->image);
        $image->delete();

        return response()->json($image);
    }

    public function detailDestroy(Request $request)
    {
        $detail = ProductDetail::find($request->id);
        $detail->delete();

        return response()->json($detail);
    }

    public function category($id)
    {
        $category = Category::where('type_id', $id)->get();

        return response()->json($category);
    }

    public function subcategory($id)
    {
        // dd($id);
        // $subcategory = Subcategory::where('category_id', $id)->get();
        $data = ProductData::find('1');
        if ($id == 'atas') {
            $code = 'A' . $data->atas + 1;
        }elseif ($id == 'bawah') {
            $code = 'B' . $data->bawah + 1;
        }
        

        return response()->json($code);
    }
}
