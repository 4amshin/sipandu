@extends('layout.app-no-sidebar')

@section('title', 'Update Pengguna')

@section('content')
    <div class="card">
        <!--Header-->
        <div class="card-header">
            <h4 class="card-title">Update Pengguna</h4>
        </div>

        <!--Body-->
        <div class="card-content">
            <div class="card-body">
                <!--Form-->
                <form class="form">
                    <div class="row">

                        <!--Nama-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" class="form-control" placeholder="Nama Lengkap"
                                    name="nama" value="{{ $pengguna->nama }}">
                            </div>
                        </div>

                        <!--Nip-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" id="nip" class="form-control" placeholder="Nomor Induk Pegawai"
                                    name="nip" value="{{ $pengguna->nip }}">
                            </div>
                        </div>

                        <!--Nomor Telepon-->
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="nomor_telepon">Kontak</label>
                                <input type="text" id="nomor_telepon" class="form-control"
                                    placeholder="Nomor Telepo/Whatsapp" name="nomor_telepon"
                                    value="{{ $pengguna->nomor_telepon }}">
                            </div>
                        </div>

                        <!--Email-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" name="email" placeholder="Email"
                                    value="{{ $pengguna->email }}">
                            </div>
                        </div>

                        <!--Password-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="form-control" name="password"
                                    value="{{ $pengguna->password }}">
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
