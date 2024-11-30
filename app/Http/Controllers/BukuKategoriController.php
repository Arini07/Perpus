<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BukuKategori;

class BukuKategoriController extends Controller
{
    public function index(){
        $bukuKategoris = Bukukategori::paginate(5); 
        return view('buku_kategori.index', compact('bukuKategoris'));
    }

    public function create(){
        return view('buku_kategori.create');
    }

    public function store(Request $request ){
        $validates = $request->validate([
            'nama_kategori' => 'required|max:50|unique:buku_kategoris'
        ]);

        BukuKategori::create($validates);

        return redirect()->route('buku_kategori.index')->with('success', 'Data Berhasil di Tambah! ');
        
    }

    public function destroy($id)
    {
        $kategori = BukuKategori::find($id);
    
        if (!$kategori) {
            return redirect()->route('buku_kategori.index')->with('error', 'Kategori tidak ditemukan');
        }
    
        try {
            $kategori->delete();
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Kategori gagal dihapus');
        }
    
        return redirect()->back()->with('success', 'Kategori berhasil dihapus');
    }

    public function edit($id)
    {
        $kategori = BukuKategori::find($id);

        if (!$kategori) {
            return redirect()->route('buku_kategori.index')->with('error', 'Kategori tidak ditemukan');
        }

        return view('buku_kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nama_kategori' => 'required|string|max:255',
    ]);

    $kategori = BukuKategori::find($id);

    if (!$kategori) {
        return redirect()->route('buku_kategori.index')->with('error', 'Kategori tidak ditemukan');
    }

    $kategori->nama_kategori = $request->nama_kategori;
    $kategori->save();

    // Redirect ke halaman index setelah update
    return redirect()->route('buku_kategori.index')->with('success', 'Kategori berhasil diperbarui!');
}



    
    
}
