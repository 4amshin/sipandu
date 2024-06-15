@extends('layout.app-no-sidebar')

@section('title', 'Update Kelahiran')

@section('content')
    <div class="card">
        <!--Header-->
        <div class="card-header">
            <h4 class="card-title">Update Data Kelahiran</h4>
        </div>

        <!--Body-->
        <div class="card-content">
            <div class="card-body">
                <!--Form-->
                <form class="form" action="{{ route('kelahiran.update', $kelahiran->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <!--Nama-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" class="form-control" placeholder="Nama Lengkap"
                                    name="nama" value="{{ $kelahiran->nama }}" required>
                            </div>
                        </div>

                        <!--Jenis Kelamin-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1"
                                        value="laki-laki" {{ $kelahiran->jenis_kelamin == 'laki-laki' ? 'checked' : '' }}
                                        required>
                                    <label class="form-check-label" for="jenis_kelamin1">Laki-Laki</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2"
                                        value="perempuan" {{ $kelahiran->jenis_kelamin == 'perempuan' ? 'checked' : '' }}
                                        required>
                                    <label class="form-check-label" for="jenis_kelamin2">Perempuan</label>
                                </div>
                            </div>
                        </div>

                        <!-- Tempat Lahir -->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" id="tempat_lahir" class="form-control" placeholder="Tempat Lahir"
                                    name="tempat_lahir" value="{{ $kelahiran->tempat_lahir }}" required>
                            </div>
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir"
                                    value="{{ $kelahiran->tanggal_lahir }}" required>
                            </div>
                        </div>

                        <!-- Jam Lahir -->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="jam_lahir">Jam Lahir</label>
                                <input type="time" id="jam_lahir" class="form-control" name="jam_lahir"
                                    value="{{ $kelahiran->jam_lahir }}" required>
                            </div>
                        </div>

                        <!--Nama Ayah-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama_ayah">Nama Ayah</label>
                                <input type="text" id="nama_ayah" class="form-control" placeholder="Nama Ayah"
                                    name="nama_ayah" value="{{ $kelahiran->nama_ayah }}" required>
                            </div>
                        </div>

                        <!--Nama Ibu-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama_ibu">Nama Ibu</label>
                                <input type="text" id="nama_ibu" class="form-control" placeholder="Nama Ibu"
                                    name="nama_ibu" value="{{ $kelahiran->nama_ibu }}" required>
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
