<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Image;
use Storage;
use Str;

class ArticleController extends Controller
{
    public function index()
    {
        $data['menu'] = 'article';
        $data['articles'] = Article::all();

        return view('article.index', $data);
    }

    public function create()
    {
        $data['menu'] = 'article';

        return view('article.create', $data);
    }

    public function store(ArticleRequest $request)
    {
        $article = new Article;
        $article->title = $request->title;
        $article->text = $request->text;
        $article->seo_title = $request->seo_title;
        $article->seo_description = $request->seo_description;
        $article->seo_keyword = $request->seo_keyword;
        $article->slug = Str::slug($request->title);
        $article->save();

        $file = $request->file('image');
        $fileName = date('YmdHis') . '_' . Str::slug($request->name) . ".jpg";

        $image = Image::make($file);
        $image->resize(1000, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        Storage::put('article/' . $fileName, (string) $image->encode());
        $image_path = 'article/' . $fileName;

        $article->update(
            [
                'image' => $image_path,
            ]
        );

        $status = [
            'status' => 'success',
            'msg' => 'Data berhasil di simpan',
        ];

        return redirect()->route('article.index')->with($status);
    }

    public function show($id)
    {
        $data['menu'] = 'article';
        $data['article'] = Article::find($id);
        return view('article.edit', $data);
    }

    public function edit($id)
    {
        //
    }

    public function update(ArticleRequest $request, $id)
    {
        $article = Article::find($id);
        $article->title = $request->title;
        $article->text = $request->text;
        $article->seo_title = $request->seo_title;
        $article->seo_description = $request->seo_description;
        $article->seo_keyword = $request->seo_keyword;
        $article->slug = Str::slug($request->title);
        $article->save();

        if ($request->image) {
            Storage::delete($article->image);

            $file = $request->file('image');
            $fileName = date('YmdHis') . '_' . Str::slug($request->name) . ".jpg";

            $image = Image::make($file);
            $image->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            Storage::put('article/' . $fileName, (string) $image->encode());
            $image_path = 'article/' . $fileName;

            $article->update(
                [
                    'image' => $image_path,
                ]
            );
        }

        $status = [
            'status' => 'info',
            'msg' => 'Data berhasil di update',
        ];

        return redirect()->route('article.index')->with($status);
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        Storage::delete($article->image);
        $article->delete();

        $status = [
            'status' => 'danger',
            'msg' => 'Data berhasil di hapus',
        ];

        return redirect()->route('article.index')->with($status);
    }

    public function attach(Request $request)
    {
        if ($request->hasFile('image')) {
            $image_name = 'article-' . time() . '.' . $request->file('image')->getClientOriginalExtension();
            $file = $request->file('image');

            $image = Image::make($file);
            $image->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            Storage::put('articles/' . $image_name, (string) $image->encode());
            $image_path = 'articles/' . $image_name;

            $url = url('storage/' . $image_path);

            return $url;
        }
    }

    public function attachDestroy(Request $request)
    {
        $explode = explode('/', $request->src);
        $src = 'articles/' . end($explode);

        if (Storage::delete($src)) {
            return 'Success';
        } else {
            return 'Failed';
        }
    }
}
