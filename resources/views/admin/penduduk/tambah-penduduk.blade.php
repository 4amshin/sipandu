@extends('layout.app')

@section('title', 'Tambah Penduduk')

@section('header', 'Tambah Data Penduduk')

@section('content')
    {{-- <div class="card">
        <!--Body-->
        <div class="card-content">
            <div class="card-body">
                <!--Form-->
                <form class="form" action="{{ route('penduduk.store') }}" method="POST">
                    @csrf
                    <div class="row">

                        <!--NIK-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" id="nik" class="form-control" placeholder="16 Digiti NIK"
                                    name="nik" maxlength="16" required>
                            </div>
                        </div>

                        <!--Nama-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" class="form-control" placeholder="Nama Lengkap"
                                    name="nama" required>
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
                                    name="pekerjaan">
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

    </div> --}}

    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" action="{{ route('penduduk.store') }}" method="POST">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <!--NIK-->
                            <div class="col-md-4">
                                <label for="first-name-horizontal">NIK</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="nik" class="form-control" placeholder="16 Digiti NIK"
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

                            <!--Pekerjaan-->
                            <div class="col-md-4">
                                <label for="first-name-horizontal">Pekerjaan</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="pekerjaan" class="form-control" placeholder="Pekerjaan"
                                    name="pekerjaan">
                            </div>



                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
