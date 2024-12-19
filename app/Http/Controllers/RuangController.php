<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruang_collections = Ruang::all();
        return view('ruang.index', [
            "title" => "Ruang",
            "master_show" => 'show',
            "master_active" => 'active',
            "ruang_active" => 'link-success',
            "ruang_collections" => $ruang_collections,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ruang.create', [
            "title" => "Ruang",
            "master_show" => 'show',
            "master_active" => 'active',
            "ruang_active" => 'link-success',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_ruang' => 'required|min:3|max:255|unique:ruang',
        ]);

        Ruang::create($validatedData);
        return redirect('/ruang')->with('success', 'Berhasil tambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ruang $ruang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ruang $ruang)
    {
        return view('ruang.edit', [
            "title" => "Ruang",
            "master_show" => 'show',
            "master_active" => 'active',
            "ruang_active" => 'link-success',
            "ruang" => $ruang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ruang $ruang)
    {
        $request->validate([
            'nama_ruang' => 'required|min:3|max:255|unique:ruang,nama_ruang,' . $ruang->id,
        ]);

        $ruang->update([
            'nama_ruang' => $request->nama_ruang,
        ]);
        return redirect('/ruang')->with('success', 'Berhasil ubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ruang $ruang)
    {
        Ruang::destroy($ruang->id);
        return redirect('/ruang')->with('success', 'Berhasil hapus data');
    }
}
