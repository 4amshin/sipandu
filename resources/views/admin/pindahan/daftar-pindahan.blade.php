@extends('layout.app')

@section('title', 'Pindahan')

@section('header', 'Daftar Pindahan')

@section('content')
    <!--Notifikasi-->
    @include('layout.page-alert')

    <section class="section">
        <div class="card">
            <div class="card-body">
                <!--Tombol Tambah Data Pindahan-->
                {{-- <a href="{{ route('pindahan.create') }}" class="btn btn-primary mb-2">Tambah Data Pindahan</a> --}}

                <!--Tabel-->
                <table class="table table-striped" id="table1">
                    <!--Head-->
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No KK</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Pindah</th>
                            <th>Alasan</th>
                        </tr>
                    </thead>

                    <!--Body-->
                    <tbody>
                        @forelse ($daftarPindahan as $pindahan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pindahan->no_kk }}</td>
                                <td>{{ $pindahan->nik }}</td>
                                <td>{{ $pindahan->nama }}</td>
                                <td>
                                    @if ($pindahan->jenis_kelamin == 'laki-laki')
                                        <span class="badge bg-light-info">Laki-Laki</span>
                                    @elseif ($pindahan->jenis_kelamin == 'perempuan')
                                        <span class="badge bg-light-danger">Perempuan</span>
                                    @endif
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($pindahan->tanggal_pindah)->translatedFormat('d F Y') }}
                                </td>
                                <td>
                                    {{ $pindahan->alasan_pindah }}
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
                                                <a href="{{ route('pindahan.edit', $pindahan->id) }}" class="dropdown-item">
                                                    <i class="bi bi-pen"></i> Edit
                                                </a>

                                                <!--Tombol Hapus-->
                                                <form action="{{ route('pindahan.destroy', $pindahan->id) }}" method="POST">
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

