@extends('layout.app')

@section('title', 'Tambah Pindahan')

@section('header', 'Tambah Data Pindahan')

@section('content')
    <div class="card">
        <!--Body-->
        <div class="card-content">
            <div class="card-body">
                <!--Form-->
                <form class="form form-horizontal" action="{{ route('pindahan.store') }}" method="POST">
                    @csrf

                    <div class="form-body">
                        <div class="row">

                            <!--Nama-->
                            <div class="col-md-4">
                                <label for="nama">Nama</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="nama" class="form-control" placeholder="Nama Lengkap"
                                    name="nama" required>
                            </div>

                            <!--Jenis Kelamin-->
                            <div class="col-md-4">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="" disabled selected>Pilih</option>
                                    <option value="laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>

                            <!--NIK-->
                            <div class="col-md-4">
                                <label for="nik">NIK</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="nik" class="form-control" placeholder="16 Digit NIK"
                                    name="nik" maxlength="16" required>
                            </div>

                            <!--Tanggal Pindah-->
                            <div class="col-md-4">
                                <label for="tanggal_pindah">Tanggal Pindah</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="date" id="tanggal_pindah" class="form-control" name="tanggal_pindah"
                                    required>
                            </div>

                            <!--Alasan Pindah-->
                            <div class="col-md-4">
                                <label for="alasan_pindah">Alasan Pindah</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="alasan_pindah" class="form-control" placeholder="Alasan Pindah"
                                    name="alasan_pindah" required>
                            </div>

                            <!--Buttons-->
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                <button type="button" class="btn btn-danger me-1 mb-1"
                                    onclick="window.history.back()">Batal</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
