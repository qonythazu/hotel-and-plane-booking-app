@extends('layout.app')

@section('content')
    <div class="column p-5">
        <div class="nambah-uang">
            <h4>Isi Uang Elektronik</h4>
            <form action="/ewallet" method="GET">
                <div class="input-group mb-3">
                    <input class="form-control me-2" type="text" placeholder="Username" name="username">
                    <button class="input-group-text btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
            <div class="hasil-pencarian bgback p-3 m-3 text-white rounded-2">
                <h5>Hasil Pencarian</h5>
                @if ($data->count())
                    <ul>
                        @foreach ($saldo as $d)
                            <li>
                                {{ $d->name }} Saldo Akhir: Rp. {{ number_format(($d->transaksi?->saldo_akhir ? $d->transaksi->saldo_akhir : '0'),2,',','.') }}
                                <div>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#debitsaldo-{{$d->id}}">
                                        Tambah
                                    </button>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kreditsaldo-{{$d->id}}">
                                        Tarik Uang
                                    </button>
                                </div>
                                
                                  
                                {{-- <div class="my-2">
                                    <form action="{{ route('add-saldo') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="username" value="{{ $user->name }}">
                                        <input type="number" name="saldo" class="form-control">
                                        <button type="submit" class="btn btn-primary my-1">Tambah Saldo</button>
                                    </form>
                                </div> --}}
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>Tidak ada hasil pencarian.</p>
                @endif
                @foreach($saldo as $d)
                    <div class="modal fade" id="debitsaldo-{{$d->id}}" tabindex="-1" aria-labelledby="debitsaldoLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark" id="debitsaldoLabel">Tambah Saldo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="/ewallet" method="POST">
                                @csrf
                                <div class="modal-body">
                                {{-- <div class="my-2"> --}}
                                    <input type="text" name="id" class="form-control" value="{{$d->id}}">
                                    <input type="text" name="debit" class="form-control">
                                    {{-- </div> --}}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success">Tambah</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                @endforeach

                @foreach($saldo as $d)
                    <div class="modal fade" id="kreditsaldo-{{$d->id}}" tabindex="-1" aria-labelledby="kreditsaldoLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark" id="kreditsaldoLabel">Tarik Saldo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="/ewallet" method="POST">
                                @csrf
                                <div class="modal-body">
                                {{-- <div class="my-2"> --}}
                                    <input type="text" name="id" class="form-control" value="{{$d->id}}">
                                    <input type="text" name="kredit" class="form-control">
                                    {{-- </div> --}}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success">Tarik</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                @endforeach
                  
            </div>            
        </div>
    </div>
@endsection
