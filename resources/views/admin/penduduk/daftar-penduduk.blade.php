@extends('layout.app')

@section('title', 'Penduduk')

@section('header', 'Daftar Penduduk')

@push('customCss')
    <link rel="stylesheet" href="{{ asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable.css') }}">
@endpush

@section('content')
    <!--Notifikasi-->
    @include('layout.page-alert')

    <section class="section">
        <div class="card">
            <div class="card-body">
                <!--Tombol Tambah Penduduk-->
                <a href="{{ route('penduduk.create') }}" class="btn btn-primary mb-2">Tambah Penduduk</a>

                <!--Tabel-->
                <table class="table table-striped" id="table1">
                    <!--Head-->
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>NO KK</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>

                    <!--Body-->
                    <tbody>
                        @forelse ($daftarPenduduk as $penduduk)
                            <tr>
                                <td>{{ $penduduk->nama }}</td>
                                <td>{{ $penduduk->nik }}</td>
                                <td>{{ $penduduk->no_kk }}</td>
                                <td>
                                    @if ($penduduk->jenis_kelamin == 'laki-laki')
                                        <span class="badge bg-light-info">Laki-Laki</span>
                                    @elseif ($penduduk->jenis_kelamin == 'perempuan')
                                        <span class="badge bg-light-danger">Perempuan</span>
                                    @endif
                                </td>
                                <td>
                                    Dusun {{ $penduduk->dusun }}, RT{{ $penduduk->rt }}/RW{{ $penduduk->rw }}
                                </td>
                                @can('super-user')
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Aksi
                                            </button>
                                            <div class="dropdown-menu">
                                                <!--Tombol Update-->
                                                <a href="{{ route('penduduk.edit', $penduduk->id) }}" class="dropdown-item">
                                                    <i class="bi bi-pen"></i> Edit
                                                </a>

                                                <!--Tombol Hapus-->
                                                <form action="{{ route('penduduk.destroy', $penduduk->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item">
                                                        <i class="bi bi-trash3"></i> Hapus
                                                    </button>
                                                </form>

                                            </div>
                                        </div>
                                    </td>
                                @endcan
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
