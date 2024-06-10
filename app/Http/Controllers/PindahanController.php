<?php

namespace App\Http\Controllers;

use App\Models\Pindahan;
use App\Http\Requests\StorePindahanRequest;
use App\Http\Requests\UpdatePindahanRequest;

class PindahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pindahan.daftar-pindahan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePindahanRequest $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePindahanRequest $request, Pindahan $pindahan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pindahan $pindahan)
    {
        //
    }
}
