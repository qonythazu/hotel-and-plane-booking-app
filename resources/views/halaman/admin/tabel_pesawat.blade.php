@extends('layout/app')

@section('content')

    <div id="table -hotel" class="p-5 table">

        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <h4 class="data-hotel">Data Pesawat</h4>
        <table class="table table-bordered table-light">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Pesawat</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Action</th>
                {{-- <th scope="col">Action</th> --}}
            </tr>
            </thead>
            <tbody>
                @foreach ($data->unique('produk_id') as $d => $item)
                    <tr>
                        <th scope="row">{{ $d+1 }}</th>
                        <td>{{ $item->produk->nama_produk }} </td>
                        <td>{{ $item->produk->deskripsi }}</td>
                        <td><a href="/form_tambah_jadwal/{{ $item->produk->id }}" class="btn3 btn btn-sm btn-light">Tambah Jadwal</a>
                            <span type="button" class="btn3 btn btn-sm btn-dark" style="color:white" data-bs-toggle="modal" data-bs-target="#pesawat-{{$item->id}}">Lihat Jadwal</span>

                        {{-- <td>
                            <span>
                                <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                <a href="#" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                            </span>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@foreach ( $data as $dat )
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
    <div class="modal fade" id="pesawat-{{$dat->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">List Jadwal Penerbangan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>#</th>
                        <th>Rute</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Harga</th>
                        <th>Stok</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ( $data as $d => $item )
                        @if ($item->produk_id == $dat->produk_id)
                        <tr>
                            <th scope="row"></th>
                            <td>{{ $item->kota_asal }}-{{ $item->kota_tiba }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tgl_pergi)->translatedFormat('d F Y')}}</td>
                            <td>{{ $item->waktu_pergi }}-{{ $item->waktu_tiba }}</td>
                            <td>Rp. {{ number_format($item->harga,2,',','.') }}</td>
                            <td>{{ $item->jumlah }}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                  </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-bs-dismiss="modal">Ok</button>
            </div>
          </div>
        </div>
      </div>
</div>
@endforeach
@endsection
