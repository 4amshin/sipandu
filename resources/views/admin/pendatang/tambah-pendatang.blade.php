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
