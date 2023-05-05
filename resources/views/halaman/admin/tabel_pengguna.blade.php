
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
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($data as $d => $item)
                    <tr>
                        <th scope="row">{{ $d+1 }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>Rp {{ number_format(($item->transaksi?->saldo_akhir ? $item->transaksi->saldo_akhir : '0'),2,',','.') }}</td>
                        <td>
                            <span>
                                <div class="user">
                                    <button class="edit-button btn btn-success">Edit</button>
                                </div>
                                
                                <!-- Form edit yang disembunyikan -->
                                <form class="edit-form" style="display: none;">
                                    @csrf
                                    @method('PUT')
                                    <label for="name">Name:</label>
                                    <input type="text" name="name" value="{{ $item->name }}">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" value="{{ $item->email }}">
                                    <button type="submit" class="btn btn-primary">Update User</button>
                                </form>
                                
                                <script>
                                    var editButton = document.querySelector('.edit-button');
                                    var user = document.querySelector('.user');
                                    var editForm = document.querySelector('.edit-form');
                                
                                    editButton.addEventListener('click', function() {
                                        // Sembunyikan tampilan user yang sudah ada
                                        user.style.display = 'none';
                                
                                        // Tampilkan form edit
                                        editForm.style.display = 'block';
                                    });
                                </script>
                                <form action="{{ route('users.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </span>
                        </td>
                        {{-- <td>
                            <span>
                                <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                <a href="#" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                            </span>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
