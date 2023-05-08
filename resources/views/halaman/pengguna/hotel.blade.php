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
            <div class="bgback p-3 pb-3 m-3 text-light rounded-2 d-flex flex-column">
               <p class="pb-0 mb-0"><a href="/booking_hotel" class="text-light"><i data-feather="arrow-left" style="width: 14px; height:14px"></i>&nbsp;kembali</a></p>
               <hr class="pb-0 pt-0 mt-1 mb-3">
                @if(request('check_in') && request('deskripsi'))
                    <p><button class="tgl btn btn-light" disabled>{{ \Carbon\Carbon::parse(request('check_in'))->format('d F Y') }}</button></p>
                    <h5>Hasil Pencarian: <strong>Kota {{ request('deskripsi') }}</strong></h5>
                @elseif(empty(request('check_in')) && !empty(request('deskripsi')))
                    <h5>Hasil Pencarian: <strong>Kota {{ request('deskripsi') }}</strong></h5>
                @elseif(!empty(request('check_in')) && empty(request('deskripsi')))
                    <p><button class="tgl btn btn-light" disabled>{{ \Carbon\Carbon::parse(request('check_in'))->format('d F Y') }}</button></p>
                    <h5>Rekomendasi Hotel: </h5>
                @else
                    <h5>Rekomendasi Hotel: </h5>
                @endif
            </div>
            <div class="bgback p-3 pb-3 m-3 rounded-2">
                <div class="column">
                    <div class="row">
                        @if($produk->count())
                        @foreach ( $produk as $p )
                        <div class="col-md-3 mb-4">
                            <div class="card {{ $p->check_in == \Carbon\Carbon::now()->tz("Asia/Makassar")->format('Y-m-d') ? 'card-disabled' : '' }}">
                                <img src="img/hotel.png" width="635px" class="card-img-top" alt="...">
                                <div class="card-body d-flex flex-column">
                                    <h4 class="card-title d-flex justify-content-between align-items-end">
                                        <div class="col-6 ">{{ $p->produk->nama_produk }}</div>
                                        <div class="col-6 text-end" style="font-size: 8pt;color:#9fa6b2;"><i>Tersedia pada <br> {{ \Carbon\Carbon::parse($p->check_in)->format('d F Y') }}</i></div>
                                    </h4>
                                    <div class="card-text d-flex align-items-center">
                                        <i data-feather="map-pin" style="width: 14px; height:14px"></i>&nbsp;{{ $p->produk->deskripsi }}
                                    </div>
                                    <p class="card-text text-end mt-3 mb-0" style="font-size: 16pt;color:#e673ae;">Rp. {{ number_format($p->harga,2,',','.') }}/<i data-feather="moon" style="width: 14px; height:14px"></i></p>
                                    <div class="but btn-group">
                                        <a href="{{ route('booking.detail',$p->id) }}" class="btn3 btn btn-sm">Booking</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                            <p class="my-5 text-light text-center">Data Tidak Ditemukan.</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
