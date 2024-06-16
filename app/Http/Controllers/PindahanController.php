<?php

namespace App\Http\Controllers;

use App\Models\Pindahan;
use App\Http\Requests\StorePindahanRequest;
use App\Http\Requests\UpdatePindahanRequest;
use Illuminate\Support\Facades\Gate;

class PindahanController extends Controller
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

        $daftarPindahan = Pindahan::all();

        return view('admin.pindahan.daftar-pindahan', compact('daftarPindahan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pindahan.tambah-pindahan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePindahanRequest $request)
    {
        // Buat pindahan baru
        Pindahan::create($request->validated());

        // Redirect dengan pesan sukses
        return redirect()->route('pindahan.index')->with('success', 'Data pindahan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pindahan $pindahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pindahan $pindahan)
    {
        return view('admin.pindahan.update-pindahan', compact('pindahan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePindahanRequest $request, Pindahan $pindahan)
    {
        $pindahan->update($request->validated());

        return redirect()->route('pindahan.index')->with('success', 'Data pindahan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pindahan $pindahan)
    {
        $pindahan->delete();
        return redirect()->route('pindahan.index')->with('success', 'Data pindahan telah dihapus.');
    }
}
