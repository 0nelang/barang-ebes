<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use Illuminate\Http\Request;
use Image;
use Storage;
use Str;

class UserController extends Controller
{
    public function index()
    {
        $data['menu'] = 'user';
        $data['page'] = 'user';
        $data['users'] = User::all();

        return view('user.index', $data);
    }

    public function profile()
    {
        $data['menu'] = '';
        $data['page'] = '';
        return view('user.profile', $data);
    }

    public function create()
    {
        $data['menu'] = 'user';
        $data['page'] = 'user';

        return view('user.create', $data);
    }

    public function store(Request $request)
    {
        try {
            $user = new User;
            $user->name = $request->name;
            $user->owner = $request->owner;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->save();

            $file = $request->file('logo');
            $fileName = date('YmdHis') . '_' . Str::slug($request->name) . ".jpg";

            $image = Image::make($file);
            $image->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            Storage::put('user/' . $fileName, (string) $image->encode());
            $image_path = 'user/' . $fileName;

            $user->update(
                [
                    'logo' => $image_path,
                ]
            );

            $status = [
                'status' => 'success',
                'msg' => 'Data berhasil di simpan',
            ];
        } catch (\Throwable$th) {
            throw $th;
        }

        return redirect()->route('user.index')->with($status);
    }

    public function show($id)
    {
        $data['menu'] = 'user';
        $data['page'] = 'user';
        $data['user'] = User::find($id);
        return view('user.edit', $data);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::find($id);
            $user->name = $request->name;
            $user->owner = $request->owner;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->save();

            if ($request->file('logo')) {
                Storage::delete($user->logo);
                $file = $request->file('logo');
                $fileName = date('YmdHis') . '_' . Str::slug($request->name) . ".jpg";

                $image = Image::make($file);
                $image->resize(1000, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                Storage::put('user/' . $fileName, (string) $image->encode());
                $image_path = 'user/' . $fileName;

                $user->update(
                    [
                        'logo' => $image_path,
                    ]
                );
            }

            $status = [
                'status' => 'success',
                'msg' => 'Data berhasil di simpan',
            ];
        } catch (\Throwable$th) {
            throw $th;
        }

        return redirect()->route('user.index')->with($status);
    }

    public function profileUpdate(Request $request, $id)
    {
        try {
            $user = Admin::find($id);
            $user->name = $request->name;
            $user->owner = $request->owner;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->username = $request->username;
            if ($request->password) {
                $user->password = bcrypt($request->password);
            }
            $user->save();

            if ($request->file('logo')) {
                Storage::delete($user->logo);
                $file = $request->file('logo');
                $fileName = date('YmdHis') . '_' . Str::slug($request->name) . ".jpg";

                $image = Image::make($file);
                $image->resize(1000, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                Storage::put('user/' . $fileName, (string) $image->encode());
                $image_path = 'user/' . $fileName;

                $user->update(
                    [
                        'logo' => $image_path,
                    ]
                );
            }

            $status = [
                'status' => 'success',
                'msg' => 'Data berhasil di simpan',
            ];
        } catch (\Throwable$th) {
            throw $th;
        }

        return redirect()->back()->with($status);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        Storage::delete($user->logo);
        $user->delete();

        $status = [
            'status' => 'success',
            'msg' => 'Data berhasil di hapus',
        ];

        return redirect()->route('user.index')->with($status);
    }
}
