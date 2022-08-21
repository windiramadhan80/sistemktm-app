@extends('home.templates.main')

@section('content')
    <div class="container">
        <h3 class="text-center mt-4">My Profile</h3>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div class="card my-3 shadow-sm border border-2" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $mhs->image) }}" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title mb-3">{{ $mhs->name }}</h5>
                                <p class="card-text mb-1">{{ $mhs->email }}</p>
                                <p class="card-text mb-1">{{ $mhs->nim }}</p>
                                <p class="card-text mb-1">{{ $mhs->tempat_lahir }}, {{ $mhs->tanggal_lahir }}
                                    {{ $mhs->bulan_lahir }} {{ $mhs->tahun_lahir }}</p>
                                <p class="card-text mb-1">{{ $mhs->jenis_kelamin }}</p>
                                <p class="card-text mb-0">{{ $mhs->program_studi }}</p>
                                <a href="/edit/{{ $mhs->id }}" class="btn btn-warning mt-3">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
