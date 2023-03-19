@extends('layout/app')

@section('content')
    <div id="table -pengguna" class="p-5 table">

        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <h4 class="data-pengguna">Data Pengguna</h4>
        <a href="/form_tambah_pengguna" class="btn btn-a btn-outline-light my-2">Tambah</a>
        <table class="table table-bordered table-light">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Pengguna</th>
                <th scope="col">username</th>
                <th scope="col">password</th>
                <th scope="col">Uang Elektronik</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Shinta Adelia</td>
                <td>sshynthah</td>
                <td>1@2#</td>
                <td>Rp10.000</td>
                <td>
                    <span>
                        <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        <a href="#" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                    </span>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Destiera</td>
                <td>dhesty</td>
                <td>1@2#</td>
                <td>Rp10.000</td>
                <td>
                    <span>
                        <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        <a href="#" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                    </span>
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Putri Oktatriani</td>
                <td>phoetry</td>
                <td>1@2#</td>
                <td>Rp10.000</td>
                <td>
                    <span>
                        <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        <a href="#" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                    </span>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection