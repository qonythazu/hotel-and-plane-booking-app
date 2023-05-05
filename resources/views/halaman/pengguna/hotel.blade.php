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
        <div class="booking-hotel">
            <div class="bgback p-3 pb-3 m-3 rounded-2 d-flex">

            </div>
            <div class="bgback p-3 pb-3 m-3 rounded-2">
                <div class="column">
                    <div class="row">
                        @foreach ( $produk as $p )
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <img src="img/hotel.png" width="635px" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $p->nama_produk }}</h5>
                                    <p class="card-text">{{ $p->deskripsi }}</p>
                                    <div class="but btn-group">
                                        <a href="{{ route('booking.detail',$p->id) }}" class="btn3 btn btn-sm">Booking</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
