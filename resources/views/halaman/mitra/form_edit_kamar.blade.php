@extends('layout/app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <h1 class="text-center mb-4">Edit Kamar</h1>
        <main class="form-adduser">
          <form action="{{ route('kamar.update', $produk->id) }}" method="post">
            @method('PUT')
            @csrf
            <input type="hidden" name="produk_id" class="form-control" id="name" placeholder="Name Example" required value="{{ $produk->id }}">
            <div class="form-floating">
              <input type="date" name="check_in" class="form-control  @error('check_in')is-invalid @enderror" id="check_in" placeholder="check_in Example" required value="{{ $produk->check_in }}">
              <label for="check_in">Tanggal Check in Kamar</label>
                @error('check_in')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-floating">
              <input type="number" name="harga" class="form-control  @error('harga')is-invalid @enderror" id="harga" placeholder="harga Example" required value="{{ $produk->harga }}">
              <label for="harga">Harga per Kamar</label>
                @error('harga')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
          </div>

          <div class="form-floating">
            <input type="number" name="jumlah" class="form-control  @error('jumlah')is-invalid @enderror" id="jumlah" placeholder="jumlah Example" required value="{{ $produk->jumlah }}">
            <label for="jumlah">Stok</label>
              @error('jumlah')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
        </div>

            <button class="w-100 btn btn-outline-light mt-4" type="submit">Ubah</button>
            @if(Auth::user()->role_id == 1)
                <a href="/tabel_hotel" class="w-100 btn btn-outline-light mt-2">Batal</i></a>
            @elseif(Auth::user()->role_id == 2)
                <a href="/halaman_mitra" class="w-100 btn btn-outline-light mt-2">Batal</i></a>
            @endif
          </form>
        </main>
    </div>
</div>

@endsection
