<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Http\Requests\BannerRequest;
use App\Type;
use Image;
use Storage;
use Str;

class BannerController extends Controller
{
    public function index()
    {
        $data['menu'] = 'datamaster';
        $data['banner'] = Banner::all();

        return view('banner.index', $data);
    }

    public function create()
    {
        $data['types'] = Type::all();
        $data['menu'] = 'datamaster';
        return view('banner.create', $data);
    }

    public function store(BannerRequest $request)
    {
        $banner = new Banner;
        $banner->name = $request->name;
        $banner->caption = $request->caption;
        $banner->type_id = $request->type_id;
        $banner->save();

        $file = $request->file('image');
        $fileName = date('YmdHis') . '_' . Str::slug($request->name) . ".jpg";

        $image = Image::make($file);
        $image->resize(1200, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        Storage::put('banner/' . $fileName, (string) $image->encode());
        $image_path = 'banner/' . $fileName;

        $banner->update(
            [
                'image' => $image_path,
            ]
        );

        $status = [
            'status' => 'success',
            'msg' => 'Data berhasil di simpan',
        ];

        return redirect()->route('banner.index')->with($status);
    }

    public function show($id)
    {
        $data['menu'] = 'datamaster';
        $data['banner'] = Banner::find($id);
        $data['types'] = Type::all();

        return view('banner.edit', $data);
    }

    public function edit($id)
    {
        //
    }

    public function update(BannerRequest $request, $id)
    {
        $banner = Banner::find($id);
        $banner->name = $request->name;
        $banner->type_id = $request->type_id;
        $banner->caption = $request->caption;
        $banner->save();

        if ($request->image) {
            Storage::delete($banner->image);

            $file = $request->file('image');
            $fileName = date('YmdHis') . '_' . Str::slug($request->name) . ".jpg";

            $image = Image::make($file);
            $image->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            Storage::put('banner/' . $fileName, (string) $image->encode());
        } else {
            $fileName = Banner::where('id', $id)->first()->image;
        }
        $image_path = 'banner/' . $fileName;

        $banner->update(
            [
                'image' => $image_path,
            ]
        );

        $status = [
            'status' => 'info',
            'msg' => 'Data berhasil di update',
        ];

        return redirect()->route('banner.index')->with($status);
    }

    public function destroy($id)
    {
        $banner = Banner::find($id);
        Storage::delete($banner->image);
        $banner->delete();

        $status = [
            'status' => 'danger',
            'msg' => 'Data berhasil di hapus',
        ];

        return redirect()->route('banner.index')->with($status);
    }
}
