<?php

namespace App\Http\Controllers;

use App\Models\Kematian;
use App\Http\Requests\StoreKematianRequest;
use App\Http\Requests\UpdateKematianRequest;
use App\Models\Penduduk;

class KematianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $daftarKematian = Kematian::all();
        return view('admin.kematian.daftar-kematian', compact('daftarKematian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kematian.tambah-kematian');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKematianRequest $request)
    {
        // Buat data kematian baru
        $kematian = Kematian::create($request->validated());

        // Hapus dari tabel penduduk
        Penduduk::where('nik', $kematian->nik)->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('kematian.index')->with('success', 'Data kematian berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kematian $kematian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kematian $kematian)
    {
        return view('admin.kematian.update-kematian', compact('kematian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKematianRequest $request, Kematian $kematian)
    {
        $kematian->update($request->validated());

        return redirect()->route('kematian.index')->with('success', 'Data kematian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kematian $kematian)
    {
        $kematian->delete();
        return redirect()->route('kematian.index')->with('success', 'Data kematian telah dihapus.');
    }
}
