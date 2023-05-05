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
            <a href="/booking_hotel" class="btn ms-3">Hotel</a>
            <a href="#" class="btn btn-light ms-2 disabled " aria-disabled="true">Pesawat</a>
        </div>
        <div class="booking-pesawat">
            <form action="" class="form-inline">
            <div class="bgback p-3 pb-3 m-3 rounded-2 d-flex">
                <div class="column col-md-4 px-3">
                    <div>
                        <input type="date" class="form-control" id="tanggalbooking">
                    </div>
                </div>

                <div class="column col-md-3 px-3 d-flex justify-content-center">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle dropdown-menu-end" style="width: 300px; border:none; color:black;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Kota Asal
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            @foreach ($produk->unique('kota_asal') as $p)
                            <li><a class="dropdown-item" href="#">{{ $p->kota_asal }}</a></li>
                            @endforeach
                        </ul>
                        </div>
                </div>
                <div class="column col-md-3 px-3 d-flex justify-content-center">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle dropdown-menu-end" style="width: 300px; border:none; color:black;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Kota Tujuan
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            @foreach ($produk->unique('kota_tiba') as $p)
                            <li><a class="dropdown-item" href="#">{{ $p->kota_tiba }}</a></li>
                            @endforeach
                        </ul>
                        </div>
                </div>
                <div class="column col-md-2 px-3 d-flex justify-content-center">
                    <a href="/pesawat_search" class="btn btn-outline-secondary" style="width: 200px; border:none; color:black;" type="button" id="button-addon2">Cari Penerbangan <i class="fas fa-search"></i></a>
                </div>
            </div>
            </form>
            <footer class="bg-light mt-5 py-5 fixed-bottom">
                <div class="container d-flex flex-row">
                  <div class="col-md-6">
                    <h2 style="color: #e78bbb;">Partner Pesawat</h2>
                    <p class="mb-0">Kami bekerja sama dengan berbagai maskapai di Indonesia</p>
                    <p class="mt-0 mb-0">untuk menerbangkan anda ke mana pun Anda inginkan!</p>
                  </div>
                  <div class="col-md-6">

                  </div>
                </div>
              </footer>
                {{-- <div class="bgback p-3 pb-3 m-3 rounded-2 text-white d-flex justify-content-center">
                <table class="table bg-light table-custom text-center" style="width: 75%;">
                    <thead>
                        <tr>
                        <th scope="col" colspan="2">Maskapai</th>
                        <th scope="col">Berangkat</th>
                        <th scope="col"></th>
                        <th scope="col">Tiba</th>

                        <th scope="col">Harga Per Orang</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $p)
                        @php
                            $berangkat = \Carbon\Carbon::parse($p->berangkat);
                            $tiba = \Carbon\Carbon::parse($p->tiba);
                            $durasi = $berangkat->diffInMinutes($tiba);
                            $jam = intdiv($durasi, 60);
                            $menit = $durasi % 60;
                        @endphp
                        <tr>
                        <td class="text-center" style="vertical-align: middle;padding: 25px">
                            <p>foto</p>
                        </td>
                        <td class="text-center" style="vertical-align: middle;padding: 25px">
                            <div class="d-flex flex-column align-items-center">
                                <span class="text-start fw-bold">{{ $p->produk }}</span>
                                <small class="fst-italic text-muted">{{ $p->desk }}</small>
                            </div>
                        </td>
                        <td class="text-center" style="vertical-align: middle;padding: 25px">
                            <div class="d-flex flex-column align-items-center">
                                <span style="font-size: 16pt">{{ \Carbon\Carbon::parse($p->berangkat)->format('H:i') }}</span>
                                <small>{{ $p->asal }}</small>
                            </div>
                        </td>
                        <td class="text-center" style="vertical-align: middle;padding: 25px">
                            <div class="d-flex flex-column align-items-center">
                                <span><i class="fas fa-plane"></i></span>
                                <small class="text-muted" style="font-size: 8pt">{{ $jam }}j {{ $menit }}mnt</small>
                            </div>
                        </td>
                        <td class="text-center" style="vertical-align: middle;padding: 25px">
                            <div class="d-flex flex-column align-items-center">
                                <span style="font-size: 16pt">{{ \Carbon\Carbon::parse($p->tiba)->format('H:i')}}</span>
                                <small>{{ $p->tujuan }}</small>
                            </div>
                        </td>
                        <td class="text-center" style="vertical-align: middle;padding: 25px">
                            <div class="d-flex flex-column align-items-end">
                                <span class="fw-bold fs-5 mb-2">Rp.{{ number_format($p->harga)}}/orng</span>
                                <div class="but plane btn-group" style="width: 150px;">
                                    <a href="#" class="btn3 btn btn-sm">Booking</a>
                                </div>
                            </div>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
            </div> --}}

        </div>
    </div>
@endsection
