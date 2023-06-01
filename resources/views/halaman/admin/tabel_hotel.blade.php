@extends('layout/app')

@section('content')
    <div id="table -hotel" class="p-5 table">

        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <h4 class="data-hotel">Data Hotel</h4>
        <table class="table table-bordered table-light text-center">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Hotel</th>
                <th scope="col">Kota</th>
                <th scope="col">Action</th>

                {{-- <th scope="col">Action</th>                 --}}
            </tr>
            </thead>
            <tbody>
                @foreach ($data->unique('produk_id') as $d => $item)
                    <tr>
                        <th scope="row">{{ $d+1 }}</th>
                        <td>{{ $item->produk->nama_produk }}</td>
                        <td>{{ $item->produk->deskripsi }}</td>
                        <td>
                            <a href="/form_tambah_kamar/{{ $item->produk->id }}" class="btn3 btn btn-sm btn-light">Tambah Kamar</a>
                            <span type="button" class="btn3 btn btn-sm btn-dark" style="color:white" data-bs-toggle="modal" data-bs-target="#hotel-{{$item->id}}">Lihat Kamar</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@foreach ( $data as $dat )
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="width:1500px">
    <div class="modal fade" id="hotel-{{$dat->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal">
              <h5 class="modal-title" id="staticBackdropLabel">List Kamar</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>#</th>
                        <th>Tersedia Pada</th>
                        <th>Harga Per Malam</th>
                        <th>Jumlah Kamar Tersedia</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ( $data as $d => $item )
                        @if ($item->produk_id == $dat->produk_id)
                            <tr>
                                <th scope="row"></th>
                                <td>{{ \Carbon\Carbon::parse($item->check_in)->translatedFormat('d F Y')}}</td>
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
