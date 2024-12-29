<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengguna_collections = Pengguna::all();
        return view('pengguna.index', [
            "title" => "Pengguna",
            "master_show" => 'show',
            "master_active" => 'active',
            "pengguna_active" => 'link-success',
            "pengguna_collections" => $pengguna_collections,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengguna.create', [
            "title" => "Pengguna",
            "master_show" => 'show',
            "master_active" => 'active',
            "pengguna_active" => 'link-success',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pengguna,email',
            'password' => 'required|string|min:6|confirmed',
            'level' => 'required|in:admin,user',
        ]);

        Pengguna::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level,
        ]);

        return redirect('/pengguna')->with('success', 'Berhasil tambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengguna $pengguna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengguna $pengguna)
    {
        return view('pengguna.edit', [
            "title" => "Pengguna",
            "master_show" => 'show',
            "master_active" => 'active',
            "pengguna_active" => 'link-success',
            "pengguna" => $pengguna,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengguna $pengguna)
    {
        if($request->password != ''){
            $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|email|unique:pengguna,email,' . $pengguna->id,
                'password' => 'required|string|min:6|confirmed',
                'level' => 'required|in:admin,user',
            ]);

            $pengguna->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'level' => $request->level,
            ]);
        } else {
            $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|email|unique:pengguna,email,' . $pengguna->id,
                'level' => 'required|in:admin,user',
            ]);

            $pengguna->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'level' => $request->level,
            ]);
        }

        return redirect('/pengguna')->with('success', 'Berhasil ubah data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengguna $pengguna)
    {
        Pengguna::destroy($pengguna->id);
        return redirect('/pengguna')->with('success', 'Berhasil hapus data');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) { //Facades
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login gagal, Username/Password salah');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}
