<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Http\Requests\StorePembelianRequest;
use App\Http\Requests\UpdatePembelianRequest;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembelian = Pembelian::all();
        return view('pembelian.index', ['pembelian' => $pembelian]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pembelian = new Pembelian();
        return view('pembelian.create', ['kode_pembelian' => $pembelian->getKodePembelian()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePembelianRequest $request)
    {
        $validated = $request->validate([
        'tgl_pembelian'=> 'required',
        'no_pembelian'=> 'required',
        'keterangan'=> 'required',
        'status'=> 'required',
        'tgl_jatuh_tempo'=> 'required',
        'kuantitas'=> 'required',
        'harga'=> 'required',
        'id_barang'=> 'required',
        'id_pegawai'=> 'required',
        'id_supplier'=> 'required',
        ]);

        // masukkan ke db
        Pembelian::create($request->all());
        
        return redirect()->route('pembelian.index')->with('success','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembelian $pembelian)
    {
        return view('pembelian.edit', compact('pembelian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePembelianRequest $request, Pembelian $pembelian)
    {
        $validated = $request->validate([
        'tgl_pembelian'=> 'required',
        'no_pembelian'=> 'required',
        'keterangan'=> 'required',
        'status'=> 'required',
        'tgl_jatuh_tempo'=> 'required',
        'kuantitas'=> 'required',
        'harga'=> 'required',
        'id_barang'=> 'required',
        'id_pegawai'=> 'required',
        'id_supplier'=> 'required',
        ]);
        
        $pembelian->update($validated);
    
        return redirect()->route('pembelian.index')->with('success','Data Berhasil di Ubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pembelian = Pembelian::find($id);
        $pembelian->delete();

        return redirect()->route('pembelian.index')->with('success','Data Berhasil di Hapus');

    }
}
