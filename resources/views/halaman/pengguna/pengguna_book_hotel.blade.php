@extends('layout/app')

@section('content')
    <div class="saldo-anda bgback m-3 p-3 text-white rounded-2 text-center">
        <h4>Saldo Anda</h4>
        <h2>Rp1.000.000,00</h2>
    </div>
    <div class="column">
        <div class="d-flex justify-content-start">
            <a href="#" class="btn btn-light ms-3 disabled" aria-disabled="true">Hotel</a>
            <a href="/pengguna_book_plane" class="btn ms-2">Pesawat</a>
        </div>
        <div class="booking-hotel">
            <div class="bgback p-3 pb-3 m-3 rounded-2">
                <div class="bookingHotelMenu d-flex justify-content-evenly">
                    <div class="btn-group">
                        <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Nama Hotel
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Hotel Grand Sawit</a></li>
                            <li><a class="dropdown-item" href="#">Hotel Grand Victoria</a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Jumlah Kamar
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">1</a></li>
                            <li><a class="dropdown-item" href="#">2</a></li>
                            <li><a class="dropdown-item" href="#">3</a></li>
                        </ul>
                    </div>
                    <div>
                        <input type="date" class="form-control" id="tanggalbooking">
                    </div>
                </div>
                <div class="text-center pt-5">
                    <button type="submit" class="btn btn-outline-light">Booking</button>
                </div>
            </div>
            
        </div>
    </div>  
@endsection