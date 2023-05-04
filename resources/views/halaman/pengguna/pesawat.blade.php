@extends('layout/app')

@section('content')
    <div class="saldo-anda bgback m-3 p-3 text-white rounded-2 text-center">
        <h4>Saldo Anda</h4>
        @foreach ($data as $d)
        @if ($d->id == Auth::user()->id)
        <h2> Rp. {{number_format($d->transaksi->saldo_akhir,2,',','.')}}</h2>
        @endif
        @endforeach
    </div>
    <div class="column">
        <div class="booking-pesawat">
            <div class="bgback p-3 pb-3 m-3 rounded-2 d-flex">
                <h4 style="color:white;">Hasil Pencarian</h4>
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
                                <span style="font-size: 16pt">{{ \Carbon\Carbon::parse($p->berangkat)->format('H:i') }}</span>
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
                                <span style="font-size: 16pt">{{ \Carbon\Carbon::parse($p->tiba)->format('H:i')}}</span>
                                <small>{{ $p->kota_tiba }}</small>
                            </div>
                        </td>
                        <td class="text-center" style="vertical-align: middle;padding: 25px">
                            <div class="d-flex flex-column align-items-end">
                                <span class="fw-bold fs-5 mb-2">Rp.{{ number_format($p->harga)}}/orng</span>
                                <div class="but plane btn-group" style="width: 150px;">
                                    <a href="#" class="btn3 btn btn-sm">Booking</a>
                                </div>
                            </div>
                        </td>
                        </tr>
                        @endforeach
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
