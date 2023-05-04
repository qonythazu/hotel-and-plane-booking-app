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
        <table class="table table-bordered table-light">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Hotel</th>
                <th scope="col">Kota</th>
                <th scope="col">Kamar Tersedia</th>
                <th scope="col">Tanggal Tersedia</th>
                <th scope="col">Harga kamar</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Grand Citra</td>
                <td>Balikpapan</td>
                <td>12</td>
                <td>10-04-2023</td>
                <td>250000</td>
                    {{-- <span>
                        <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        <a href="#" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                    </span> --}}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection