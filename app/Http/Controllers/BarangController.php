<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //query data
        $Barang = Barang::all();
        return view('barang.view',
                    [
                        'barang' => $Barang
                    ]
                  );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // berikan kode Barang secara otomatis
        // 1. query dulu ke db, select max untuk mengetahui posisi terakhir 
        $Barang = new Barang();
        return view('barang/create',
                    [
                        'kode_barang' => $Barang->getKodeBarang()
                    ]
                  );
        // return view('Barang/view');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBarangRequest $request)
    {
        //digunakan untuk validasi kemudian kalau ok tidak ada masalah baru disimpan ke db
        $validated = $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'satuan' => 'required',
        ]);

        // masukkan ke db
        Barang::create($request->all());
        
        return redirect()->route('barang.index')->with('success','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $Barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBarangRequest $request, Barang $Barang)
    {
        //digunakan untuk validasi kemudian kalau ok tidak ada masalah baru diupdate ke db
        $validated = $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required|min:5|max:255',
            'satuan' => 'required',
        ]);
    
        $Barang->update($validated);
    
        return redirect()->route('barang.index')->with('success','Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //hapus dari database
        $Barang = Barang::findOrFail($id);
        $Barang->delete();

        return redirect()->route('barang.index')->with('success','Data Berhasil di Hapus');
    }
}
