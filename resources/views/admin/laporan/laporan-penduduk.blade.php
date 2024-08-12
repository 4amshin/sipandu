<div class="card-body">
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

                    <!--Tombol Aksi--->
                    @can('super-user')
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
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

    <!--Tombol Cetak-->
    <a href="{{ route('export.penduduk') }}" class="btn btn-primary mb-2">Cetak</a>
</div>
