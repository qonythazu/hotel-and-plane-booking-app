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
        <table class="table table-bordered table-light  text-center">
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
                @foreach ($data as $d => $item)
                @if($item->jenis_id == 1)
                    <tr>
                        <th scope="row">{{ $d+1 }}</th>
                        <td>{{ $item->nama_produk }} </td>
                        <td>{{ $item->deskripsi }}</td>
                        <td><a href="/form_tambah_jadwal/{{ $item->id }}" class="btn3 btn btn-sm btn-outline-dark btn-light">Tambah Jadwal</a>
                            @foreach ( $jadwal->unique('produk_id') as $j )
                                @if($j->produk_id == $item->id)
                                    <span type="button" class="btn btn-a btn-sm" style="color:white" data-bs-toggle="modal" data-bs-target="#pesawat-{{$j->id}}">Lihat Jadwal</span>
                                @endif
                            @endforeach
                    </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        <a href="/dashboard_admin" class="btn btn-a my-2">kembali</a>
    </div>

@foreach ( $jadwal as $dat )
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
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ( $jadwal as $d => $item )
                        @if ($item->produk_id == $dat->produk_id)
                        <tr>
                            <th scope="row"></th>
                            <td>{{ $item->kota_asal }}-{{ $item->kota_tiba }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tgl_pergi)->translatedFormat('d F Y')}}</td>
                            <td>{{ $item->waktu_pergi }}-{{ $item->waktu_tiba }}</td>
                            <td>Rp. {{ number_format($item->harga,2,',','.') }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>
                                <form action="{{ route('jadwal.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="font-size: 1px;" onclick="return confirm('Yakin ingin menghapus data?')"><i data-feather="trash-2"></i></button>
                                </form>
                                <a href="jadwal/{{ $item->id }}/edit" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
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
