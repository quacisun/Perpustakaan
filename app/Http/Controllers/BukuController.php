<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Http\Requests\BukuRequest;

class BukuController extends Controller
{
    // Menampilkan daftar buku
    public function index()
    {
    $keyword = request('keyword');
    $bukus = Buku::when($keyword, function ($query) use ($keyword) {
        $query->where('judul', 'like', '%' . $keyword . '%');
        })
        ->latest()
        ->paginate(10)
        ->withQueryString();
        return view('buku.index', compact('bukus', 'keyword'));
        }

    // Form tambah buku
    public function create()
    {
        return view('buku.create');
    }

    // Menyimpan buku baru
    public function store(BukuRequest $request)
    {
        Buku::create($request->validated());

        return redirect()->route('buku.index')
            ->with('sukses', 'Buku berhasil ditambahkan!');
    }

    // Detail buku
    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    // Form edit buku
    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    // Memperbarui buku
    public function update(BukuRequest $request, Buku $buku)
    {
        $buku->update($request->validated());

        return redirect()->route('buku.index')
            ->with('sukses', 'Buku berhasil diperbarui!');
    }

    // Menghapus buku
    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect()->route('buku.index')
            ->with('sukses', 'Buku berhasil dihapus!');
    }
}
