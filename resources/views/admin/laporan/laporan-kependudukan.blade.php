@extends('layout.app')

@section('title', 'Laporan')

@section('header', 'Laporan Kependudukan')

@section('content')
    <!--Notifikasi-->
    @include('layout.page-alert')

    <section class="section">
        <div class="card">
            <div class="card-body">

                <!-- Dropdown Pemilihan Bulan dan Tahun -->
                <form action="{{ route('laporan.index') }}" method="GET" class="mb-4">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="bulan" class="form-label">Pilih Bulan</label>
                            <select name="bulan" id="bulan" class="form-select">
                                <option value="">Semua Bulan</option>
                                @foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $key => $bulan)
                                    <option value="{{ $key + 1 }}"
                                        {{ request('bulan') == $key + 1 ? 'selected' : '' }}>
                                        {{ $bulan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="tahun" class="form-label">Pilih Tahun</label>
                            <select name="tahun" id="tahun" class="form-select">
                                <option value="">Semua Tahun</option>
                                @for ($i = date('Y'); $i >= 2000; $i--)
                                    <option value="{{ $i }}" {{ request('tahun') == $i ? 'selected' : '' }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-4 align-self-end">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>


                <table class="table table-striped" id="table1">
                    <!--Head-->
                    <thead>
                        <tr>
                            <th rowspan="2" class="text-center align-middle">NO</th>
                            <th rowspan="2" class="text-center align-middle">Dusun</th>
                            {{-- <th colspan="3" class="text-center">JUMLAH KK</th>
                            <th rowspan="2" class="text-center align-middle">JUMLAH RUMAH</th> --}}
                            <th colspan="3" class="text-center">PENDUDUK AWAL BULAN INI</th>
                            <th colspan="3" class="text-center">LAHIR BULAN INI</th>
                            {{-- <th colspan="3" class="text-center">MENINGGAL BULAN INI</th>
                            <th colspan="3" class="text-center">PENDATANG BULAN INI</th>
                            <th colspan="3" class="text-center">PINDAHAN BULAN INI</th>
                            <th colspan="3" class="text-center">PENDUDUK AKHIR BULAN INI</th>
                            <th rowspan="2" class="text-center align-middle">KET</th> --}}
                        </tr>
                        <tr>
                            <!-- JUMLAH KK -->
                            {{-- <th class="text-center">L</th>
                            <th class="text-center">P</th>
                            <th class="text-center">JMLH</th> --}}

                            <!-- PENDUDUK AWAL BULAN INI -->
                            <th class="text-center">L</th>
                            <th class="text-center">P</th>
                            <th class="text-center">JMLH</th>

                            <!-- LAHIR BULAN INI -->
                            <th class="text-center">L</th>
                            <th class="text-center">P</th>
                            <th class="text-center">JMLH</th>

                            <!-- MENINGGAL BULAN INI -->
                            {{-- <th class="text-center">L</th>
                            <th class="text-center">P</th>
                            <th class="text-center">JMLH</th> --}}

                            <!-- PENDATANG BULAN INI -->
                            {{-- <th class="text-center">L</th>
                            <th class="text-center">P</th>
                            <th class="text-center">JMLH</th> --}}

                            <!-- PINDAHAN BULAN INI -->
                            {{-- <th class="text-center">L</th>
                            <th class="text-center">P</th>
                            <th class="text-center">JMLH</th> --}}

                            <!-- PENDUDUK AKHIR BULAN INI -->
                            {{-- <th class="text-center">L</th>
                            <th class="text-center">P</th>
                            <th class="text-center">JMLH</th> --}}
                        </tr>
                    </thead>

                    <!--Body-->
                    <tbody>
                        @forelse ($dusunList as $dusun)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dusun }}</td>

                                <!-- JUMLAH KK -->
                                {{-- <td>{{ $laporan['jumlahKKLaki']->where('dusun', $dusun)->sum('jumlah') }}</td>
                                <td>{{ $laporan['jumlahKKPerempuan']->where('dusun', $dusun)->sum('jumlah') }}</td>
                                <td>{{ $laporan['jumlahKKLaki']->where('dusun', $dusun)->sum('jumlah') + $laporan['jumlahKKPerempuan']->where('dusun', $dusun)->sum('jumlah') }}
                                </td> --}}

                                <!-- JUMLAH RUMAH -->
                                {{-- <td>{{ $laporan['jumlahRumah']->where('dusun', $dusun)->sum('jumlah') }}</td> --}}

                                <!-- PENDUDUK AWAL BULAN INI -->
                                <td>{{ $laporan['pendudukAwal']->where('dusun', $dusun)->where('jenis_kelamin', 'laki-laki')->sum('jumlah') }}
                                </td>
                                <td>{{ $laporan['pendudukAwal']->where('dusun', $dusun)->where('jenis_kelamin', 'perempuan')->sum('jumlah') }}
                                </td>
                                <td>{{ $laporan['pendudukAwal']->where('dusun', $dusun)->sum('jumlah') }}</td>

                                <!-- LAHIR BULAN INI -->
                                <td>{{ $laporan['lahir']->where('dusun', $dusun)->where('jenis_kelamin', 'laki-laki')->sum('jumlah') }}
                                </td>
                                <td>{{ $laporan['lahir']->where('dusun', $dusun)->where('jenis_kelamin', 'perempuan')->sum('jumlah') }}
                                </td>
                                <td>{{ $laporan['lahir']->where('dusun', $dusun)->sum('jumlah') }}</td>

                                <!-- MENINGGAL BULAN INI -->
                                {{-- <td>{{ $laporan['meninggal']->where('dusun', $dusun)->where('jenis_kelamin', 'laki-laki')->sum('jumlah') }}
                                </td>
                                <td>{{ $laporan['meninggal']->where('dusun', $dusun)->where('jenis_kelamin', 'perempuan')->sum('jumlah') }}
                                </td>
                                <td>{{ $laporan['meninggal']->where('dusun', $dusun)->sum('jumlah') }}</td> --}}

                                <!-- PENDATANG BULAN INI -->
                                {{-- <td>{{ $laporan['pendatang']->where('dusun', $dusun)->where('jenis_kelamin', 'laki-laki')->sum('jumlah') }}
                                </td>
                                <td>{{ $laporan['pendatang']->where('dusun', $dusun)->where('jenis_kelamin', 'perempuan')->sum('jumlah') }}
                                </td>
                                <td>{{ $laporan['pendatang']->where('dusun', $dusun)->sum('jumlah') }}</td> --}}

                                <!-- PINDAHAN BULAN INI -->
                                {{-- <td>{{ $laporan['pindahan']->where('dusun', $dusun)->where('jenis_kelamin', 'laki-laki')->sum('jumlah') }}
                                </td>
                                <td>{{ $laporan['pindahan']->where('dusun', $dusun)->where('jenis_kelamin', 'perempuan')->sum('jumlah') }}
                                </td>
                                <td>{{ $laporan['pindahan']->where('dusun', $dusun)->sum('jumlah') }}</td> --}}

                                <!-- PENDUDUK AKHIR BULAN INI -->
                                {{-- <td>{{ $laporan['pendudukAkhir']->where('dusun', $dusun)->where('jenis_kelamin', 'laki-laki')->sum('jumlah') }}
                                </td>
                                <td>{{ $laporan['pendudukAkhir']->where('dusun', $dusun)->where('jenis_kelamin', 'perempuan')->sum('jumlah') }}
                                </td>
                                <td>{{ $laporan['pendudukAkhir']->where('dusun', $dusun)->sum('jumlah') }}</td> --}}

                                {{-- <td>-</td> <!-- Kolom Keterangan --> --}}
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
