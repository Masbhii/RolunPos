<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Http\Request;
use App\Http\Requests\StorePembelianRequest;
use App\Http\Requests\UpdatePembelianRequest;

class PembelianaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembelian = pembelian::all();
        return view('pembelian.index', ['pembelian' => $pembelian]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pembelian = new pembelian();
        return view('pembelian.create', ['kode_pembelian' => $pembelian->getKodepembelian()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepembelianRequest $request)
    {
        $validated = $request->validate([
            'tgl_pembelian' => 'required',
            'no_pembelian' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
            'tgl_jatuh_tempo' => 'required',
            'kuantitas' => 'required',
            'id_barang' => 'required',
            'id_pegawai' => 'required',
            'id_supplier' => 'required',
        ]);

        // masukkan ke db
        pembelian::create($request->all());
        
        return redirect()->route('pembelian.index')->with('success','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     */
    public function show(pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pembelian $pembelian)
    {
        return view('pembelian.edit', compact('pembelian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepembelianRequest $request, pembelian $pembelian)
    {
        $validated = $request->validate([
            'tgl_pembelian' => 'required',
            'no_pembelian' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
            'tgl_jatuh_tempo' => 'required',
            'kuantitas' => 'required',
            'id_barang' => 'required',
            'id_pegawai' => 'required',
            'id_supplier' => 'required',
        ]);
    
        $pembelian->update($validated);
    
        return redirect()->route('pembelian.index')->with('success','Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pembelian = pembelian::findOrFail($id);
        $pembelian->delete();

        return redirect()->route('pembelian.index')->with('success','Data Berhasil di Hapus');
    }
}