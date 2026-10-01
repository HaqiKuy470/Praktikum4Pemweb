<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $berita = Berita::query()
            ->when($request->q, fn ($query, $q) => $query->where('judul', 'like', "%{$q}%"))
            ->when($request->kategori, fn ($query, $kategori) => $query->where('kategori', $kategori))
            ->latest('id')
            ->paginate(9)
            ->withQueryString();

        return view('berita.index', compact('berita'));
    }

    public function create()
    {
        return view('berita.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|max:255',
            'kategori' => 'required',
            'tanggal' => 'required|date',
            'penulis' => 'required',
            'gambar' => 'required|url',
            'ringkasan' => 'required',
            'isi' => 'required',
            'tag' => 'required',
        ]);

        $data['slug'] = Str::slug($data['judul']);

        Berita::create($data);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show(string $slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();

        return view('berita.show', compact('berita'));
    }
}
