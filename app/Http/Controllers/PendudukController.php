<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Http\Requests\StorePendudukRequest;
use App\Http\Requests\UpdatePendudukRequest;
use Illuminate\Support\Facades\Gate;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Cek Access
        if (Gate::denies('super-user')) {
            abort(403, 'Anda tidak bisa mengakses halaman ini');
        }

        $daftarPenduduk = Penduduk::all();

        return view('admin.penduduk.daftar-penduduk', compact('daftarPenduduk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.penduduk.tambah-penduduk');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePendudukRequest $request)
    {
        // Buat penduduk baru
        Penduduk::create($request->validated());

        // Redirect dengan pesan sukses
        return redirect()->route('penduduk.index')->with('success', 'Dat Penduduk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penduduk $penduduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penduduk $penduduk)
    {
        return view('admin.penduduk.update-penduduk', compact('penduduk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePendudukRequest $request, Penduduk $penduduk)
    {
        $penduduk->update($request->validated());

        return redirect()->route('penduduk.index')->with('success', 'Data penduduk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penduduk $penduduk)
    {
        $penduduk->delete();
        return redirect()->route('penduduk.index')->with('success', 'Data penduduk telah dihapus.');
    }
}
