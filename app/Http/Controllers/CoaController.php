<?php

namespace App\Http\Controllers;

use App\Models\Coa;
use App\Http\Requests\StoreCoaRequest;
use App\Http\Requests\UpdateCoaRequest;

use Illuminate\Foundation\Http\FormRequest;

class CoaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //query data
        $coa = Coa::all();
        return view('coa.view',
                    [
                        'coa' => $coa
                    ]
                  );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // berikan kode perusahaan secara otomatis
        // 1. query dulu ke db, select max untuk mengetahui posisi terakhir 
        $coa = new Coa();
        return view('coa/create');
        // return view('coa/view');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCoaRequest $request)
    {
        //digunakan untuk validasi kemudian kalau ok tidak ada masalah baru disimpan ke db
        $validated = $request->validate([
            'kode_akun' => 'required',
            'nama_akun' => 'required',
            'header_akun' => 'required',
        ]);

        // masukkan ke db
        Coa::create($request->all());
        
        return redirect()->route('coa.index')->with('success','Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     */
    public function show(Coa $coa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coa $coa)
    {
        return view('coa.edit', compact('coa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCoaRequest $request, Coa $coa)
    {
        //digunakan untuk validasi kemudian kalau ok tidak ada masalah baru diupdate ke db
        $validated = $request->validate([
            'kode_akun' => 'required',
            'nama_akun' => 'required',
            'header_akun' => 'required',
        ]);
    
        $coa->update($validated);
    
        return redirect()->route('coa.index')->with('success','Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    //public function destroy(Coa $coa)
    public function destroy($id)
    {
        //hapus dari database
        $coa = Coa::findOrFail($id);
        $coa->delete();

        return redirect()->route('coa.index')->with('success','Data Berhasil di Hapus');
    }
}
