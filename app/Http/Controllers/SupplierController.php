<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //query data
        $Supplier = Supplier::all();
        return view('supplier.view',
                    [
                        'supplier' => $Supplier
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
        $Supplier = new Supplier();
        return view('supplier/create',
                    [
                        'kode_supplier' => $Supplier->getKodeSupplier()
                    ]
                  );
        // return view('supplier/view');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplierRequest $request)
    {
        //digunakan untuk validasi kemudian kalau ok tidak ada masalah baru disimpan ke db
        $validated = $request->validate([
            'kode_supplier' => 'required',
            'nama_perusahaan' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
            'kategori_produk' => 'required',
        ]);

        // masukkan ke db
        Supplier::create($request->all());
        
        return redirect()->route('supplier.index')->with('success','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     */
    public function show(supplier $Supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', compact('supplier'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, Supplier $Supplier)
    {
        //digunakan untuk validasi kemudian kalau ok tidak ada masalah baru diupdate ke db
        $validated = $request->validate([
            'kode_supplier' => 'required',
            'nama_perusahaan' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
            'kategori_produk' => 'required',
        ]);
    
        $Supplier->update($validated);
    
        return redirect()->route('supplier.index')->with('success','Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //hapus dari databassupplier = Barang::findOrFail($id);
        $Supplier = Supplier::findOrFail($id);
        $Supplier->delete();

        return redirect()->route('supplier.index')->with('success','Data Berhasil di Hapus');
    }
}
