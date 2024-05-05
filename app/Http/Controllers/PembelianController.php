<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePembelianRequest;
use App\Http\Requests\UpdatePembelianRequest;
use App\Models\Barang;
use App\Models\Pembelian;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //query data
        $pembelian = DB::table('pembelian as a')
            ->leftjoin('barang as b', 'a.id_barang', '=', 'b.id')
            ->select('a.*', 'b.nama_barang')
            ->get();
        return view(
            'pembelian.view',
            [
                'pembelian' => $pembelian
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pembelian = new Pembelian();
        $barang = Barang::all();
        // berikan kode pembelian secara otomatis
        // 1. query dulu ke db, select max untuk mengetahui posisi terakhir 
        return view(
            'pembelian/create',
            [
                'nomor_pembelian' => $pembelian->getNomorPembelian(),
                'barang' => $barang
            ]
        );
        // return view('pembelian/view');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePembelianRequest $request)
    {
        //digunakan untuk validasi kemudian kalau ok tidak ada masalah baru disimpan ke db
        $validated = $request->validate([
            'nomor_pembelian' => 'required',
            'tanggal_pembelian' => 'required',
            'kode_barang' => 'required',
            'harga' => 'required',
            'kuantitas' => 'required',
            'kuantitas' => 'required',
            'foto' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
        ]);

        // masukkan ke db
        Pembelian::create($request->all());

        return redirect()->route('pembelian.index')->with('success', 'Data Berhasil di Input');
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
        return view('pembelian.edit', ['pembelian' => $pembelian, 'barang' => Barang::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePembelianRequest $request, Pembelian $pembelian)
    {
        //digunakan untuk validasi kemudian kalau ok tidak ada masalah baru diupdate ke db
        $validated = $request->validate([
            'nomor_pembelian' => 'required',
            'tanggal_pembelian' => 'required',
            'kode_barang' => 'required',
            'harga' => 'required',
            'kuantitas' => 'required',
            'kuantitas' => 'required',
            'foto' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
        ]);

        $pembelian->update($validated);

        return redirect()->route('pembelian.index')->with('success', 'Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //hapus dari database
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->delete();

        return redirect()->route('pembelian.index')->with('success', 'Data Berhasil di Hapus');
    }
}
