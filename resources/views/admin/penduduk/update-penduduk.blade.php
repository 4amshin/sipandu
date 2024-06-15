@extends('layout.app-no-sidebar')

@section('title', 'Update Penduduk')

@section('content')
    <div class="card">
        <!--Header-->
        <div class="card-header">
            <h4 class="card-title">Update Penduduk</h4>
        </div>

        <!--Body-->
        <div class="card-content">
            <div class="card-body">
                <!--Form-->
                <form class="form" action="{{ route('penduduk.update', $penduduk->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <!--Nama-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" class="form-control" placeholder="Nama Lengkap"
                                    name="nama" value="{{ $penduduk->nama }}" required>
                            </div>
                        </div>

                        <!--Jenis Kelamin-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1"
                                        value="laki-laki" {{ $penduduk->jenis_kelamin == 'laki-laki' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="jenis_kelamin1">Laki-Laki</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2"
                                        value="perempuan" {{ $penduduk->jenis_kelamin == 'perempuan' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="jenis_kelamin2">Perempuan</label>
                                </div>
                            </div>
                        </div>

                        <!--NIK-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" id="nik" class="form-control" placeholder="16 Digiti NIK"
                                    name="nik" value="{{ $penduduk->nik }}" maxlength="16" required>
                            </div>
                        </div>

                        <!--NO KK-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="no_kk">NO KK</label>
                                <input type="text" id="no_kk" class="form-control" placeholder="16 Digiti NO KK"
                                    name="no_kk" value="{{ $penduduk->no_kk }}" maxlength="16" required>
                            </div>
                        </div>

                        <!--RT-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="rt">Rukun Tetangga (RT)</label>
                                <input type="number" id="rt" class="form-control" placeholder="RT" name="rt"
                                    value="{{ $penduduk->rt }}" required>
                            </div>
                        </div>

                        <!--RW-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="rw">Rukun Warga (RW)</label>
                                <input type="number" id="rw" class="form-control" placeholder="RW" name="rw"
                                    value="{{ $penduduk->rw }}" required>
                            </div>
                        </div>

                        <!--DUSUN-->
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="dusun">Dusun</label>
                                <input type="text" id="dusun" class="form-control" placeholder="Dusun" name="dusun"
                                    value="{{ $penduduk->dusun }}" required>
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
