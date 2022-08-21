@extends('user.templates.main')

@section('content')
    <main class="form-signin w-100 m-auto">
        <h1 class="h4 mb-3 fw-normal">Please Login</h1>
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::has('failed'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('failed') }}
            </div>
        @endif
        <form action="/login" method="post">
            @csrf
            <div class="form-floating text-start">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    placeholder="Email" autofocus required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="Email">Email</label>
            </div>
            <div class="form-floating text-start">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password" placeholder="Password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="Password">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
        </form>
        <p class="mt-2 mb-3"><a class="text-decoration-none" href="/register">Belum punya akun? silahkan registrasi</a></p>
        <p><a class="mb-5 text-decoration-none" href="/"><i class="fa-solid fa-arrow-left"></i> Kembali</a></p>
        <p class="mb-3 text-muted">&copy; Politeknik Citra Widya Edukasi {{ date('Y') }}</p>
    </main>
@endsection
