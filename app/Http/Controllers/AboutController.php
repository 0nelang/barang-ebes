<?php

namespace App\Http\Controllers;

use App\About;
use App\Value;
use Illuminate\Http\Request;
use Image;
use Storage;
use Str;

class AboutController extends Controller
{
    public function index()
    {
        $data['menu'] = 'datamaster';
        $data['about'] = About::first();
        $data['values'] = Value::all();

        return view('about.index', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $about = About::first();
        $about->text = $request->text;
        $about->save();

        if ($request->image) {
            Storage::delete($about->image);
            $file = $request->file('image');
            $fileName = date('YmdHis') . '_' . Str::slug($request->name) . "." . $request->file('image')->getClientOriginalExtension();

            $image = Image::make($file);
            $image->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            Storage::put('about/' . $fileName, (string) $image->encode());
            $image_path = 'about/' . $fileName;

            $about->update(
                [
                    'image' => $image_path,
                ]
            );
        }

        if ($request->title) {
            foreach ($request->title as $key => $title) {
                Value::create([
                    'title' => $title,
                    'description' => $request->description[$key],
                ]);
            }
        }

        $status = [
            'status' => 'success',
            'msg' => 'Data berhasil di simpan',
        ];

        return redirect()->route('about.index')->with($status);
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

    public function valueDestroy($id)
    {
        Value::find($id)->delete();

        return response()->json('success');
    }

    public function attach(Request $request)
    {
        try {
            if ($request->hasFile('image')) {
                $image_name = 'about-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $file = $request->file('image');

                $image = Image::make($file);
                $image->resize(1000, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                Storage::put('abouts/' . $image_name, (string) $image->encode());
                $image_path = 'abouts/' . $image_name;

                $url = url('storage/' . $image_path);

                return $url;
            } else {
                return "error";
            }
        } catch (\Throwable$th) {
            return "error";
            throw $th;
        }
    }

    public function attachDestroy(Request $request)
    {
        $explode = explode('/', $request->src);
        $src = 'abouts/' . end($explode);

        if (Storage::delete($src)) {
            return 'Success';
        } else {
            return 'Failed';
        }
    }
}
