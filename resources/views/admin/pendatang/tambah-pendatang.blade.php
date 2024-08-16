@extends('layout.app')

@section('title', 'Tambah Pendatang')

@section('content')
    <div class="card">
        <!--Header-->
        <div class="card-header">
            <h4 class="card-title">Tambah Data Pendatang</h4>
        </div>

        <!--Body-->
        <div class="card-content">
            <div class="card-body">
                <!--Form-->
                <form class="form form-horizontal" action="{{ route('pendatang.store') }}" method="POST">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <!--NIK-->
                            <div class="col-md-4">
                                <label for="nik">NIK</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="nik" class="form-control" placeholder="16 Digit NIK"
                                    name="nik" maxlength="16" required>
                            </div>

                            <!--NO KK-->
                            <div class="col-md-4">
                                <label for="first-name-horizontal">NO KK</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="no_kk" class="form-control" placeholder="16 Digiti NO KK"
                                    name="no_kk" maxlength="16" required>
                            </div>

                            <!--Nama-->
                            <div class="col-md-4">
                                <label for="first-name-horizontal">Nama</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="nama" class="form-control" placeholder="Nama Lengkap"
                                    name="nama" required>
                            </div>

                            <!--Tempat Tanggal Lahir-->
                            <div class="col-md-4">
                                <label for="first-name-horizontal">Tempat/Tgl Lahir</label>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="text" id="tempat_lahir" class="form-control" placeholder="Tempat Lahir"
                                    name="tempat_lahir" required>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir" required>
                            </div>

                            <!--Jenis Kelamin-->
                            <div class="col-md-4">
                                <label for="first-name-horizontal">Jenis Kelamin</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="" disabled selected>Pilih</option>
                                    <option value="laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>

                            <!--Dusun-->
                            <div class="col-md-4">
                                <label for="first-name-horizontal">Dusun</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="dusun" class="form-control" placeholder="Dusun" name="dusun"
                                    required>
                            </div>

                            <!--RT/RW-->
                            <div class="col-md-4">
                                <label for="first-name-horizontal">RT/RW</label>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="number" id="rt" class="form-control" placeholder="RT" name="rt"
                                    required>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="number" id="rw" class="form-control" placeholder="RW" name="rw"
                                    required>
                            </div>

                            <!--Agama-->
                            <div class="col-md-4">
                                <label for="first-name-horizontal">Agama</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <select id="agama" class="form-select" name="agama" required>
                                    <option value="" disabled selected>Pilih</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                </select>
                            </div>

                            <!--Status Pernikahan-->
                            <div class="col-md-4">
                                <label for="first-name-horizontal">Status Pernikahan</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <select id="status_pernikahan" class="form-select" name="status_pernikahan" required>
                                    <option value="" disabled selected>Pilih</option>
                                    <option value="belum_kawin">Belum Kawin</option>
                                    <option value="kawin">Kawin</option>
                                </select>
                            </div>

                            <!--Pendidikan-->
                            <div class="col-md-4">
                                <label for="first-name-horizontal">Pendidikan</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="pendidikan" class="form-control" placeholder="Pendidikan"
                                    name="pendidikan">
                            </div>

                            <!--Pekerjaan-->
                            <div class="col-md-4">
                                <label for="first-name-horizontal">Pekerjaan</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="pekerjaan" class="form-control" placeholder="Pekerjaan"
                                    name="pekerjaan">
                            </div>

                            <!--Nama Ayah & Ibu-->
                            <div class="col-md-4">
                                <label for="nama_ayah">Nama Ayah & Ibu</label>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="text" id="nama_ayah" class="form-control" placeholder="Nama Ayah"
                                    name="nama_ayah" required>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="text" id="nama_ibu" class="form-control" placeholder="Nama Ibu"
                                    name="nama_ibu" required>
                            </div>

                            <!--Tanggal Datang-->
                            <div class="col-md-4">
                                <label for="tanggal_datang">Tanggal Datang</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="date" id="tanggal_datang" class="form-control" name="tanggal_datang"
                                    required>
                            </div>

                            <!--Nama Pelapor-->
                            <div class="col-md-4">
                                <label for="nama_pelapor">Nama Pelapor</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="nama_pelapor" class="form-control" placeholder="Nama Pelapor"
                                    name="nama_pelapor" required>
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
