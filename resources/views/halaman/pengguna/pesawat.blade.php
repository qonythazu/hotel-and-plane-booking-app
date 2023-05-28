@extends('layout/app')
@section('content')
    <div class="saldo-anda bgback m-3 p-3 text-white rounded-2 text-center">
        <h4>Saldo Anda</h4>
        @foreach ($data as $d)
        @if ($d->id == Auth::user()->id)
        <h2> Rp. {{$d->transaksi?->saldo_akhir ? number_format($d->transaksi->saldo_akhir,2,',','.') : 0}}</h2>
        @endif
        @endforeach
    </div>
    <div class="column">
        <div class="booking-pesawat">
            <div class="bgback p-3 pb-3 m-3 rounded-2 d-flex">
                <h4 style="color:white;">Hasil Pencarian</h4>
            </div>
            <div class="bgback p-3 pb-3 m-3 text-light rounded-2 d-flex flex-column">
                <p class="pb-0 mb-0"><a href="/booking_pesawat" class="text-light"><i data-feather="arrow-left" style="width: 14px; height:14px"></i>&nbsp;kembali</a></p>
                <hr class="pb-0 pt-0 mt-1 mb-3">
                     <p><button class="tgl btn btn-light" disabled>{{ \Carbon\Carbon::parse(request('check_in'))->translatedFormat('d F Y') }}</button></p>
                     <h5>Hasil Pencarian: <strong>Kota {{ request('kota_asal') }}</strong> <i class="fa-solid fa-arrow-right"></i><strong> Kota {{ request('kota_tiba') }}</strong></h5>
             </div>
                <div class="bgback p-3 pb-3 m-3 rounded-2 text-white d-flex justify-content-center">
                <table class="table bg-light table-custom text-center" style="width: 75%;">
                    <thead>
                        <tr>
                        <th scope="col" colspan="2">Maskapai</th>
                        <th scope="col">Berangkat</th>
                        <th scope="col"></th>
                        <th scope="col">Tiba</th>
                        <th scope="col">Harga Per Orang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($produk->count())
                        @foreach ($produk as $p)
                        @php
                            $berangkat = \Carbon\Carbon::parse($p->waktu_pergi);
                            $tiba = \Carbon\Carbon::parse($p->waktu_tiba);
                            $durasi = $berangkat->diffInMinutes($tiba);
                            $jam = intdiv($durasi, 60);
                            $menit = $durasi % 60;
                        @endphp
                        <tr>
                        <td class="text-center" style="vertical-align: middle;padding: 25px">
                            <p>foto</p>
                        </td>
                        <td class="text-center" style="vertical-align: middle;padding: 25px">
                            <div class="d-flex flex-column align-items-center">
                                <span class="text-start fw-bold">{{ $p->produk->nama_produk }}</span>
                                <small class="fst-italic text-muted">{{ $p->produk->deskripsi }}</small>
                            </div>
                        </td>
                        <td class="text-center" style="vertical-align: middle;padding: 25px">
                            <div class="d-flex flex-column align-items-center">
                                <span style="font-size: 16pt">{{ \Carbon\Carbon::parse($berangkat)->translatedFormat('H:i') }}</span>
                                <small>{{ $p->kota_asal }}</small>
                            </div>
                        </td>
                        <td class="text-center" style="vertical-align: middle;padding: 25px">
                            <div class="d-flex flex-column align-items-center">
                                <span><i class="fas fa-plane"></i></span>
                                <small class="text-muted" style="font-size: 8pt">{{ $jam }}j {{ $menit }}mnt</small>
                            </div>
                        </td>
                        <td class="text-center" style="vertical-align: middle;padding: 25px">
                            <div class="d-flex flex-column align-items-center">
                                <span style="font-size: 16pt">{{ \Carbon\Carbon::parse($tiba)->translatedFormat('H:i')}}</span>
                                <small>{{ $p->kota_tiba }}</small>
                            </div>
                        </td>
                        <td class="text-center" style="vertical-align: middle;padding: 25px">
                            <div class="d-flex flex-column align-items-end">
                                <span class="fw-bold fs-5 mb-2">Rp.{{ number_format($p->harga)}}/orng</span>
                                <div class="but plane btn-group" style="width: 150px;">
                                    <a href="{{ route('bookingP.detail',$p->id) }}" class="btn3 btn btn-sm">Booking</a>
                                </div>
                            </div>
                        </td>
                        </tr>
                        @endforeach
                        @else
                        <td colspan="12" class="text-center" style="vertical-align: middle;padding: 25px">
                            <p style="color: #b8b8b8">Data Tidak Ditemukan</p>
                        </td>
                        @endif
                    </tbody>
                    </table>
                {{-- @foreach ($produk as $p)
                <div class="card text-end text-dark mb-3" style="width: 100%;">
                    <div class="card-body">
                      <h5 class="card-title text-start">{{ $p->produk }}</h5>
                      <p class="card-text text-start">{{ $p->desk }}</p>
                      <p class="card-text text-start">{{ $p->asal }} | {{ $p->berangkat }} -> {{ $p->tujuan }} | {{ $p->tiba }}</p>
                      <p class="card-text">Rp.{{ $p->harga }}</p>
                      <div class="but plane btn-group">
                          <a href="#" class="btn3 btn btn-sm">Booking</a>
                      </div>
                    </div>
                </div>
                @endforeach --}}
            </div>
        </div>
    </div>
@endsection
