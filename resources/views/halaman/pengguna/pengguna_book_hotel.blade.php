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
            <a href="#" class="btn btn-light ms-3 disabled" aria-disabled="true">Hotel</a>
            <a href="/booking_pesawat" class="btn ms-2">Pesawat</a>
        </div>
        <div class="booking-hotel">
            <form action="/hotel" class="form-inline">
                <div class="bgback p-3 pb-3 m-3 rounded-2 d-flex align-items-end">
                    <div class="column col-md-7 px-3">
                        <h5 class="text-light">Tanggal</h5>
                        <div>
                            <input type="date" class="form-control" name="check_in" id="tanggalbooking">
                        </div>
                    </div>
                    <div class="column col-md-3 px-3 d-flex justify-content-center flex-column">
                        <h5 class="text-light">Kota</h5>
                        <div class="dropdown" style="width: 345px; border:none; color:black;">
                            <select class="form-select" aria-label="Default select example" name="deskripsi">
                                <option> </option>
                                @foreach ($produk->unique('deskripsi') as $p)
                                    @if($p['deskripsi']>1)
                                        @if (old('deskripsi') == $p->deskripsi)
                                            <option value="{{ $p->deskripsi }}" selected> {{ $p->deskripsi }} </option>
                                        @else
                                            <option value="{{ $p->deskripsi }}"> {{ $p->deskripsi }} </option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="column col-md-2 px-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-secondary" style="width: 200px; border:none; color:black;" id="button-addon2">Cari Penginapan <i class="fas fa-search"></i></button>
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
        </div>
    </div>
@endsection
