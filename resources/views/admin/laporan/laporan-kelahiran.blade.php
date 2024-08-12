<div class="card-body">
    <!--Tabel-->
    <table class="table table-striped" id="table1">
        <!--Head-->
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th align="center">Jenis Kelamin</th>
                <th>TTL</th>
                <th>Jam Lahir</th>
                <th>Ayah</th>
                <th>Ibu</th>
            </tr>
        </thead>

        <!--Body-->
        <tbody>
            @forelse ($daftarKelahiran as $kelahiran)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kelahiran->nama }}</td>
                    <td>
                        @if ($kelahiran->jenis_kelamin == 'laki-laki')
                            <span class="badge bg-light-info">Laki-Laki</span>
                        @elseif ($kelahiran->jenis_kelamin == 'perempuan')
                            <span class="badge bg-light-danger">Perempuan</span>
                        @endif
                    </td>
                    <td>
                        {{ $kelahiran->tempat_lahir }},
                        {{ \Carbon\Carbon::parse($kelahiran->tanggal_lahir)->translatedFormat('d F Y') }}
                    </td>
                    <td>
                        {{ \Carbon\Carbon::createFromFormat('H:i:s', $kelahiran->jam_lahir)->format('h:i A') }}
                    </td>
                    <td>
                        {{ $kelahiran->nama_ayah }}
                    </td>
                    <td>
                        {{ $kelahiran->nama_ibu }}
                    </td>
                </tr>
            @empty
                Data Kosong
            @endforelse
        </tbody>
    </table>

    <!--Tombol Cetak-->
    <a href="{{ route('export.kelahiran') }}" class="btn btn-primary mb-2">Cetak</a>
</div>
