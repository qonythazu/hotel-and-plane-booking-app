
@extends('layout.app')
@section("content")
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <livewire:wizard :data="$data"/>
            </div>
        </div>
    </div>
    {{-- <div class="col text-dark">
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
@endsection



