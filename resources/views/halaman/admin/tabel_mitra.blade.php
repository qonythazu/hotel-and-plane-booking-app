@extends('layout/app')

@section('content')
    <div id="table -mitra" class="p-5 table">

        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <h4 class="data-mitra">Data Mitra</h4>
        <table class="table table-bordered table-light">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Mitra</th>
                <th scope="col">username</th>
                <th scope="col">Uang Elektronik</th>
                {{-- <th scope="col">Action</th> --}}
            </tr>
            </thead>
            <tbody>
                @foreach ($data as $d => $item)
                    <tr>
                        <th scope="row">{{ $d+1 }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>Rp {{ number_format(($item->transaksi?->saldo_akhir ? $item->transaksi->saldo_akhir : '0'),2,',','.') }}</td>

                        {{-- <td>
                            <span>
                                <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                <a href="#" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                            </span>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
            {{-- <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Shinta Adelia</td>
                <td>sshynthah</td>
                <td>1@2#</td>
                <td>Rp10.000</td>
                <td>
                    <span>
                        <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        <a href="#" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                    </span>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Destiera</td>
                <td>dhesty</td>
                <td>1@2#</td>
                <td>Rp10.000</td>
                <td>
                    <span>
                        <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        <a href="#" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                    </span>
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Putri Oktatriani</td>
                <td>phoetry</td>
                <td>1@2#</td>
                <td>Rp10.000</td>
                <td>
                    <span>
                        <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        <a href="#" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                    </span>
                </td>
            </tr>
            </tbody> --}}
        </table>
    </div>
@endsection