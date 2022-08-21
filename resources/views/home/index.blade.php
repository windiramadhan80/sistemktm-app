@extends('home.templates.main')

@section('content')
    <div class="container">
        <h3 class="text-center mt-4">Daftar Mahasiswa</h3>
        <div class="row justify-content-center my-3">
            <div class="col-lg-6">
                <form action="/">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Pencarian" name="search" value="{{ request('search') }}">
                        <button class="btn btn-outline-primary" type="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Program Studi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $index => $u)
                            <tr>
                                <th scope="row">{{ $index + $user->firstItem() }}</th>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->nim }}</td>
                                <td>{{ $u->program_studi }}</td>
                                <td><a href="mahasiswa/{{ $u->id }}" class="badge bg-info"><i
                                            class="fa-solid fa-eye"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {{ $user->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection
