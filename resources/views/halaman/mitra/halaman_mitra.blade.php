@extends('layout/app')

@section('content')
    <div class="saldo-anda m-3 p-3 text-white rounded-2 text-center mitra">
        <h4>Saldo Anda</h4>
        @foreach ($user as $d)
        @if ($d->id == Auth::user()->id)
            <h2> Rp. {{$d->transaksi?->saldo_akhir ? number_format($d->transaksi->saldo_akhir,2,',','.') : 0}}</h2>
        @endif
        @endforeach
    </div>
    <div id="table-pengguna" class="p-5 mtr">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif (session()->has('deleted'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('deleted') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <h4>Data Produk</h4>
        <a href="/tambah_produk" class="btn btn-a my-2">Tambah</a>
        <table class="table table-striped table-hover table-light ">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Tipe</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $d => $item)
            <tr>
                <th scope="row">{{ $d+1 }}</th>
                <td>{{ $item->nama_produk }}</td>
                <td>{{ $item->jenis->jenis }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>
                    <form action="{{ route('produk.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="font-size: 1px;" onclick="return confirm('Yakin ingin menghapus data?')"><i data-feather="trash-2"></i></button>
                    </form>
                    {{-- <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a> --}}
                    <a href="produk/{{ $item->id }}/edit" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
