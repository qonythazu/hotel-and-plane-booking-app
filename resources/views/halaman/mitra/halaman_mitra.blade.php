@extends('layout/app')

@section('content')
    <div class="saldo-anda m-3 p-3 text-white rounded-2 text-center mitra">
        <h4>Saldo Anda</h4>
        <h2>Rp1.000.000,00</h2>
    </div>
    <div id="table-pengguna" class="p-5 mtr">
        <h4>Data Produk</h4>
        <a href="/tambah_produk" class="btn btn-a my-2">Tambah</a>
        <table class="table table-striped table-hover table-light ">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Tipe</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Stok</th>
                <th scope="col" colspan="2" class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $d => $item)
            <tr>
                <th scope="row">{{ $d+1 }}</th>
                <td>{{ $item->nama_produk }}</td>
                <td>{{ $item->jenis->jenis }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>{{ $item->jumlah }}</td>
                <td></td>
                <td>
                    <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                    <a href="#" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
