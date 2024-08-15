@extends('layout.app')

@section('title', 'Edit Pindahan')

@section('header', 'Edit Data Pindahan')


@section('content')
    <div class="card">
        <!--Body-->
        <div class="card-content">
            <div class="card-body">
                <!--Form-->
                <form class="form form-horizontal" action="{{ route('pindahan.update', $pindahan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-body">
                        <div class="row">
                            <!--NIK-->
                            <div class="col-md-4">
                                <label for="nik">NIK</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="nik" class="form-control" placeholder="16 Digit NIK"
                                    name="nik" value="{{ old('nik', $pindahan->nik) }}" maxlength="16" required>
                            </div>

                            <!--Nama-->
                            <div class="col-md-4">
                                <label for="nama">Nama</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="nama" class="form-control" placeholder="Nama Lengkap"
                                    name="nama" value="{{ old('nama', $pindahan->nama) }}" required>
                            </div>

                            <!--Jenis Kelamin-->
                            <div class="col-md-4">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="" disabled>Pilih</option>
                                    <option value="laki-laki"
                                        {{ old('jenis_kelamin', $pindahan->jenis_kelamin) == 'laki-laki' ? 'selected' : '' }}>
                                        Laki-Laki</option>
                                    <option value="perempuan"
                                        {{ old('jenis_kelamin', $pindahan->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                            </div>

                            <!--Tanggal Pindah-->
                            <div class="col-md-4">
                                <label for="tanggal_pindah">Tanggal Pindah</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="date" id="tanggal_pindah" class="form-control" name="tanggal_pindah"
                                    value="{{ old('tanggal_pindah', $pindahan->tanggal_pindah) }}" required>
                            </div>

                            <!--Alasan Pindah-->
                            <div class="col-md-4">
                                <label for="alasan_pindah">Alasan Pindah</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="alasan_pindah" class="form-control" placeholder="Alasan Pindah"
                                    name="alasan_pindah" value="{{ old('alasan_pindah', $pindahan->alasan_pindah) }}"
                                    required>
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
