<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $satuan_collections = Satuan::all();
        return view('satuan.index', [
            "title" => "Satuan",
            "master_show" => 'show',
            "master_active" => 'active',
            "satuan_active" => 'link-success',
            "satuan_collections" => $satuan_collections,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('satuan.create', [
            "title" => "Satuan",
            "master_show" => 'show',
            "master_active" => 'active',
            "satuan_active" => 'link-success',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_satuan' => 'required|min:3|max:255|unique:satuan',
        ]);

        Satuan::create($validatedData);
        return redirect('/satuan')->with('success', 'Berhasil tambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Satuan $satuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Satuan $satuan)
    {
        return view('satuan.edit', [
            "title" => "Satuan",
            "master_show" => 'show',
            "master_active" => 'active',
            "satuan_active" => 'link-success',
            "satuan" => $satuan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Satuan $satuan)
    {
        $request->validate([
            'nama_satuan' => 'required|min:3|max:255|unique:satuan,nama_satuan,' . $satuan->id,
        ]);

        $satuan->update([
            'nama_satuan' => $request->nama_satuan,
        ]);
        return redirect('/satuan')->with('success', 'Berhasil ubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Satuan $satuan)
    {
        Satuan::destroy($satuan->id);
        return redirect('/satuan')->with('success', 'Berhasil hapus data');
    }
}
