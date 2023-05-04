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
        <table class="table table-bordered table-light">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Pesawat</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Harga</th>
                
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Lion Air</td>
                <td>Balikpapan - Tarakan</td>
                <td>800000</td>
                {{-- <td>
                    <span>
                        <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        <a href="#" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                    </span>
                </td> --}}
            </tr>
            </tbody>
        </table>
    </div>
@endsection