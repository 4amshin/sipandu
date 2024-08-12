@extends('layout.app')

@section('title', 'Kematian')

@section('header', 'Daftar Kematian')

@section('content')
    <!--Notifikasi-->
    @include('layout.page-alert')

    <section class="section">
        <div class="card">
            <div class="card-body">
                <!--Tombol Tambah Data Kematian-->
                <a href="{{ route('kematian.create') }}" class="btn btn-primary mb-2">Tambah Data Kematian</a>

                <!--Tabel-->
                <table class="table table-striped" id="table1">
                    <!--Head-->
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Tanggal Kematian</th>
                            <th>Jam Kematian</th>
                            <th>Ayah</th>
                            <th>Ibu</th>
                        </tr>
                    </thead>

                    <!--Body-->
                    <tbody>
                        @forelse ($daftarKematian as $kematian)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kematian->nama }}</td>
                                <td>{{ $kematian->nik }}</td>
                                <td>
                                    @if ($kematian->jenis_kelamin == 'laki-laki')
                                        <span class="badge bg-light-info">Laki-Laki</span>
                                    @elseif ($kematian->jenis_kelamin == 'perempuan')
                                        <span class="badge bg-light-danger">Perempuan</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $kematian->tempat_kematian }},
                                    {{ \Carbon\Carbon::parse($kematian->tanggal_kematian)->translatedFormat('d F Y') }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::createFromFormat('H:i:s', $kematian->jam_kematian)->format('h:i A') }}
                                </td>
                                <td>
                                    {{ $kematian->nama_ayah }}
                                </td>
                                <td>
                                    {{ $kematian->nama_ibu }}
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
                                                <a href="{{ route('kematian.edit', $kematian->id) }}" class="dropdown-item">
                                                    <i class="bi bi-pen"></i> Edit
                                                </a>

                                                <!--Tombol Hapus-->
                                                <form action="{{ route('kematian.destroy', $kematian->id) }}" method="POST">
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

