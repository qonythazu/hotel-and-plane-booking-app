@extends('layout/app')

@section('content')

@if (session()->has('success'))
    <div class="alert alert-success p-3 pb-3 m-3">
        {{ session('success') }}
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger p-3 pb-3 m-3">
        {{ session('error') }}
    </div>
@endif

<div class="bgback p-3 pb-3 m-3 rounded-2 d-flex">
    <div class="col-md-12">
        @php
            $hotel = $data1->where('produk.jenis_id', 2)->count();
            $pesawat = $data2->where('produk.jenis_id', 1)->count();
        @endphp
        <p class="pb-0 mb-3"><a href="/booking_hotel" class="text-light"><i data-feather="arrow-left" style="width: 14px; height:14px"></i>&nbsp;kembali</a></p>
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
                    <i class="fas fa-suitcase"></i> &nbsp; Pesanan Kamar Hotel Saya &nbsp; <span class="badge" style="background-color: #e673ae">{{ $hotel }}</span>
                </button>
              </h2>
              <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
                <div class="accordion-body">
                    {{-- ISI PESANAN HOTEL --}}
                    <nav class="nav nav-tabs">
                        <button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-proses">
                            Kamar Saya
                        </button>
                        <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-batal">
                            Dibatalkan
                        </button>
                    </nav>
                    <div class="tab-content">
                        <div class="tab-pane active show fade" id="tab-proses">
                            <table class="table">
                                <thead class="table-light">
                                  <tr>
                                    <th>#</th>
                                    <th>Jenis Item</th>
                                    <th>Waktu Booking</th>
                                    <th>Detail Item</th>
                                    <th>Qty</th>
                                    <th>Harga Per Malam (Rp.)</th>
                                    <th>Total Harga (Rp.)</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $data1 as $d => $item )
                                        @if ($item->produk->jenis_id == 2 && $item->status == 'lunas')
                                        <tr>
                                            <td></td>
                                            <td>Hotel {{ $item->produk->nama_produk }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('l, d F Y') }}</td>
                                            <td>Lokasi Kota {{ $item->produk->deskripsi }}, Untuk tanggal {{ \Carbon\Carbon::parse($item->kamar->check_in)->translatedFormat('d F Y') }} <br>
                                                {{ $item->deskripsi }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ number_format($item->kamar->harga,2,',','.') }}</td>
                                            <td>{{ number_format($item->total_harga,2,',','.') }}</td>
                                            <td>
                                                <span class="badge bg-success">{{ $item->status }}</span>
                                                <span class="badge bg-danger"><a href="/pesanan/{{ $item->id }}" style="color:white" onclick="return confirm('Yakin ingin membatalkan pesanan?')">Batal</a></span>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                              </table>
                        </div>
                        <div class="tab-pane fade" id="tab-batal">
                            <table class="table">
                                <thead class="table-light">
                                  <tr>
                                    <th>#</th>
                                    <th>Jenis Item</th>
                                    <th>Waktu Booking</th>
                                    <th>Detail Item</th>
                                    <th>Qty</th>
                                    <th>Harga Per Malam (Rp.)</th>
                                    <th>Total Harga (Rp.)</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $data1 as $d => $item )
                                        @if ($item->produk->jenis_id == 2 && $item->status == 'dibatalkan')
                                        <tr>
                                            <td></td>
                                            <td>Hotel {{ $item->produk->nama_produk }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('l, d F Y') }}</td>
                                            <td>Lokasi Kota {{ $item->produk->deskripsi }}, Untuk tanggal {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ number_format($item->kamar->harga,2,',','.') }}</td>
                                            <td>{{ number_format($item->total_harga,2,',','.') }}</td>
                                            <td><span class="badge bg-danger">{{ $item->status }}</span></td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                    <i class="fas fa-plane-departure"></i> &nbsp; Pesanan Penerbangan Saya &nbsp; <span class="badge" style="background-color: #e673ae">{{ $pesawat }}</span>
                </button>
              </h2>
              <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                <div class="accordion-body">
                  {{-- ISI BOOKING PENERBANGAN --}}
                    <nav class="nav nav-tabs">
                        <button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#tabPlane-proses">
                            Tiket Penerbangan Saya
                        </button>
                        <button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#tabPlane-batal">
                            Dibatalkan
                        </button>
                    </nav>
                    <div class="tab-content">
                        <div class="tab-pane active show fade" id="tabPlane-proses">
                            <table class="table">
                                <thead class="table-light">
                                  <tr>
                                    <th>#</th>
                                    <th>Jenis Item</th>
                                    <th>Waktu Booking</th>
                                    <th>Detail Item</th>
                                    <th>Qty</th>
                                    <th>Harga Satuan (Rp.)</th>
                                    <th>Total Harga (Rp.)</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $data2 as $d => $item )
                                        @if ($item->produk->jenis_id == 1 && $item->status == 'lunas')
                                        <tr>
                                            <td></td>
                                            <td>{{ $item->produk->nama_produk }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('l, d F Y') }}</td>
                                            <td><span type="button" class="badge bg-warning" style="color:white" data-bs-toggle="modal" data-bs-target="#plane-{{$item->id}}">lihat selengkapnya</span></td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ number_format($item->jadwal->harga,2,',','.') }}</td>
                                            <td>{{ number_format($item->total_harga,2,',','.') }}</td>
                                            <td>
                                                <span class="badge bg-success">{{ $item->status }}</span>
                                                <span class="badge bg-danger"><a href="/pesanan/{{ $item->id }}" style="color:white" onclick="return confirm('Yakin ingin membatalkan pesanan?')">Batal</a></span>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                              </table>
                        </div>
                        <div class="tab-pane fade" id="tabPlane-batal">
                            <table class="table">
                                <thead class="table-light">
                                  <tr>
                                    <th>#</th>
                                    <th>Jenis Item</th>
                                    <th>Waktu Booking</th>
                                    <th>Detail Item</th>
                                    <th>Qty</th>
                                    <th>Harga Satuan (Rp.)</th>
                                    <th>Total Harga (Rp.)</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $data2 as $d => $item )
                                        @if ($item->produk->jenis_id == 1 && $item->status == 'dibatalkan')
                                        <tr>
                                            <td></td>
                                            <td>{{ $item->produk->nama_produk }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('l, d F Y') }}</td>
                                            <td><span type="button" class="badge bg-warning" style="color:white" data-bs-toggle="modal" data-bs-target="#plane-{{$item->id}}">lihat selengkapnya</span></td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ number_format($item->jadwal->harga,2,',','.') }}</td>
                                            <td>{{ number_format($item->total_harga,2,',','.') }}</td>
                                            <td><span class="badge bg-danger">{{ $item->status }}</span></td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>

<!-- Vertically centered scrollable modal -->
@foreach ( $data2 as $d )
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal fade" id="plane-{{$d->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Detail Booking</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! $d->deskripsi !!}
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
