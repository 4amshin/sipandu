@extends('layout.app-no-sidebar')

@section('title', 'Tambah Penduduk')

@section('content')
    <div class="card">
        <!--Header-->
        <div class="card-header">
            <h4 class="card-title">Tambah Penduduk</h4>
        </div>

        <!--Body-->
        <div class="card-content">
            <div class="card-body">
                <!--Form-->
                <form class="form" action="{{ route('penduduk.store') }}" method="POST">
                    @csrf
                    <div class="row">

                        <!--Nama-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" class="form-control" placeholder="Nama Lengkap"
                                    name="nama" required>
                            </div>
                        </div>

                        <!--Jenis Kelamin-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1"
                                        value="laki-laki" required>
                                    <label class="form-check-label" for="jenis_kelamin1">Laki-Laki</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2"
                                        value="perempuan" required>
                                    <label class="form-check-label" for="jenis_kelamin2">Perempuan</label>
                                </div>
                            </div>
                        </div>

                        <!-- Tempat Lahir -->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" id="tempat_lahir" class="form-control" placeholder="Tempat Lahir"
                                    name="tempat_lahir" required>
                            </div>
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir" required>
                            </div>
                        </div>

                        <!--NIK-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" id="nik" class="form-control" placeholder="16 Digiti NIK"
                                    name="nik" maxlength="16" required>
                            </div>
                        </div>

                        <!--NO KK-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="no_kk">NO KK</label>
                                <input type="text" id="no_kk" class="form-control" placeholder="16 Digiti NO KK"
                                    name="no_kk" maxlength="16" required>
                            </div>
                        </div>

                        <!--RT-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="rt">Rukun Tetangga (RT)</label>
                                <input type="number" id="rt" class="form-control" placeholder="RT" name="rt"
                                    required>
                            </div>
                        </div>

                        <!--RW-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="rw">Rukun Warga (RW)</label>
                                <input type="number" id="rw" class="form-control" placeholder="RW" name="rw"
                                    required>
                            </div>
                        </div>

                        <!--Dusun-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="dusun">Dusun</label>
                                <input type="text" id="dusun" class="form-control" placeholder="Dusun" name="dusun"
                                    required>
                            </div>
                        </div>

                        <!-- Agama -->
                        <div class="col-md-6 col-12">
                            <label for="agama">Agama</label>
                            <fieldset class="form-group">
                                <select id="agama" class="form-select" name="agama" required>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                </select>
                            </fieldset>
                        </div>

                        <!-- Status Pernikahan -->
                        <div class="col-md-6 col-12">
                            <label for="status_pernikahan">Status Pernikahan</label>
                            <fieldset class="form-group">
                                <select id="status_pernikahan" class="form-select" name="status_pernikahan" required>
                                    <option value="belum_kawin">Belum Kawin</option>
                                    <option value="kawin">Kawin</option>
                                </select>
                            </fieldset>
                        </div>

                        <!-- Pekerjaan -->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" id="pekerjaan" class="form-control" placeholder="Pekerjaan"
                                    name="pekerjaan" required>
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
