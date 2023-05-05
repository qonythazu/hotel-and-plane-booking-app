
@extends('layout/app')

@section('content')
    <div id="table -pengguna" class="p-5 table">

        <h4 class="data-pengguna">Data Pengguna</h4>
        <table class="table table-bordered table-light">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Pengguna</th>
                <th scope="col">Email</th>
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
                                <a href="/form_edit_pengguna" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                                
                                
                                <form action="{{ route('users.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </span>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
