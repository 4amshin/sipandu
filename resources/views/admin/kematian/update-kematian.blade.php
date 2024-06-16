@extends('layout.app-no-sidebar')

@section('title', 'Update Kematian')

@section('content')
    <div class="card">
        <!-- Header -->
        <div class="card-header">
            <h4 class="card-title">Update Kematian</h4>
        </div>

        <!-- Body -->
        <div class="card-content">
            <div class="card-body">
                <!-- Form -->
                <form class="form" action="{{ route('kematian.update', $kematian->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">


                        <!-- Nama -->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" class="form-control" placeholder="Nama Lengkap"
                                    name="nama" value="{{ $kematian->nama }}" required>
                            </div>
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1"
                                        value="laki-laki" {{ $kematian->jenis_kelamin == 'laki-laki' ? 'checked' : '' }}
                                        required>
                                    <label class="form-check-label" for="jenis_kelamin1">Laki-Laki</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2"
                                        value="perempuan" {{ $kematian->jenis_kelamin == 'perempuan' ? 'checked' : '' }}
                                        required>
                                    <label class="form-check-label" for="jenis_kelamin2">Perempuan</label>
                                </div>
                            </div>
                        </div>

                        <!-- NIK -->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" id="nik" class="form-control" placeholder="16 Digit NIK"
                                    name="nik" maxlength="16" value="{{ $kematian->nik }}" required>
                            </div>
                        </div>

                        <!-- Tanggal Kematian -->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="tanggal_kematian">Tanggal Kematian</label>
                                <input type="date" id="tanggal_kematian" class="form-control" name="tanggal_kematian"
                                    value="{{ $kematian->tanggal_kematian }}" required>
                            </div>
                        </div>

                        <!-- Jam Kematian -->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="jam_kematian">Jam Kematian</label>
                                <input type="time" id="jam_kematian" class="form-control" name="jam_kematian"
                                    value="{{ $kematian->jam_kematian }}" required>
                            </div>
                        </div>

                        <!-- Tempat Kematian -->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="tempat_kematian">Tempat Kematian</label>
                                <input type="text" id="tempat_kematian" class="form-control"
                                    placeholder="Tempat Kematian" name="tempat_kematian"
                                    value="{{ $kematian->tempat_kematian }}" required>
                            </div>
                        </div>

                        <!-- Sebab -->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="sebab">Sebab</label>
                                <input type="text" id="sebab" class="form-control" placeholder="Sebab Kematian"
                                    name="sebab" value="{{ $kematian->sebab }}" required>
                            </div>
                        </div>

                        <!-- Nama Ayah -->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama_ayah">Nama Ayah</label>
                                <input type="text" id="nama_ayah" class="form-control" placeholder="Nama Ayah"
                                    name="nama_ayah" value="{{ $kematian->nama_ayah }}" required>
                            </div>
                        </div>

                        <!-- Nama Ibu -->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama_ibu">Nama Ibu</label>
                                <input type="text" id="nama_ibu" class="form-control" placeholder="Nama Ibu"
                                    name="nama_ibu" value="{{ $kematian->nama_ibu }}" required>
                            </div>
                        </div>

                        <!-- Buttons -->
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
