<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use Illuminate\Http\Request;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemasok_collections = Pemasok::all();
        return view('pemasok.index', [
            "title" => "Pemasok",
            "master_show" => 'show',
            "master_active" => 'active',
            "pemasok_active" => 'link-success',
            "pemasok_collections" => $pemasok_collections,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pemasok.create', [
            "title" => "Pemasok",
            "master_show" => 'show',
            "master_active" => 'active',
            "pemasok_active" => 'link-success',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pemasok' => 'required|min:3|max:255|unique:pemasok',
            'nama_kontak' => 'required',
            'nomor_hp' => 'required',
            'alamat' => 'required',
            'region' => 'required',
        ]);

        Pemasok::create($validatedData);
        return redirect('/pemasok')->with('success', 'Berhasil tambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemasok $pemasok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemasok $pemasok)
    {
        return view('pemasok.edit', [
            "title" => "Pemasok",
            "master_show" => 'show',
            "master_active" => 'active',
            "pemasok_active" => 'link-success',
            "pemasok" => $pemasok,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemasok $pemasok)
    {
        $request->validate([
            'nama_pemasok' => 'required|min:3|max:255|unique:pemasok,nama_pemasok,' . $pemasok->id,
            'nama_kontak' => 'required',
            'nomor_hp' => 'required',
            'alamat' => 'required',
            'region' => 'required',
        ]);

        $pemasok->update([
            'nama_pemasok' => $request->nama_pemasok,
            'nama_kontak' => $request->nama_kontak,
            'nomor_hp' => $request->nomor_hp,
            'alamat' => $request->alamat,
            'region' => $request->region,
        ]);
        return redirect('/pemasok')->with('success', 'Berhasil ubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemasok $pemasok)
    {
        Pemasok::destroy($pemasok->id);
        return redirect('/satuan')->with('success', 'Berhasil hapus data');
    }
}
