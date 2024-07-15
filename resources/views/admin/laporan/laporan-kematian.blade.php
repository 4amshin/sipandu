<div class="card-body">
    <!--Tabel-->
    <table class="table table-striped" id="table1">
        <!--Head-->
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIK</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Tanggal Kematian</th>
                <th>Pukul</th>
                <th>Ayah</th>
                <th>Ibu</th>
            </tr>
        </thead>

        <!--Body-->
        <tbody>
            @forelse ($daftarKematian as $kematian)
                <tr>
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
                </tr>
            @empty
                Data Kosong
            @endforelse
        </tbody>
    </table>

    <!--Tombol Cetak-->
    <a href="" class="btn btn-primary mb-2">Cetak</a>
</div>
