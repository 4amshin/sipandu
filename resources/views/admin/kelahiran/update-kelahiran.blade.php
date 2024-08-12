@extends('layout.app')

@section('title', 'Edit Kelahiran')

@section('header', 'Edit Data Kelahiran')

@section('content')
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" action="{{ route('kelahiran.update', $kelahiran->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="row">
                            <!--Nama-->
                            <div class="col-md-4">
                                <label for="first-name-horizontal">Nama</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="nama" class="form-control" placeholder="Nama Lengkap"
                                    name="nama" value="{{ old('nama', $kelahiran->nama) }}" required>
                            </div>

                            <!--Jenis Kelamin-->
                            <div class="col-md-4">
                                <label for="first-name-horizontal">Jenis Kelamin</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="" disabled>Pilih</option>
                                    <option value="laki-laki"
                                        {{ old('jenis_kelamin', $kelahiran->jenis_kelamin) == 'laki-laki' ? 'selected' : '' }}>
                                        Laki-Laki</option>
                                    <option value="perempuan"
                                        {{ old('jenis_kelamin', $kelahiran->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                            </div>

                            <!--Tempat Tanggal Lahir-->
                            <div class="col-md-4">
                                <label for="first-name-horizontal">Tempat Tanggal Lahir</label>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="text" id="tempat_lahir" class="form-control" placeholder="Tempat Lahir"
                                    name="tempat_lahir" value="{{ old('tempat_lahir', $kelahiran->tempat_lahir) }}"
                                    required>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir"
                                    value="{{ old('tanggal_lahir', $kelahiran->tanggal_lahir) }}" required>
                            </div>

                            <!--Jam Lahir-->
                            <div class="col-md-4">
                                <label for="first-name-horizontal">Jam Lahir</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="time" id="jam_lahir" class="form-control" name="jam_lahir"
                                    value="{{ old('jam_lahir', $kelahiran->jam_lahir) }}" required>
                            </div>

                            <!--Ayah-->
                            <div class="col-md-4">
                                <label for="first-name-horizontal">Ayah</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="nama_ayah" class="form-control" placeholder="Nama Ayah"
                                    name="nama_ayah" value="{{ old('nama_ayah', $kelahiran->nama_ayah) }}" required>
                            </div>

                            <!--Ibu-->
                            <div class="col-md-4">
                                <label for="first-name-horizontal">Ibu</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="nama_ibu" class="form-control" placeholder="Nama Ibu"
                                    name="nama_ibu" value="{{ old('nama_ibu', $kelahiran->nama_ibu) }}" required>
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
