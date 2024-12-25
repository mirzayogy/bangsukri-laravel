<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Satuan;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang_collections = Barang::with('satuan')->get();
        return view('barang.index', [
            "title" => "Barang",
            "master_show" => 'show',
            "master_active" => 'active',
            "barang_active" => 'link-success',
            "barang_collections" => $barang_collections,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $satuan_collections = Satuan::all();
        return view('barang.create', [
            "title" => "Barang",
            "master_show" => 'show',
            "master_active" => 'active',
            "barang_active" => 'link-success',
            "satuan_collections" => $satuan_collections,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required|min:3|max:255|unique:barang',
            'merk' => 'required',
            'jenis' => 'required',
            'satuan_id' => 'required',
        ]);

        Barang::create($validatedData);
        return redirect('/barang')->with('success', 'Berhasil tambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        $satuan_collections = Satuan::all();
        return view('barang.edit', [
            "title" => "Barang",
            "master_show" => 'show',
            "master_active" => 'active',
            "barang_active" => 'link-success',
            "barang" => $barang,
            "satuan_collections" => $satuan_collections,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama_barang' => 'required|min:3|max:255|unique:barang,nama_barang,' . $barang->id,
            'merk' => 'required',
            'jenis' => 'required',
            'satuan_id' => 'required',
        ]);

        $barang->update([
            'nama_barang' => $request->nama_barang,
            'merk' => $request->merk,
            'jenis' => $request->jenis,
            'satuan_id' => $request->satuan_id,
        ]);
        return redirect('/barang')->with('success', 'Berhasil ubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        Barang::destroy($barang->id);
        return redirect('/barang')->with('success', 'Berhasil hapus data');
    }
}
