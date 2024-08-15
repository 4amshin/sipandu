@extends('layout.app')

@section('title', 'Beranda')

@section('header', 'Beranda')

@section('content')
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                @php
                    $boxes = [
                        [
                            'color' => 'purple',
                            'icon' => 'bi-people-fill',
                            'title' => 'Penduduk',
                            'count' => $jumlahPenduduk,
                            'route' => route('penduduk.index'),
                        ],
                        [
                            'color' => 'blue',
                            'icon' => 'bi-person-vcard',
                            'title' => 'Kartu Keluarga',
                            'count' => $jumlahKartuKeluarga,
                            'route' => route('penduduk.index'), // Sesuaikan dengan route yang benar
                        ],
                        [
                            'color' => 'green',
                            'icon' => 'bi-hearts',
                            'title' => 'Kelahiran',
                            'count' => $jumlahKelahiran,
                            'route' => route('kelahiran.index'),
                        ],
                        [
                            'color' => 'red',
                            'icon' => 'bi-file-earmark-excel-fill',
                            'title' => 'Kematian',
                            'count' => $jumlahKematian,
                            'route' => route('kematian.index'),
                        ],
                        [
                            'color' => 'yellow',
                            'icon' => 'bi-person-fill-add',
                            'title' => 'Pendatang',
                            'count' => $jumlahPendatang,
                            'route' => route('pendatang.index'),
                        ],
                        [
                            'color' => 'orange',
                            'icon' => 'bi-briefcase-fill',
                            'title' => 'Pindahan',
                            'count' => $jumlahPindahan,
                            'route' => route('pindahan.index'),
                        ],
                    ];
                @endphp

                @foreach ($boxes as $box)
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <a href="{{ $box['route'] }}" class="stretched-link text-decoration-none">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="stats-icon {{ $box['color'] }} mb-2">
                                                <i class="{{ $box['icon'] }}"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">{{ $box['title'] }}</h6>
                                            <h6 class="font-extrabold mb-0">{{ $box['count'] }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
