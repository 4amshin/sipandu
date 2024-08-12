@extends('layout.app')

@section('title', 'Edit Penduduk')

@section('header', 'Edit Data Penduduk')

@section('content')
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" action="{{ route('penduduk.update', $penduduk->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Method untuk update -->
                    <div class="form-body">
                        <div class="row">
                            <!--NIK-->
                            <div class="col-md-4">
                                <label for="nik">NIK</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="nik" class="form-control" placeholder="16 Digiti NIK"
                                    name="nik" maxlength="16" value="{{ old('nik', $penduduk->nik) }}" required>
                            </div>

                            <!--NO KK-->
                            <div class="col-md-4">
                                <label for="no_kk">NO KK</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="no_kk" class="form-control" placeholder="16 Digiti NO KK"
                                    name="no_kk" maxlength="16" value="{{ old('no_kk', $penduduk->no_kk) }}" required>
                            </div>

                            <!--Nama-->
                            <div class="col-md-4">
                                <label for="nama">Nama</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="nama" class="form-control" placeholder="Nama Lengkap"
                                    name="nama" value="{{ old('nama', $penduduk->nama) }}" required>
                            </div>

                            <!--Tempat Tanggal Lahir-->
                            <div class="col-md-4">
                                <label for="tempat_lahir">Tempat/Tgl Lahir</label>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="text" id="tempat_lahir" class="form-control" placeholder="Tempat Lahir"
                                    name="tempat_lahir" value="{{ old('tempat_lahir', $penduduk->tempat_lahir) }}" required>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir"
                                    value="{{ old('tanggal_lahir', $penduduk->tanggal_lahir) }}" required>
                            </div>

                            <!--Jenis Kelamin-->
                            <div class="col-md-4">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="" disabled>Pilih</option>
                                    <option value="laki-laki"
                                        {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'laki-laki' ? 'selected' : '' }}>
                                        Laki-Laki</option>
                                    <option value="perempuan"
                                        {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                            </div>

                            <!--Dusun-->
                            <div class="col-md-4">
                                <label for="dusun">Dusun</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="dusun" class="form-control" placeholder="Dusun" name="dusun"
                                    value="{{ old('dusun', $penduduk->dusun) }}" required>
                            </div>

                            <!--RT/RW-->
                            <div class="col-md-4">
                                <label for="rt_rw">RT/RW</label>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="number" id="rt" class="form-control" placeholder="RT" name="rt"
                                    value="{{ old('rt', $penduduk->rt) }}" required>
                            </div>
                            <div class="col-md-4 form-group">
                                <input type="number" id="rw" class="form-control" placeholder="RW" name="rw"
                                    value="{{ old('rw', $penduduk->rw) }}" required>
                            </div>

                            <!--Agama-->
                            <div class="col-md-4">
                                <label for="agama">Agama</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <select id="agama" class="form-select" name="agama" required>
                                    <option value="" disabled>Pilih</option>
                                    <option value="Islam"
                                        {{ old('agama', $penduduk->agama) == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Kristen"
                                        {{ old('agama', $penduduk->agama) == 'Kristen' ? 'selected' : '' }}>Kristen
                                    </option>
                                    <option value="Katolik"
                                        {{ old('agama', $penduduk->agama) == 'Katolik' ? 'selected' : '' }}>Katolik
                                    </option>
                                    <option value="Hindu"
                                        {{ old('agama', $penduduk->agama) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Buddha"
                                        {{ old('agama', $penduduk->agama) == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                </select>
                            </div>

                            <!--Status Pernikahan-->
                            <div class="col-md-4">
                                <label for="status_pernikahan">Status Pernikahan</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <select id="status_pernikahan" class="form-select" name="status_pernikahan" required>
                                    <option value="" disabled>Pilih</option>
                                    <option value="belum_kawin"
                                        {{ old('status_pernikahan', $penduduk->status_pernikahan) == 'belum_kawin' ? 'selected' : '' }}>
                                        Belum Kawin</option>
                                    <option value="kawin"
                                        {{ old('status_pernikahan', $penduduk->status_pernikahan) == 'kawin' ? 'selected' : '' }}>
                                        Kawin</option>
                                </select>
                            </div>

                            <!--Pendidikan-->
                            <div class="col-md-4">
                                <label for="first-name-horizontal">Pendidikan</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="pendidikan" class="form-control" placeholder="Pendidikan"
                                    name="pendidikan" value="{{ old('pendudukan', $penduduk->pendidikan) }}">
                            </div>

                            <!--Pekerjaan-->
                            <div class="col-md-4">
                                <label for="pekerjaan">Pekerjaan</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="pekerjaan" class="form-control" placeholder="Pekerjaan"
                                    name="pekerjaan" value="{{ old('pekerjaan', $penduduk->pekerjaan) }}">
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
