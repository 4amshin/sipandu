@extends('layout.app-no-sidebar')

@section('title', 'Tambah Kematian')

@section('content')
    <div class="card">
        <!--Header-->
        <div class="card-header">
            <h4 class="card-title">Tambah Data Kematian</h4>
        </div>

        <!--Body-->
        <div class="card-content">
            <div class="card-body">
                <!--Form-->
                <form class="form" action="{{ route('kematian.store') }}" method="POST">
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

                        <!--NIK-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" id="nik" class="form-control" placeholder="16 Digiti NIK"
                                    name="nik" maxlength="16" required>
                            </div>
                        </div>

                        <!-- Tempat Kematian -->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="tempat_kematian">Tempat Kematian</label>
                                <input type="text" id="tempat_kematian" class="form-control"
                                    placeholder="Tempat Kematian" name="tempat_kematian" required>
                            </div>
                        </div>

                        <!-- Tanggal Kematian -->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="tanggal_kematian">Tanggal Kematian</label>
                                <input type="date" id="tanggal_kematian" class="form-control" name="tanggal_kematian"
                                    required>
                            </div>
                        </div>

                        <!-- Jam Kematian -->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="jam_kematian">Jam Kematian</label>
                                <input type="time" id="jam_kematian" class="form-control" name="jam_kematian" required>
                            </div>
                        </div>

                        <!--Nama Ayah-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama_ayah">Nama Ayah</label>
                                <input type="text" id="nama_ayah" class="form-control" placeholder="Nama Ayah"
                                    name="nama_ayah" required>
                            </div>
                        </div>

                        <!--Nama Ibu-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama_ibu">Nama Ibu</label>
                                <input type="text" id="nama_ibu" class="form-control" placeholder="Nama Ibu"
                                    name="nama_ibu" required>
                            </div>
                        </div>

                        <!--Sebab Kematian-->
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="sebab">Sebab</label>
                                <input type="text" id="sebab" class="form-control" placeholder="Sebab Kematian"
                                    name="sebab" required>
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
