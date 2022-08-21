@extends('home.templates.main')

@section('content')
    <main class="container w-80 mx-auto my-4">
        <h1 class="h4 mb-3 text-center fw-normal">Edit Profile</h1>
        <form action="/edit/{{ $mhs->id }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="form-floating text-start">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" placeholder="Email" value="{{ $mhs->email }}" readonly>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating text-start">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="name" placeholder="Nama Lengkap" value="{{ $mhs->name }}" autofocus>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label for="name">Nama Lengkap</label>
                    </div>
                    <div class="form-floating text-start">
                        <input type="text" name="tempat_lahir"
                            class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir"
                            placeholder="Tempat Lahir" value="{{ $mhs->tempat_lahir }}">
                        @error('tempat_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <div class="row">
                            <div class="col-lg">

                                <select class="form-select @error('tanggal_lahir') is-invalid @enderror"
                                    name="tanggal_lahir" id="tanggal_lahir">
                                    <option value="" selected>Tanggal</option>
                                    @for ($h = 1; $h <= 31; $h++)
                                        <option value="{{ $h }}"
                                            {{ $mhs->tanggal_lahir == $h ? 'selected' : '' }}>{{ $h }}
                                        </option>
                                    @endfor
                                </select>
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg">
                                <select class="form-select @error('bulan_lahir') is-invalid @enderror" name="bulan_lahir"
                                    id="bulan_lahir">
                                    <option value="">Bulan</option>
                                    @for ($b = 0; $b < 12; $b++)
                                        @php
                                            $nama_bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                        @endphp
                                        <option value="{{ $nama_bulan[$b] }}"
                                            {{ $mhs->bulan_lahir == $nama_bulan[$b] ? 'selected' : '' }}>
                                            {{ $nama_bulan[$b] }}</option>
                                    @endfor
                                </select>
                                @error('bulan_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg">
                                <select class="form-select @error('tahun_lahir') is-invalid @enderror" name="tahun_lahir"
                                    id="tahun_lahir">
                                    <option value="">Tahun</option>
                                    @for ($t = 2022; $t >= 1990; $t--)
                                        <option value="{{ $t }}"
                                            {{ $mhs->tahun_lahir == $t ? 'selected' : '' }}>{{ $t }}</option>
                                    @endfor
                                </select>
                                @error('tahun_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="text-start mt-1">
                        <h6>Jenis Kelamin</h6>
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <div class="form-check">
                                    <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
                                        type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="Laki-Laki"
                                        {{ $mhs->jenis_kelamin == 'Laki-Laki' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="jenis_kelamin1">
                                        Laki-Laki
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="form-check">
                                    <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
                                        type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="Perempuan"
                                        {{ $mhs->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="jenis_kelamin2">
                                        Perempuan
                                    </label>
                                </div>
                            </div>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="text-start mb-1">
                        <select class="form-select @error('program_studi') is-invalid @enderror" name="program_studi"
                            id="program_studi">
                            <option value="" selected>Pilih Program Studi</option>
                            <option value="Teknologi Produksi Tanaman Perkebunan"
                                {{ $mhs->program_studi == 'Teknologi Produksi Tanaman Perkebunan' ? 'selected' : '' }}>
                                Teknologi Produksi Tanaman Perkebunan
                            </option>
                            <option value="Teknologi Pengolahan Hasil Kelapa Sawit"
                                {{ $mhs->program_studi == 'Teknologi Pengolahan Hasil Kelapa Sawit' ? 'selected' : '' }}>
                                Teknologi Pengolahan Hasil Kelapa Sawit
                            </option>
                            <option value="Budidaya Perkebunan Kelapa Sawit"
                                {{ $mhs->program_studi == 'Budidaya Perkebunan Kelapa Sawit' ? 'selected' : '' }}>Budidaya
                                Perkebunan Kelapa Sawit</option>
                            <option value="Manajemen Logistik"
                                {{ $mhs->program_studi == 'Manajemen Logistik' ? 'selected' : '' }}>Manajemen Logistik
                            </option>

                        </select>
                        @error('program_studi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="text-start mb-2">
                        <h6>Photos</h6>
                        <img src="{{ asset('storage/' . $mhs->image) }}" class="img-preview img-thumbnail img-fluid mb-1"
                            width="80px">
                        <div class="input-group mb-1">
                            <input type="hidden" name="oldImage" value="{{ $mhs->image }}">
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                                id="image" onchange=previewImage()>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="form-floating text-start">
                        <input type="number" name="nim" class="form-control @error('nim') is-invalid @enderror"
                            id="nim" placeholder="Nama Lengkap" value="{{ $mhs->nim }}">
                        @error('nim')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label for="nim">Nomor Induk Mahasiswa</label>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-1">
                <div class="col-lg-10">
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Update Profile</button>
                </div>
            </div>

        </form>
        <p class="text-center mt-5"><a class="mb-5 text-decoration-none" href="/profile/{{ $mhs->id }}"><i
                    class="fa-solid fa-arrow-left"></i>
                Kembali</a></p>
        <p class="mb-3 text-muted text-center">&copy; Politeknik Citra Widya Edukasi {{ date('Y') }}</p>
    </main>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
