@extends('layout/app')

@section('content')
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand text text-white" href="#"><h4>Booking App</h4></a>
            <form class="d-flex" role="search">
                <button class="btn btn-outline-light" type="submit">Admin</button>
            </form>
        </div>
    </nav>
    <div id="table-pengguna" class="p-5 table">
        <h4 class="data-pengguna">Data Pengguna</h4>
        <a href="form_tambah_pengguna.html" class="btn btn-a btn-outline-light my-2">Tambah</a>
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