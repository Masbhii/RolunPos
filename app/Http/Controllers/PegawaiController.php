<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

use App\Http\Requests\StorePegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.index', ['pegawai' => $pegawai]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pegawai = new Pegawai();
        return view('pegawai.create', ['kode_pegawai' => $pegawai->getKodePegawai()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePegawaiRequest $request)
    {
        $validated = $request->validate([
            'kode_pegawai' => 'required',
            'nama_pegawai' => 'required',
            'jabatan' => 'required',
            'nomor_telepon' => 'required|integer',
            'jenis_kelamin' => 'required|in:Pria,Wanita',
        ]);

        // masukkan ke db
        Pegawai::create($request->all());
        
        return redirect()->route('pegawai.index')->with('success','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePegawaiRequest $request, Pegawai $pegawai)
    {
        $validated = $request->validate([
            'kode_pegawai' => 'required',
            'nama_pegawai' => 'required',
            'jabatan' => 'required',
            'nomor_telepon' => 'required|integer',
            'jenis_kelamin' => 'required|in:Pria,Wanita',
        ]);
    
        $pegawai->update($validated);
    
        return redirect()->route('pegawai.index')->with('success','Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();

        return redirect()->route('pegawai.index')->with('success','Data Berhasil di Hapus');
    }
}