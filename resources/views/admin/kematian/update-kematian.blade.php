@extends('layout.app')

@section('title', 'Edit Kematian')

@section('header', 'Edit Data Kematian')

@section('content')
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" action="{{ route('kematian.update', $kematian->id) }}" method="POST">
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
                                    name="nama" value="{{ $kematian->nama }}" required>
                            </div>

                            <!--Jenis Kelamin-->
                            <div class="col-md-4">
                                <label for="first-name-horizontal">Jenis Kelamin</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="" disabled>Pilih</option>
                                    <option value="laki-laki"
                                        {{ old('jenis_kelamin', $kematian->jenis_kelamin) == 'laki-laki' ? 'selected' : '' }}>
                                        Laki-Laki</option>
                                    <option value="perempuan"
                                        {{ old('jenis_kelamin', $kematian->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                            </div>

                            <!--NIK-->
                            <div class="col-md-4">
                                <label for="nik">NIK</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="nik" class="form-control" placeholder="16 Digit NIK"
                                    name="nik" maxlength="16" value="{{ $kematian->nik }}" required>
                            </div>

                            <!--Tempat Tanggal Kematian-->
                            <div class="col-md-4">
                                <label for="tempat_kematian">Tempat Tanggal Kematian</label>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="text" id="tempat_kematian" class="form-control"
                                    placeholder="Tempat Kematian" name="tempat_kematian"
                                    value="{{ $kematian->tempat_kematian }}" required>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="date" id="tanggal_kematian" class="form-control" name="tanggal_kematian"
                                    value="{{ $kematian->tanggal_kematian }}" required>
                            </div>


                            <!--Jam Kematian-->
                            <div class="col-md-4">
                                <label for="jam_kematian">Jam Kematian</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="time" id="jam_kematian" class="form-control" name="jam_kematian"
                                    value="{{ $kematian->jam_kematian }}" required>
                            </div>

                            <!--Nama Ayah-->
                            <div class="col-md-4">
                                <label for="nama_ayah">Nama Ayah</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="nama_ayah" class="form-control" placeholder="Nama Ayah"
                                    name="nama_ayah" value="{{ $kematian->nama_ayah }}" required>
                            </div>

                            <!--Nama Ibu-->
                            <div class="col-md-4">
                                <label for="nama_ibu">Nama Ibu</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="nama_ibu" class="form-control" placeholder="Nama Ibu"
                                    name="nama_ibu" value="{{ $kematian->nama_ibu }}" required>
                            </div>

                            <!--Sebab Kematian-->
                            <div class="col-md-4">
                                <label for="sebab">Sebab</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="sebab" class="form-control" placeholder="Sebab Kematian"
                                    name="sebab" value="{{ $kematian->sebab }}" required>
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
