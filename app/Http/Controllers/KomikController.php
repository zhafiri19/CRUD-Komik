<?php

namespace App\Http\Controllers;

use App\Models\Komik;
use illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class KomikController extends Controller
{
    public function index()
    {
        $komik = Komik::orderBy("judul", "ASC")->get();
        return view('index', compact('komik'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|string|max:155',
            'penulis' => 'required',
            'penerbit' => 'required',
            'content' => 'required'
        ]);

        $komik = Komik::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'content' => $request->content,
            'slug' => Str::slug($request->judul)
        ]);

        if ($komik) {
            return redirect()
                ->route('komik.index')
                ->with([
                    'success' => 'Tambah Data Komik Berhasil!'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi Masalah, Silahkan Coba Lagi!'
                ]);
        }
    }

    public function edit($id)
    {
        $komik = Komik::findOrFail($id);
        return view('edit', compact('komik'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required|string|max:155',
            'penulis' => 'required',
            'penerbit' => 'required',
            'content' => 'required'
        ]);

        $komik = Komik::findOrFail($id);

        $komik->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'content' => $request->content,
            'slug' => Str::slug($request->judul)
        ]);

        if ($komik) {
            return redirect()
                ->route('komik.index')
                ->with([
                    'success' => 'Data Komik Berhasil di Update'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi Masalah, Silahkan Coba Lagi'
                ]);
        }
    }

    public function destroy($id)
    {
        $komik = Komik::findOrFail($id);
        $komik->delete();

        if ($komik) {
            return redirect()
                ->route('komik.index')
                ->with([
                    'success' => 'Data Komik Berhasil dihapus!'
                ]);
        } else {
            return redirect()
                ->route('komik.index')
                ->with([
                    'error' => 'Terjadi Masalah, Silahkan Coba Lagi'
                ]);
        }
    }

    public function show(Komik $komik)
    {
        return view('detail', compact('komik'));
    }
}
