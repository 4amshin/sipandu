<div class="card-body">
    <!--Tabel-->
    <table class="table table-striped" id="table1">
        <!--Head-->
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIK</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Pindah</th>
                <th>Alasan</th>
            </tr>
        </thead>

        <!--Body-->
        <tbody>
            @forelse ($daftarPindahan as $pindahan)
                <tr>
                    <td>{{ $pindahan->nama }}</td>
                    <td>{{ $pindahan->nik }}</td>
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
                        {{ $pindahan->alasan }}
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
