@extends('layout.app')

@section('title', 'Pengguna')

@push('customCss')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable.css') }}">
@endpush

@section('header', 'Daftar Pengguna')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-body">
                <!--Tombol Tambah Pengguna-->
                <a href="{{ route('pengguna.create') }}" class="btn btn-primary mb-2">Tambah Pengguna</a>

                <!--Tabel-->
                <table class="table table-striped" id="table1">
                    <!--Head-->
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Nomor Telepon</th>
                            <th>Email</th>
                            <th>Password</th>
                            {{-- <th>Aksi</th> --}}
                        </tr>
                    </thead>

                    <!--Body-->
                    <tbody>
                        @forelse ($daftarPengguna as $pengguna)
                            <tr>
                                <td>{{ $pengguna->nama }}</td>
                                <td>{{ $pengguna->nip }}</td>
                                <td>{{ $pengguna->nomor_telepon }}</td>
                                <td>{{ $pengguna->email }}</td>
                                <td>
                                    <span class="badge bg-light-info">{{ $pengguna->password }}</span>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Aksi
                                        </button>
                                        <div class="dropdown-menu">
                                            <!--Tombol Update-->
                                            <a href="{{ route('pengguna.edit', $pengguna->id) }}" class="dropdown-item">
                                                <i class="bi bi-pen"></i> Edit
                                            </a>
                                            <!--Tombol Update-->
                                            <a href="" class="dropdown-item">
                                                <i class="bi bi-trash3"></i> Hapus
                                            </a>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            Data Kosong
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection

@push('customJs')
    <script src={{ asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}></script>
    <script src={{ asset('assets/static/js/pages/simple-datatables.js') }}></script>
@endpush
