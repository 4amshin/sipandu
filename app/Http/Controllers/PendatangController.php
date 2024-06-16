<?php

namespace App\Http\Controllers;

use App\Models\Pendatang;
use App\Http\Requests\StorePendatangRequest;
use App\Http\Requests\UpdatePendatangRequest;
use Illuminate\Support\Facades\Gate;

class PendatangController extends Controller
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

        $daftarPendatang = Pendatang::all();

        return view('admin.pendatang.daftar-pendatang', compact('daftarPendatang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pendatang.tambah-pendatang');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePendatangRequest $request)
    {
        // Buat pendatang baru
        Pendatang::create($request->validated());

        // Redirect dengan pesan sukses
        return redirect()->route('pendatang.index')->with('success', 'Data pendatang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pendatang $pendatang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendatang $pendatang)
    {
        return view('admin.pendatang.update-pendatang', compact('pendatang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePendatangRequest $request, Pendatang $pendatang)
    {
        $pendatang->update($request->validated());

        return redirect()->route('pendatang.index')->with('success', 'Data pendatang berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendatang $pendatang)
    {
        $pendatang->delete();
        return redirect()->route('pendatang.index')->with('success', 'Data pendatang telah dihapus.');
    }
}
