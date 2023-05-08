@extends('layout.app')

@section('content')
    <div class="column p-5">
        <div class="nambah-uang">
            <h4>Isi Uang Elektronik</h4>
            <form action="{{ route('search') }}" method="GET">
                <div class="input-group mb-3">
                    <input class="form-control me-2" type="text" placeholder="Username" name="username">
                    <button class="input-group-text btn btn-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
            <div class="hasil-pencarian bgback p-3 m-3 text-white rounded-2">
                <h5>Hasil Pencarian</h5>
                @if (isset($hasilPencarian) && $hasilPencarian->count() > 0)
                    <ul>
                        @foreach ($hasilPencarian as $user)
                            <li>{{ $user->name }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>Tidak ada hasil pencarian.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
