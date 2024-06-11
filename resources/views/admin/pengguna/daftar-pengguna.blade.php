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
                                <td>{{ $pengguna->password }}</td>
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
