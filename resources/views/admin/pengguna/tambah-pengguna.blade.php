@extends('layout.app-no-sidebar')

@section('title', 'Tambah Pengguna')

@section('content')
    <div class="card">
        <!--Header-->
        <div class="card-header">
            <h4 class="card-title">Tambah Pengguna</h4>
        </div>

        <!--Body-->
        <div class="card-content">
            <div class="card-body">
                <!--Form-->
                <form class="form" action="{{ route('pengguna.store') }}" method="POST">
                    @csrf
                    <div class="row">

                        <!--Role-->
                        <input type="hidden" name="role" id="role" value="admin">

                        <!--Nama-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" class="form-control" placeholder="Nama Lengkap"
                                    name="nama" required>
                            </div>
                        </div>

                        <!--Nip-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" id="nip" class="form-control" placeholder="Nomor Induk Pegawai"
                                    name="nip" required>
                            </div>
                        </div>

                        <!--Nomor Telepon-->
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="nomor_telepon">Kontak</label>
                                <input type="text" id="nomor_telepon" class="form-control"
                                    placeholder="Nomor Telepon/Whatsapp" name="nomor_telepon">
                            </div>
                        </div>

                        <!--Email-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" name="email" placeholder="Email"
                                    required>
                            </div>
                        </div>

                        <!--Password-->
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="form-control" name="password" required>
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
