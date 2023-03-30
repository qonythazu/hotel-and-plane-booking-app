
@extends('layout/app')

@section('content')
    <div class="col-md-10 p-5 pt-5 dasboard">
        <h3>Booking App Account</h3><hr>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="/form_tambah_pengguna" class="btn btn-outline-light ms-1 mb-2">Akun baru <i class="fas fa-plus"></i></a>
        </div>
        <table class="table table-striped table-hover table-light ">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Pengguna</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Saldo</th>
                <th scope="col" colspan="2" class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $d => $item)
            <tr>
                <th scope="row">{{ $d+1 }}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->role }}</td>
                <td>{{ $item->saldo_akhir }}</td>
                <td>
                    <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                </td>
                <td>
                    <a href="#" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>   
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <a href="/dashboard_admin" class="btn btn-outline-light ms-1">kembali</a>
    </div>
@endsection
    