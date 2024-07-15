<div class="card-body">
    <!--Tabel-->
    <table class="table table-striped" id="table1">
        <!--Head-->
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIK</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Datang</th>
                <th>Pelapor</th>
            </tr>
        </thead>

        <!--Body-->
        <tbody>
            @forelse ($daftarPendatang as $pendatang)
                <tr>
                    <td>{{ $pendatang->nama }}</td>
                    <td>{{ $pendatang->nik }}</td>
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
                </tr>
            @empty
                Data Kosong
            @endforelse
        </tbody>
    </table>

    <!--Tombol Cetak-->
    <a href="" class="btn btn-primary mb-2">Cetak</a>
</div>
