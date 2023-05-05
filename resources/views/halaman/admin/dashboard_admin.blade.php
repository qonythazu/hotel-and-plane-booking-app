
@extends('layout/app')

@section('content')
    <div class="col-md-10 p-5 pt-5 dasboard">
        <h3>DASHBOARD</h3><hr>
        <div class="row text-white dasboard">
            <div class="card bg1 ms-3 mb-3" style="width: 15rem;">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <h4 class="card-title">PENGGUNA</h4>
                    <div class="display-4">11</div>
                    <a href="/tabel_pengguna"><p class="card-text text-white">Lihat Detail <span class="ml-2">>></span></p></a>
                </div>
            </div>
            <div class="card bg2 ms-3 mb-3" style="width: 15rem;">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-user-tie"></i>
                    </div>
                    <h4 class="card-title">MITRA</h4>
                    <div class="display-4">2</div>
                    <a href="/tabel_mitra"><p class="card-text text-white">Lihat Detail <span class="ml-2">>></span></p></a>
                </div>
            </div>
            <div class="card bg3 ms-3 mb-3" style="width: 15rem;">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa-solid fa-hotel"></i>
                    </div>
                    <h4 class="card-title">HOTEL</h4>
                    <div class="display-4">1</div>
                    <a href="/tabel_hotel"><p class="card-text text-white">Lihat Detail <span class="ml-2">>></span></p></a>
                </div>
            </div>
            <div class="card bg4 ms-3 mb-3" style="width: 15rem;">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa-solid fa-plane"></i>
                    </div>
                    <h4 class="card-title">PESAWAT</h4>
                    <div class="display-4">1</div>
                    <a href="/tabel_pesawat"><p class="card-text text-white">Lihat Detail <span class="ml-2">>></span></p></a>
                </div>
            </div>
        </div>
        <a href="/pengaturan_akun" class="btn btn-outline-light ms-1"><i class="fas fa-users-cog"></i> Pengaturan Akun</a>
        <a href="/pengaturan_hotelpesawat" class="btn btn-outline-light ms-1"><i class="fas fa-users-cog"></i> Pengaturan Hotel dan Pesawat</a>
        <a href="/isi_uang_elektronik" class="btn btn-outline-light ms-1">Isi Uang Elektronik</a>
        <a href="/tarik_uang_elektronik" class="btn btn-outline-light ms-1">Tarik Uang Elektronik</a>
        
    </div>
@endsection
    