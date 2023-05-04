{{-- @dd($data) --}}
@extends('layout/app')

@section('content')
<div class="column">
    <div class="booking-hotel bg-light p-3 m-3 rounded-2">

    </div>
</div>
@endsection

{{-- <div class="col text-light">
    <h3>Hasil Pencarian</h3>
    <p>Hotel Pasifica | Samarinda</p>
    <p>Fasilitas : AC, Kamar Mandi Dalam, Wifi</p>
    <p>Jumlah: orng (dropdown gitu)</p>
    <p>total harga</p>
    <p>tombol booking</p>
    <ul>
        @foreach ($data as $d )
        <li>{{ $d->produk->nama_produk }}</li>
        <li>{{ $d->produk->deskripsi }}</li>
        <li>{{ $d->produk->jumlah }}</li>
        <li>Rp. {{ number_format($d->harga) }}</li>
        @endforeach
    </ul>
</div> --}}

