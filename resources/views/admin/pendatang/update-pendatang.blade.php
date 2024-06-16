@extends('layout.app-no-sidebar')

@section('title', 'Update Pendatang')

@section('content')
    <div class="card">
        <!--Header-->
        <div class="card-header">
            <h4 class="card-title">Update Data Pendatang</h4>
        </div>

        <!--Body-->
        <div class="card-content">
            <div class="card-body">
                <!--Form-->
                <form class="form" action="{{ route('pendatang.update', $pendatang->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <!--Nama-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" class="form-control" placeholder="Nama Lengkap"
                                    name="nama" value="{{ $pendatang->nama }}" required>
                            </div>
                        </div>

                        <!--Jenis Kelamin-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1"
                                        value="laki-laki" {{ $pendatang->jenis_kelamin == 'laki-laki' ? 'checked' : '' }}
                                        required>
                                    <label class="form-check-label" for="jenis_kelamin1">Laki-Laki</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2"
                                        value="perempuan" {{ $pendatang->jenis_kelamin == 'perempuan' ? 'checked' : '' }}
                                        required>
                                    <label class="form-check-label" for="jenis_kelamin2">Perempuan</label>
                                </div>
                            </div>
                        </div>

                        <!--NIK-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" id="nik" class="form-control" placeholder="16 Digiti NIK"
                                    name="nik" value="{{ $pendatang->nik }}" maxlength="16" required>
                            </div>
                        </div>

                        <!-- Tanggal Datang -->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="tanggal_datang">Tanggal Datang</label>
                                <input type="date" id="tanggal_datang" class="form-control" name="tanggal_datang"
                                    value="{{ $pendatang->tanggal_datang }}" required>
                            </div>
                        </div>

                        <!--Nama Pelapor-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama_pelapor">Nama Pelapor</label>
                                <input type="text" id="nama_pelapor" class="form-control" placeholder="Nama Pelapor"
                                    name="nama_pelapor" value="{{ $pendatang->nama_pelapor }}" required>
                            </div>
                        </div>

                        <!--Alamat Pendatang-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="alamat_pendatang">Alamat Pendatang</label>
                                <input type="text" id="alamat_pendatang" class="form-control"
                                    placeholder="Alamat Pendatang" name="alamat_pendatang"
                                    value="{{ $pendatang->alamat_pendatang }}" required>
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
