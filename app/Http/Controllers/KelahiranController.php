<?php

namespace App\Http\Controllers;

use App\Models\Kelahiran;
use App\Http\Requests\StoreKelahiranRequest;
use App\Http\Requests\UpdateKelahiranRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class KelahiranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $daftarKelahiran = Kelahiran::all();

        return view('admin.kelahiran.daftar-kelahiran', compact('daftarKelahiran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kelahiran.tambah-kelahiran');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKelahiranRequest $request)
    {
        // Buat data kelahiran baru
        Kelahiran::create($request->validated());

        // Redirect dengan pesan sukses
        return redirect()->route('kelahiran.index')->with('success', 'Data Kelahiran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelahiran $kelahiran)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelahiran $kelahiran)
    {
        return view('admin.kelahiran.update-kelahiran', compact('kelahiran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKelahiranRequest $request, Kelahiran $kelahiran)
    {
        dd($request->all());
        // atau
        Log::info($request->all());

        // $kelahiran->update($request->validated());

        // return redirect()->route('kelahiran.index')->with('success', 'Data kelahiran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelahiran $kelahiran)
    {
        $kelahiran->delete();
        return redirect()->route('kelahiran.index')->with('success', 'Data Kelahiran telah dihapus.');
    }
}
