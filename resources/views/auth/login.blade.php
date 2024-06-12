@extends('layout.auth')

@section('title', 'Login')

@section('content')
    <!--Title-->
    <h1 class="auth-title">SIPANDU</h1>
    <p class="auth-subtitle mb-5">Sistem Pendataan Penduduk Desa Padang Kalua</p>

    <!--Form-->
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <!--Email-->
        <div class="form-group position-relative has-icon-left mb-4">
            <!--Input-->
            <input type="text" name="email" class="form-control form-control-xl @error('email') is-invalid @enderror"
                placeholder="Email">

            <!--Icon-->
            <div class="form-control-icon">
                <i class="bi bi-envelope"></i>
            </div>

            <!--Pesan Eror-->
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!--Password-->
        <div class="form-group position-relative has-icon-left mb-4">
            <!--Input-->
            <input type="password" name="password"
                class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Password">

            <!--Icon-->
            <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
            </div>

            <!--Pesan Eror-->
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!--Tombol Login-->
        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
    </form>

    <!--Link Lupa Password-->
    <div class="text-center mt-5 text-lg fs-4">
        <p>
            <a class="font-bold" href="{{ route('password.request') }}">Lupa Password?</a>
        </p>
    </div>
@endsection

@push('customJs')
    <script src="{{ asset('assets/custom.js') }}"></script>
@endpush
