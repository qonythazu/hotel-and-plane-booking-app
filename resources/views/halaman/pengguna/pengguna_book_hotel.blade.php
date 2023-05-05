@extends('layout/app')

@section('content')
    <div class="saldo-anda bgback m-3 p-3 text-white rounded-2 text-center">
        <h4>Saldo Anda</h4>
        @foreach ($data as $d)
        @if ($d->id == Auth::user()->id)
        <h2> Rp. {{number_format($d->transaksi->saldo_akhir,2,',','.')}}</h2>
        @endif
        @endforeach
    </div>
    <div class="column">
        <div class="d-flex justify-content-start">
            <a href="#" class="btn btn-light ms-3 disabled" aria-disabled="true">Hotel</a>
            <a href="/booking_pesawat" class="btn ms-2">Pesawat</a>
        </div>
        <div class="booking-hotel">
            <form action="" class="form-inline">
                <div class="bgback p-3 pb-3 m-3 rounded-2 d-flex">
                    <div class="column col-md-7 px-3">
                        <div>
                            <input type="date" class="form-control" id="tanggalbooking">
                        </div>
                    </div>

                    <div class="column col-md-3 px-3 d-flex justify-content-center">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle dropdown-menu-end" style="width: 300px; border:none; color:black;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Kota
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                @foreach ($produk->unique('deskripsi') as $p)
                                <li><a class="dropdown-item" href="#">{{ $p->deskripsi }}</a></li>
                                @endforeach
                            </ul>
                            </div>
                    </div>
                    <div class="column col-md-2 px-3 d-flex justify-content-center">
                        <a href="/hotel_search" class="btn btn-outline-secondary" style="width: 200px; border:none; color:black;" type="button" id="button-addon2">Cari Penginapan <i class="fas fa-search"></i></a>
                    </div>
                </div>
                </form>
                <footer class="bg-light mt-5 py-5 fixed-bottom">
                    <div class="container d-flex flex-row">
                      <div class="col-md-6">
                        <h2 style="color: #e78bbb;">Partner Hotel</h2>
                        <p class="mb-0">Pengalaman menginap yang tak terlupakan</p>
                        <p class="mt-0 mb-0">kami siap memberikan kenyamanan</p>
                        <p class="mt-0">Dimana pun Kapan pun!</p>
                      </div>
                      <div class="col-md-6">

                      </div>
                    </div>
                  </footer>
            {{-- <div class="bgback p-3 pb-3 m-3 rounded-2">
                <div class="column">
                    <div class="row">
                        @foreach ( $produk as $p )
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <img src="img/hotel.png" width="635px" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $p->produk }}</h5>
                                    <p class="card-text">{{ $p->desk }}</p>
                                    <div class="but btn-group">
                                        <a href="#" class="btn3 btn btn-sm">Booking</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
