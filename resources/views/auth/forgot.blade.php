@extends('layout.auth')

@section('title', 'Lupa Password')

@section('content')
    <h1 class="auth-title">Lupa Password</h1>
    <p class="auth-subtitle mb-5">Masukkan email Anda dan kami akan mengirimkan tautan untuk mengatur ulang kata sandi.</p>

    <form action="index.html">
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="email" class="form-control form-control-xl" placeholder="Email">
            <div class="form-control-icon">
                <i class="bi bi-envelope"></i>
            </div>
        </div>
        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Submit</button>
    </form>
    <div class="text-center mt-5 text-lg fs-4">
        <p class='text-gray-600'>Ingat akun Anda? <a href="{{ route('login') }}" class="font-bold">Log in</a>.
        </p>
    </div>
@endsection
