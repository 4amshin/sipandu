@extends('layout.app')

@section('title', 'Edit Kelahiran')

@section('header', 'Edit Data Kelahiran')

@section('content')
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal" action="{{ route('kelahiran.update', $kelahiran->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="row">
                            <!--Nama-->
                            <div class="col-md-4">
                                <label for="first-name-horizontal">Nama</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="nama" class="form-control" placeholder="Nama Lengkap"
                                    name="nama" value="{{ $kelahiran->nama }}" required>
                            </div>

                            <!--Tanggal Lahir-->
                            <div class="col-md-4">
                                <label for="first-name-horizontal">Tanggal Lahir</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir"
                                    value="{{ $kelahiran->tanggal_lahir }}" required>
                            </div>

                            <!--Jenis Kelamin-->
                            <div class="col-md-4">
                                <label for="first-name-horizontal">Jenis Kelamin</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="" disabled>Pilih</option>
                                    <option value="laki-laki"
                                        {{ $kelahiran->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="perempuan"
                                        {{ $kelahiran->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>

                            <!--Keluarga-->
                            <div class="col-md-4">
                                <label for="first-name-horizontal">Keluarga</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <input type="text" id="keluarga" class="form-control" placeholder="Keluarga"
                                    name="keluarga" value="{{ $kelahiran->keluarga }}" required>
                            </div>

                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
                                <button type="button" class="btn btn-danger me-1 mb-1"
                                    onclick="window.history.back()">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
