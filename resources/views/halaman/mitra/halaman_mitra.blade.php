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
        <a href="/produk" class="btn btn-a my-2">Tambah</a>
        <table class="table table-striped table-hover table-light text-center">
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
            @foreach($produk as $d => $item)
            <tr>
                <th scope="row">{{ $d+1 }}</th>
                <td>{{ $item->nama_produk }}</td>
                <td>{{ $item->jenis->jenis }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>
                    @if($item->jenis_id == 1)
                        <a href="/form_tambah_jadwal/{{ $item->id }}"  class="btn btn-outline-dark btn-light">Tambah Jadwal</a>
                        <span type="button" class="btn btn-a my-2" style="color:white" data-bs-toggle="modal" data-bs-target="#pesawat-{{$item->id}}">Lihat Jadwal</span>
                        @elseif ($item->jenis_id == 2)
                        <a href="/form_tambah_kamar/{{ $item->id }}"  class="btn btn-outline-dark btn-light">Tambah Kamar</a>
                        <span type="button" class="btn btn-a my-2" style="color:white" data-bs-toggle="modal" data-bs-target="#hotel-{{$item->id}}">Lihat Kamar</span>
                    @endif
                    <form action="{{ route('produk.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="font-size: 1px;" onclick="return confirm('Yakin ingin menghapus data?')"><i data-feather="trash-2"></i></button>
                    </form>
                    <a href="produk/{{ $item->id }}/edit" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{-- modal hotel --}}
    @foreach ( $produk as $pro )
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="width:1500px">
        <div class="modal fade" id="hotel-{{$pro->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                            @foreach ( $kamar as $k => $item )
                            @if ($item->produk_id == $pro->id)
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

{{-- modal pesawat --}}
@foreach ( $produk as $pro )
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
    <div class="modal fade" id="pesawat-{{$pro->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                        @foreach ( $jadwal as $j => $item )
                        @if ($item->produk_id == $pro->id)
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
