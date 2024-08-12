@extends('layout.app')

@section('title', 'Update Pendatang')

@section('header', 'Edit Data Pendatang')

@section('content')
    <div class="card">
        <!--Body-->
        <div class="card-content">
            <div class="card-body">
                <!--Form-->
                <form class="form form-horizontal" action="{{ route('pendatang.update', $pendatang->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="row">

                            <!--Nama-->
                            <div class="col-md-4">
                                <label for="nama">Nama</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="nama" class="form-control" placeholder="Nama Lengkap"
                                    name="nama" value="{{ $pendatang->nama }}" required>
                            </div>

                            <!--Jenis Kelamin-->
                            <div class="col-md-4">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="" disabled>Pilih</option>
                                    <option value="laki-laki" {{ $pendatang->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="perempuan" {{ $pendatang->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>

                            <!--NIK-->
                            <div class="col-md-4">
                                <label for="nik">NIK</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="nik" class="form-control" placeholder="16 Digit NIK"
                                    name="nik" maxlength="16" value="{{ $pendatang->nik }}" required>
                            </div>

                            <!--Tanggal Datang-->
                            <div class="col-md-4">
                                <label for="tanggal_datang">Tanggal Datang</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="date" id="tanggal_datang" class="form-control" name="tanggal_datang"
                                    value="{{ $pendatang->tanggal_datang }}" required>
                            </div>

                            <!--Nama Pelapor-->
                            <div class="col-md-4">
                                <label for="nama_pelapor">Nama Pelapor</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="nama_pelapor" class="form-control" placeholder="Nama Pelapor"
                                    name="nama_pelapor" value="{{ $pendatang->nama_pelapor }}" required>
                            </div>

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
