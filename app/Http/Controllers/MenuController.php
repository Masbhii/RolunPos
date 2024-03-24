<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Menu::all();
        return view('menu.index', ['data' => $data, 'title' => 'Menu']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.create', ['kode_menu' => Menu::getKodeMenu(), 'title' => 'Tambah Menu']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuRequest $request)
    {
        $validated = $request->validate([
            'nama_menu' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'kategori' => 'required'
        ]);

        Menu::create($request->all());

        return redirect()->route('menu.index')->with('success', 'Data Berhasil di Input');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        return view('menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $validated = $request->validate([
            'nama_menu' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'kategori' => 'required'
        ]);

        $menu->update($validated);

        return redirect()->route('menu.index')->with('success', 'Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect()->route('menu.index')->with('success', 'Data Berhasil di Hapus');
    }
}
