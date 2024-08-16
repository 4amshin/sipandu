@extends('layout.app')

@section('title', 'Penduduk')

@section('header', 'Daftar Penduduk')

@section('content')
    <!--Notifikasi-->
    @include('layout.page-alert')

    <section class="section">
        <div class="card">
            <div class="card-body">
                <!--Tombol Tambah Penduduk-->
                <a href="{{ route('penduduk.create') }}" class="btn btn-primary mb-2">Tambah Data Penduduk</a>

                <!--Tabel-->
                <table class="table table-striped" id="table1">
                    <!--Head-->
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No KK</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>TTL</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Agama</th>
                            <th>Status Pernikahan</th>
                            <th>Pendidikan</th>
                            <th>Pekerjaan</th>
                            <th>Ayah & Ibu</th>
                        </tr>
                    </thead>

                    <!--Body-->
                    <tbody>
                        @forelse ($daftarPenduduk as $penduduk)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $penduduk->no_kk }}</td>
                                <td>{{ $penduduk->nik }}</td>
                                <td>{{ $penduduk->nama }}</td>
                                <td>
                                    {{ $penduduk->tempat_lahir }},
                                    {{ \Carbon\Carbon::parse($penduduk->tanggal_lahir)->translatedFormat('d F Y') }}
                                </td>
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
                                <td>{{ $penduduk->agama }}</td>
                                <td>{{ ucwords(str_replace('_', ' ', $penduduk->status_pernikahan)) }}</td>
                                <td>{{ $penduduk->pendidikan }}</td>
                                <td>{{ $penduduk->pekerjaan }}</td>
                                <td>{{ $penduduk->nama_ayah . ' / ' . $penduduk->nama_ibu }}</td>

                                <!--Tombol Aksi--->
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

                                                <!-- Tombol Tandai Meninggal -->
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#inputKematianModal" data-id="{{ $penduduk->id }}">
                                                    <i class="bi bi-bookmark-x"></i> Tandai Meninggal
                                                </a>

                                                <!-- Tombol Tandai Pindah -->
                                                <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#modalPindah" data-id="{{ $penduduk->id }}">
                                                    <i class="bi bi-door-open"></i> Tandai Pindah
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
    <!-- Modal Input Data Kematian -->
    @include('admin.penduduk.modal_input_kematian')

    <!-- Modal Tandai Pindah -->
    @include('admin.penduduk.modal_pindahan')
@endsection

@push('customJs')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Script Modal Tandai Meninggal
            var exampleModal = document.getElementById('inputKematianModal');
            exampleModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget; // Tombol yang memicu modal
                var pendudukId = button.getAttribute('data-id'); // Ambil ID penduduk dari atribut data-id

                // Update action URL di form modal dengan ID penduduk
                var form = exampleModal.querySelector('form');
                var action = form.getAttribute('action').replace(':id', pendudukId);
                form.setAttribute('action', action);
            });


            // Script Modal Tandai Pindah
            var modalPindah = document.getElementById('modalPindah');
            modalPindah.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget; // Tombol yang memicu modal
                var pendudukId = button.getAttribute('data-id'); // Ambil ID penduduk dari atribut data-id

                // Update action URL di form modal dengan ID penduduk
                var form = modalPindah.querySelector('form');
                var action = form.getAttribute('action').replace(':id', pendudukId);
                form.setAttribute('action', action);
            });
        });
    </script>
@endpush
