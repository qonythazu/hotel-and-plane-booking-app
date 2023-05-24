@extends('layout/app')
@section('content')
    <div class="saldo-anda bgback m-3 p-3 text-white rounded-2 text-center">
        <h4>Saldo Anda</h4>
        @foreach ($data as $d)
            @if ($d->id == Auth::user()->id)
                <h2> Rp. {{$d->transaksi?->saldo_akhir ? number_format($d->transaksi->saldo_akhir,2,',','.') : 0}}</h2>
            @endif
        @endforeach
    </div>
    <div class="column">
        <div class="d-flex justify-content-start">
            <a href="/booking_hotel" class="btn ms-3">Hotel</a>
            <a href="#" class="btn btn-light ms-2 disabled " aria-disabled="true">Pesawat</a>
        </div>
        <div class="booking-pesawat">
            <form action="/pesawat" class="form-inline">
            <div class="bgback p-3 pb-3 m-3 rounded-2 d-flex align-items-end">
                <div class="column col-md-4 px-3">
                    <h5 class="text-light">Tanggal</h5>
                    <div>
                        <input type="date" class="form-control" name="check_in" id="tanggalbooking" required>
                    </div>
                </div>

                <div class="column col-md-3 px-3 d-flex justify-content-center flex-column">
                    <h5 class="text-light">Kota Asal</h5>
                    <div class="dropdown" style="width: 300px; border:none; color:black;">
                        <select class="form-select" aria-label="Default select example" name="kota_asal" required>
                            <option> </option>
                            @foreach ($produk->unique('kota_asal') as $p)
                            <li><a class="dropdown-item" href="#">{{ $p->kota_asal }}</a></li>
                                @if($p['kota_asal']>1)
                                    @if (old('kota_asal') == $p->kota_asal)
                                        <option value="{{ $p->kota_asal }}" selected> {{ $p->kota_asal }} </option>
                                    @else
                                        <option value="{{ $p->kota_asal }}"> {{ $p->kota_asal }} </option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="column col-md-3 px-3 d-flex justify-content-center flex-column">
                    <h5 class="text-light">Tujuan</h5>
                    <div class="dropdown" style="width: 300px; border:none; color:black;">
                        <select class="form-select" aria-label="Default select example" name="kota_tiba" required>
                            <option> </option>
                            @foreach ($produk->unique('kota_tiba') as $p)
                            <li><a class="dropdown-item" href="#">{{ $p->kota_tiba }}</a></li>
                                @if($p['kota_tiba']>1)
                                    @if (old('kota_tiba') == $p->kota_tiba)
                                        <option value="{{ $p->kota_tiba }}" selected> {{ $p->kota_tiba }} </option>
                                    @else
                                        <option value="{{ $p->kota_tiba }}"> {{ $p->kota_tiba }} </option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="column col-md-2 px-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-outline-secondary" style="width: 200px; border:none; color:black;" id="button-addon2">Cari Penerbangan <i class="fas fa-search"></i></button>
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
    </div>
</div>
@endsection
