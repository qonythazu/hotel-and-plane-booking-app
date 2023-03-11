@extends('layout/app')

@section('content')
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand text text-white" href="#"><h4>Booking App</h4></a>
            <form class="d-flex" role="search">
                <button class="btn btn-outline-light">Mitra1</button>
            </form>
        </div>
    </nav>
    <div class="saldo-anda bg-secondary m-3 p-3 text-white rounded-2 text-center">
        <h4>Saldo Anda</h4>
        <h2>Rp1.000.000,00</h2>
    </div>
    <div id="table-pengguna" class="p-5">
        <h4>Data Produk</h4>
        <a href="form_tambah_produk.html" class="btn btn-primary my-2">Tambah</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Tipe</th>
                <th scope="col">Stok</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Grand Sawit</td>
                <td>Hotel</td>
                <td>
                    <div class="d-flex justify-content-between">
                        <p>20</p>
                        <a href="#" class="btn btn-light text-success"><i class="fa-solid fa-pencil"></i></a>
                    </div>
                </td>
                <td>
                    <span>
                        <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        <a href="#" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                    </span>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Lion Air</td>
                <td>Pesawat</td>
                <td>
                    <div class="d-flex justify-content-between">
                        <p>20</p>
                        <a href="#" class="btn btn-light text-success"><i class="fa-solid fa-pencil"></i></a>
                    </div>
                </td>
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