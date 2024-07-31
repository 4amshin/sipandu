<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Http\Requests\StorePenggunaRequest;
use App\Http\Requests\UpdatePenggunaRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PenggunaController extends Controller
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

        $daftarPengguna = Pengguna::all();

        return view('admin.pengguna.daftar-pengguna', compact('daftarPengguna'));
    }

    public function profile()
    {
        $user = auth()->user();
        $pengguna = Pengguna::where('email', $user->email)->first();

        return view('auth.profile', compact('pengguna'));
    }

    public function updateProfile(UpdateProfileRequest $request, Pengguna $pengguna)
    {
        $validated = $request->validated();

        $oldFoto = $pengguna->gambar_profile;
        $gambarProfile = $request->file('gambar_profile');

        if ($request->hasFile('gambar_profile')) {
            if (!Storage::exists('public/profile')) {
                Storage::makeDirectory('public/profile');
            }

            $gambarProfile->store('public/profile');
            $validated['gambar_profile'] = $gambarProfile->hashName();

            if ($oldFoto) {
                Storage::disk('public/profile')->delete($oldFoto);
            }
        }

        $pengguna->update($validated);

        return redirect()->back()->with('success', 'Profile Berhasil diperbarui');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pengguna.tambah-pengguna');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePenggunaRequest $request)
    {
        //Cek Akses
        if (Gate::denies('super-user')) {
            abort(403, 'Anda tidak bisa mengakses halaman ini');
        }

        // Validasi
        $validatedData = $request->validated();

        //Simpan Pengguna
        Pengguna::create($validatedData);

        //Kembali
        return redirect()->route('pengguna.index')->with('success', 'Pengguna berhasil ditambahkan');
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
        return view('admin.pengguna.update-pengguna', compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenggunaRequest $request, Pengguna $pengguna)
    {
        //Cek Akses
        if (Gate::denies('super-user')) {
            abort(403, 'Anda tidak bisa mengakses halaman ini');
        }

        // Validasi
        $validatedData = $request->validated();

        // Simpan Perubahan
        $pengguna->update($validatedData);

        // Kembali
        return redirect()->route('pengguna.index')->with('success', 'Data Pengguna berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengguna $pengguna)
    {
        $pengguna->delete();
        return redirect()->route('pengguna.index')->with('success', 'Akun Pengguna Berhasil Dihapus');
    }
}
