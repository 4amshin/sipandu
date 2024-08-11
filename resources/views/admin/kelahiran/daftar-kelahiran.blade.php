@extends('layout.app')

@section('title', 'Kelahiran')

@section('header', 'Daftar Kelahiran')

@section('content')
    <!--Notifikasi-->
    @include('layout.page-alert')

    <section class="section">
        <div class="card">
            <div class="card-body">
                <!--Tombol Tambah Kelahiran-->
                <a href="{{ route('kelahiran.create') }}" class="btn btn-primary mb-2">Tambah Data Kelahiran</a>

                <!--Tabel-->
                <table class="table table-striped" id="table1">
                    <!--Head-->
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Keluarga</th>
                            {{-- <th>Pukul</th> --}}
                            {{-- <th>Ayah</th>
                            <th>Ibu</th> --}}
                        </tr>
                    </thead>

                    <!--Body-->
                    <tbody>
                        @forelse ($daftarKelahiran as $kelahiran)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kelahiran->nama }}</td>
                                <td>
                                    {{-- {{ $kelahiran->tempat_lahir }}, --}}
                                    {{ \Carbon\Carbon::parse($kelahiran->tanggal_lahir)->translatedFormat('d F Y') }}
                                </td>
                                <td>
                                    @if ($kelahiran->jenis_kelamin == 'laki-laki')
                                        <span class="badge bg-light-info">Laki-Laki</span>
                                    @elseif ($kelahiran->jenis_kelamin == 'perempuan')
                                        <span class="badge bg-light-danger">Perempuan</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $kelahiran->keluarga }}
                                </td>
                                {{-- <td>
                                    {{ \Carbon\Carbon::createFromFormat('H:i:s', $kelahiran->jam_lahir)->format('h:i A') }}
                                </td> --}}
                                {{-- <td>
                                    {{ $kelahiran->nama_ayah }}
                                </td>
                                <td>
                                    {{ $kelahiran->nama_ibu }}
                                </td> --}}
                                @can('super-user')
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Aksi
                                            </button>
                                            <div class="dropdown-menu">
                                                <!--Tombol Update-->
                                                <a href="{{ route('kelahiran.edit', $kelahiran->id) }}" class="dropdown-item">
                                                    <i class="bi bi-pen"></i> Edit
                                                </a>

                                                <!--Tombol Hapus-->
                                                <form action="{{ route('kelahiran.destroy', $kelahiran->id) }}" method="POST">
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
