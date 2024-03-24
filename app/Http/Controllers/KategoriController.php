<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //query data
        $kategori = kategori::all();
        return view('kategori.view',
                    [
                        'kategori' => $kategori
                    ]
                  );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // berikan kode kategori secara otomatis
        // 1. query dulu ke db, select max untuk mengetahui posisi terakhir 
        $kategori = new kategori();
        return view('kategori/create',
                    [
                        'kode_kategori' => $kategori->getKodekategori()
                    ]
                  );
        // return view('kategori/view');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKategoriRequest $request)
    {
        //digunakan untuk validasi kemudian kalau ok tidak ada masalah baru disimpan ke db
        $validated = $request->validate([
            'kode_kategori' => 'required',
            'nama_kategori' => 'required',
            'deskripsi' => 'required',
        ]);

        // masukkan ke db
        kategori::create($request->all());
        
        return redirect()->route('kategori.index')->with('success','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKategoriRequest $request, Kategori $kategori)
    {
        //digunakan untuk validasi kemudian kalau ok tidak ada masalah baru diupdate ke db
        $validated = $request->validate([
            'kode_kategori' => 'required',
            'nama_kategori' => 'required|min:5|max:255',
            'deskripsi' => 'required',
        ]);
    
        $kategori->update($validated);
    
        return redirect()->route('kategori.index')->with('success','Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        //hapus dari database
        $kategori = kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success','Data Berhasil di Hapus');
    }
}
