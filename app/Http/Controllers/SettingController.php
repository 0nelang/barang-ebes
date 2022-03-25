<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Image;
use Storage;
use Str;

class SettingController extends Controller
{
    public function index()
    {
        $data['menu'] = 'datamaster';
        $data['setting'] = Setting::first();

        return view('setting.index', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $setting = Setting::first();
        $setting->name = $request->name;
        $setting->phone = $request->phone;
        $setting->whatsapp_template = $request->whatsapp_template;
        $setting->location = $request->location;
        $setting->map = $request->map;
        $setting->description = $request->description;
        $setting->seo_keyword = $request->seo_keyword;
        $setting->shopee = $request->shopee;
        $setting->tokopedia = $request->tokopedia;
        $setting->facebook = $request->facebook;
        $setting->facebook_link = $request->facebook_link;
        $setting->instagram = $request->instagram;
        $setting->instagram_link = $request->instagram_link;
        $setting->email = $request->email;
        $setting->youtube = $request->youtube;
        $setting->save();

        if ($request->image) {
            Storage::delete($setting->image);

            $file = $request->file('image');
            $fileName = date('YmdHis') . '_' . Str::slug($request->name) . "." . $request->file('image')->getClientOriginalExtension();

            $image = Image::make($file);

            Storage::put('setting/' . $fileName, (string) $image->encode());
            $image_path = 'setting/' . $fileName;

            $setting->update(
                [
                    'image' => $image_path,
                ]
            );
        }

        $status = [
            'status' => 'success',
            'msg' => 'Data berhasil di simpan',
        ];

        return redirect()->route('setting.index')->with($status);
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
