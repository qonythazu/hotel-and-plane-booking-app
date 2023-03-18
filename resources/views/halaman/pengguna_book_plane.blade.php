@extends('layout/app')

@section('content')
    <div class="saldo-anda bg-secondary m-3 p-3 text-white rounded-2 text-center">
        <h4>Saldo Anda</h4>
        <h2>Rp1.000.000,00</h2>
    </div>
    <div class="column">
        <div class="d-flex justify-content-start">
            <a href="pengguna_book_hotel.html" class="btn btn-primary ms-3">Hotel</a>
            <a href="#" class="btn btn-primary ms-2 disabled" aria-disabled="true">Pesawat</a>
        </div>
        <div class="booking-pesawat">
            <div class="bg-secondary p-3 pb-3 m-3 rounded-2">
                <div>
                    <input type="date" class="form-control" id="tanggalbooking">
                </div>
                <div class="text-center pt-5">
                    <button type="submit" class="btn btn-outline-light">Cari Tiket <i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
            <div class="bg-secondary p-3 pb-3 m-3 rounded-2 text-white">
                <h5>Hasil Pencarian</h5>
                <div class="column">
                    <div class="bg-light text-dark p-3 mb-2 rounded-2">
                        <h5>Pesawat Lion</h5>
                        <div class="d-flex">
                            <div class="bg-secondary text-white p-2 rounded-1 me-2">
                                <p>Berangkat pukul 12.00</p>
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Jumlah Penumpang
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">1</a></li>
                                    <li><a class="dropdown-item" href="#">2</a></li>
                                    <li><a class="dropdown-item" href="#">3</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="pt-5">
                            <button type="submit" class="btn btn-outline-secondary">Booking</i></button>
                        </div>
                    </div>
                    <div class="bg-light text-dark p-3 mb-2 rounded-2">
                        <h5>Pesawat Lion</h5>
                        <div class="d-flex">
                            <div class="bg-secondary text-white p-2 rounded-1 me-2">
                                <p>Berangkat pukul 15.00</p>
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Jumlah Penumpang
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">1</a></li>
                                    <li><a class="dropdown-item" href="#">2</a></li>
                                    <li><a class="dropdown-item" href="#">3</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="pt-5">
                            <button type="submit" class="btn btn-outline-secondary">Booking</i></button>
                        </div>
                    </div>
                    <div class="bg-light text-dark p-3 mb-2 rounded-2">
                        <h5>Pesawat Lion</h5>
                        <div class="d-flex">
                            <div class="bg-secondary text-white p-2 rounded-1 me-2">
                                <p>Berangkat pukul 21.00</p>
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Jumlah Penumpang
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">1</a></li>
                                    <li><a class="dropdown-item" href="#">2</a></li>
                                    <li><a class="dropdown-item" href="#">3</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="pt-5">
                            <button type="submit" class="btn btn-outline-secondary">Booking</i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
@endsection