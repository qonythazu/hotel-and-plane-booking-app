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
            </tr>
            </thead>
            <tbody>
                @foreach ($data as $d => $item)
                @if ($item->jenis_id == 2)
                    <tr>
                        <th scope="row">{{ $d+1 }}</th>
                        <td>{{ $item->nama_produk }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>
                            <a href="/form_tambah_kamar/{{ $item->id }}" class="btn3 btn btn-sm btn-outline-dark btn-light">Tambah Kamar</a>
                            @foreach ( $kamar->unique('produk_id') as $k )
                                @if($k->produk_id == $item->id)
                                    <span type="button" class="btn btn-a btn-sm" style="color:white" data-bs-toggle="modal" data-bs-target="#hotel-{{$k->id}}">Lihat Kamar</span>
                                @endif
                            @endforeach
                        </td>
                    </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        <a href="/dashboard_admin" class="btn btn-a my-2">kembali</a>
    </div>

@foreach ( $kamar as $dat )
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="width:1500px">
    <div class="modal fade" id="hotel-{{$dat->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
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
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ( $kamar as $d => $item )
                        @if ($item->produk_id == $dat->produk_id)
                            <tr>
                                <th scope="row"></th>
                                <td>{{ \Carbon\Carbon::parse($item->check_in)->translatedFormat('d F Y')}}</td>
                                <td>Rp. {{ number_format($item->harga,2,',','.') }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>
                                    <form action="{{ route('kamar.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="font-size: 1px;" onclick="return confirm('Yakin ingin menghapus data?')"><i data-feather="trash-2"></i></button>
                                    </form>
                                    <a href="kamar/{{ $item->id }}/edit" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                                </td>
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
