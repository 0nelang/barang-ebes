<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Faqcontrollerbru extends Controller
{
    public function index()
    {
        $data['menu'] = 'faq';
        $data['faq'] = Faq::all();

        return view('faq.index', $data);
    }

    public function create()
    {
        $data['menu'] = 'faq';

        return view('faq.create',$data);
    }

    public function store(Request $request)
    {
        $article = new Faq();
        $article->pertanyaan = $request->pertanyaan;
        $article->jawaban = $request->jawaban;
        $article->save();

        $status = [
            'status' => 'success',
            'msg' => 'Data berhasil di simpan',
        ];

        return redirect()->route('faq.index')->with($status);
    }

    public function show($id)
    {
        $data['menu'] = 'faq';
        $data['faq'] = Faq::find($id);
        return view('faq.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $article = Faq::find($id);
        $article->pertanyaan = $request->pertanyaan;
        $article->jawaban = $request->jawaban;
        $article->save();

        $status = [
            'status' => 'info',
            'msg' => 'Data berhasil di update',
        ];

        return redirect()->route('faq.index')->with($status);
    }

    public function destroy($id)
    {
        $article = Faq::find($id);  
        $article->delete();

        $status = [
            'status' => 'danger',
            'msg' => 'Data berhasil di hapus',
        ];

        return redirect()->route('faq.index')->with($status);
    }
}
