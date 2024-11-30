<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\BukuKategori;
use Exception;

class BukuController extends Controller
{
    public function index()
    { 
        $bukus = Buku::paginate(5); 
        return view('buku.index')->with('bukus', $bukus);  
    }
    
    public function create()
    {
        $bukuKategoris = BukuKategori::all(); 
        return view('buku.create', ['bukuKategoris' => $bukuKategoris]); 
    }

    public function store(Request $request)
    {
        $validates = $request->validate([
            'judul' => 'required|string|max:255',  
            'tahun_terbit' => 'required|integer',
            'penerbit' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'buku_kategori_id' => 'required|exists:buku_kategoris,id',
        ]);
        
        $buku = new Buku();
        $buku->judul = $validates['judul'];
        $buku->tahun_terbit = $validates['tahun_terbit'];
        $buku->penerbit = $validates['penerbit'];
        $buku->penulis = $validates['penulis'];
        $buku->buku_kategori_id = $validates['buku_kategori_id'];
        $buku->save();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $buku = Buku::find($id);
        if (!$buku) {
            return redirect()->back()->with('error', 'Buku Tidak Ditemukan');
        }
        
        $bukuKategoris = BukuKategori::all();
        return view('buku.edit', ['buku' => $buku, 'bukuKategoris' => $bukuKategoris]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'penerbit' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'buku_kategori_id' => 'required|exists:buku_kategoris,id',
        ]);
    
        $buku = Buku::findOrFail($id);
        $buku->update([
            'judul' => $request->judul,
            'tahun_terbit' => $request->tahun_terbit,
            'penerbit' => $request->penerbit,
            'penulis' => $request->penulis,
            'buku_kategori_id' => $request->buku_kategori_id,
        ]);
    
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui!');
    }
    
    public function destroy(string $id)
    {
        $buku = Buku::find($id);

        try {
            if (!$buku) {
                return redirect()->back()->with('error', 'Buku Tidak Ditemukan');
            }
            $buku->delete();
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Buku Gagal dihapus: ' . $e->getMessage());
        }
        
        return redirect()->back()->with('success', 'Buku Berhasil dihapus');
    }
}
