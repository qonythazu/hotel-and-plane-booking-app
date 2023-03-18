@extends('layout/app')

@section('content')
    <div class="formpengguna p-5">
        <form>
            <h3>Form Tambah Pengguna</h3><hr>
            <div class="mb-3 mt-5">
                <label for="namaPengguna" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="namaPengguna">
            </div>
            <div class="mb-3">
                <label for="inputUsername" class="form-label">Username</label>
                <input type="text" class="form-control" id="inputUsername">
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword">
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirmPassword">
            </div>
            <button type="submit" class="btn btn-primary">Tambah Pengguna</button>
        </form>
    </div>
@endsection