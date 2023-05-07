
@extends('layout/app')

@section('content')
    <div class="col-md-10 p-5 pt-5 dasboard">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif (session()->has('deleted'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('deleted') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <h3>Booking App Account</h3><hr>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="/daftar_akun/create" class="btn btn-outline-light ms-1 mb-2">Akun baru <i class="fas fa-plus"></i></a>
        </div>
        <table class="table table-striped table-hover table-light ">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Pengguna</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col"class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $d => $item)
            <tr>
                <th scope="row">{{ $d+1 }}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->role->role }}</td>
                <td class="text-center">
                    <form action="{{ route('daftar_akun.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="font-size: 1px;" onclick="return confirm('Yakin ingin menghapus data?')"><i data-feather="trash-2"></i></button>
                    </form>
                    <a href="/daftar_akun/{{ $item->slug }}/edit" class="btn btn-success" style="font-size: 1px;"><i data-feather="edit"></i></a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <a href="/dashboard_admin" class="btn btn-outline-light ms-1">kembali</a>
    </div>
@endsection
