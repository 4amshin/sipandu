@extends('layout.app')

@section('title', 'Pendatang')

@section('header', 'Daftar Pendatang')

@section('content')
    <!--Notifikasi-->
    @include('layout.page-alert')

    <section class="section">
        <div class="card">
            <div class="card-body">
                <!--Tombol Tambah Data Pendatang-->
                <a href="{{ route('pendatang.create') }}" class="btn btn-primary mb-2">Tambah Data Pendatang</a>

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
                            <th>Tanggal Datang</th>
                            <th>Pelapor</th>
                            <th>Agama</th>
                            <th>TTL</th>
                            <th>Alamat</th>
                            <th>Status Pernikahan</th>
                            <th>Pendidikan</th>
                            <th>Pekerjaan</th>
                            <th>Ayah & Ibu</th>
                        </tr>
                    </thead>

                    <!--Body-->
                    <tbody>
                        @forelse ($daftarPendatang as $pendatang)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pendatang->no_kk }}</td>
                                <td>{{ $pendatang->nik }}</td>
                                <td>{{ $pendatang->nama }}</td>
                                <td>
                                    @if ($pendatang->jenis_kelamin == 'laki-laki')
                                        <span class="badge bg-light-info">Laki-Laki</span>
                                    @elseif ($pendatang->jenis_kelamin == 'perempuan')
                                        <span class="badge bg-light-danger">Perempuan</span>
                                    @endif
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($pendatang->tanggal_datang)->translatedFormat('d F Y') }}
                                </td>
                                <td>
                                    {{ $pendatang->nama_pelapor }}
                                </td>
                                <td>{{ $pendatang->agama }}</td>
                                <td>
                                    {{ $pendatang->tempat_lahir }},
                                    {{ \Carbon\Carbon::parse($pendatang->tanggal_lahir)->translatedFormat('d F Y') }}
                                </td>
                                <td>
                                    Dusun {{ $pendatang->dusun }}, RT{{ $pendatang->rt }}/RW{{ $pendatang->rw }}
                                </td>
                                <td>{{ ucwords(str_replace('_', ' ', $pendatang->status_pernikahan)) }}</td>
                                <td>{{ $pendatang->pendidikan }}</td>
                                <td>{{ $pendatang->pekerjaan }}</td>
                                <td>{{ $pendatang->nama_ayah . ' / ' . $pendatang->nama_ibu }}</td>
                                @can('super-user')
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Aksi
                                            </button>
                                            <div class="dropdown-menu">
                                                <!--Tombol Update-->
                                                <a href="{{ route('pendatang.edit', $pendatang->id) }}" class="dropdown-item">
                                                    <i class="bi bi-pen"></i> Edit
                                                </a>

                                                <!--Tombol Hapus-->
                                                <form action="{{ route('pendatang.destroy', $pendatang->id) }}" method="POST">
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

