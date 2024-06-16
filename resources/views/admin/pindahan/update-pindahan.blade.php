@extends('layout.app-no-sidebar')

@section('title', 'Update Pindahan')

@section('content')
    <div class="card">
        <!--Header-->
        <div class="card-header">
            <h4 class="card-title">Update Data Pindahan</h4>
        </div>

        <!--Body-->
        <div class="card-content">
            <div class="card-body">
                <!--Form-->
                <form class="form" action="{{ route('pindahan.update', $pindahan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <!--Nama-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" class="form-control" placeholder="Nama Lengkap"
                                    name="nama" value="{{ $pindahan->nama }}" required>
                            </div>
                        </div>

                        <!--Jenis Kelamin-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1"
                                        value="laki-laki" {{ $pindahan->jenis_kelamin == 'laki-laki' ? 'checked' : '' }}
                                        required>
                                    <label class="form-check-label" for="jenis_kelamin1">Laki-Laki</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2"
                                        value="perempuan" {{ $pindahan->jenis_kelamin == 'perempuan' ? 'checked' : '' }}
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
                                    name="nik" value="{{ $pindahan->nik }}" maxlength="16" required>
                            </div>
                        </div>

                        <!-- Tanggal Pindah -->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="tanggal_pindah">Tanggal Pindah</label>
                                <input type="date" id="tanggal_pindah" class="form-control" name="tanggal_pindah"
                                    value="{{ $pindahan->tanggal_pindah }}" required>
                            </div>
                        </div>

                        <!--Alasan-->
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="alasan_pindah">Alasan Pindah</label>
                                <input type="text" id="alasan_pindah" class="form-control" placeholder="Alasan Pindah"
                                    name="alasan_pindah" value="{{ $pindahan->alasan_pindah }}" required>
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
