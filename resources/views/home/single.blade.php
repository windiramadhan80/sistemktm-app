@extends('home.templates.main')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div>
                    <button id="download" class="btn btn-outline-primary mb-2">Download jpg</button>
                </div>
                <div class="card text-bg-light shadow-sm" style="max-width: 690px" id="ktm">
                    <img src="/img/background-ktm-new.jpg" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <div class="row mt-2">
                            <div class="col-3 text-end mb-4">
                                <img src="/img/logo-cwe.png" alt="" width="130px">
                            </div>
                            <div class="col">
                                <h5 class="card-title text-uppercase fw-bold fs-3">politeknik kelapa sawit <br> citra widya
                                    edukasi</h5>
                                <p class="card-text">Jl. Gapura No. 8 Cibuntu Cibitung Bekasi Jawa Barat</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-9">
                                <table class="table table-sm table-borderless fw-bold ms-3">
                                    <tbody>
                                        <tr>
                                            <td class="pe-0">Nama Lengkap</td>
                                            <td>:</td>
                                            <td>{{ $mhs->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="pe-0">Tempat & Tgl. Lahir</td>
                                            <td>:</td>
                                            <td>{{ $mhs->tempat_lahir }},
                                                {{ $mhs->tanggal_lahir }} {{ $mhs->bulan_lahir }}
                                                {{ $mhs->tahun_lahir }}</td>
                                        </tr>
                                        <tr>
                                            <td class="pe-0">Jenis Kelamin</td>
                                            <td>:</td>
                                            <td>{{ $mhs->jenis_kelamin }}</td>
                                        </tr>
                                        <tr>
                                            <td class="pe-0">Program Studi</td>
                                            <td>:</td>
                                            <td>{{ $mhs->program_studi }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col">
                                <img src="{{ asset('storage/' . $mhs->image) }}" class="rounded d-block mx-auto "
                                    width="100px" alt="...">
                                <p class="text-center mt-1 fw-bold">NIM. {{ $mhs->nim }}</p>
                            </div>
                        </div>
                        <p class="card-text ms-3"><span class="text-capitalize fw-bold">masa berlaku</span><br>

                            {{ $data }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
