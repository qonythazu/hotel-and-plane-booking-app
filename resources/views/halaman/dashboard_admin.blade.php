
@extends('layout/app')

@section('content')
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand text text-white" href="#"><h4>Booking App</h4></a>
            <form class="d-flex" role="search">
                <button class="btn btn-outline-light">Admin</button>
            </form>
        </div>
    </nav>
    <div class="col-md-10 p-5 pt-5">
        <h3>DASHBOARD</h3><hr>
        <div class="row text-white">
            <div class="card bg-dark ms-3 mb-3" style="width: 15rem;">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <h4 class="card-title">PENGGUNA</h4>
                    <div class="display-4">11</div>
                    <a href="/tabel_pengguna"><p class="card-text text-white">Lihat Detail <span class="ml-2">>></span></p></a>
                </div>
            </div>
            <div class="card bg-success ms-3 mb-3" style="width: 15rem;">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-user-tie"></i>
                    </div>
                    <h4 class="card-title">MITRA</h4>
                    <div class="display-4">2</div>
                    <a href=""><p class="card-text text-white">Lihat Detail <span class="ml-2">>></span></p></a>
                </div>
            </div>
            <div class="card bg-warning ms-3 mb-3" style="width: 15rem;">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa-solid fa-hotel"></i>
                    </div>
                    <h4 class="card-title">HOTEL</h4>
                    <div class="display-4">1</div>
                    <a href=""><p class="card-text text-white">Lihat Detail <span class="ml-2">>></span></p></a>
                </div>
            </div>
            <div class="card bg-danger ms-3 mb-3" style="width: 15rem;">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa-solid fa-plane"></i>
                    </div>
                    <h4 class="card-title">PESAWAT</h4>
                    <div class="display-4">1</div>
                    <a href=""><p class="card-text text-white">Lihat Detail <span class="ml-2">>></span></p></a>
                </div>
            </div>
        </div>
        <a href="/isi_uang_elektronik" class="btn btn-primary ms-1">Isi Uang Elektronik</a>
        <a href="/tarik_uang_elektronik" class="btn btn-primary ms-1">Tarik Uang Elektronik</a>
    </div>
@endsection
    