@extends('layout/app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <h1 class="text-center mb-4">Tambah Kamar</h1>
        <main class="form-adduser">
          <form action="/kamar" method="post">
            @csrf
            @foreach ($produk as $p)
            <input type="hidden" name="produk_id" class="form-control" id="name" placeholder="Name Example" required value="{{ $p->id }}">
            @endforeach
            <div class="form-floating">
              <input type="date" name="check_in" class="form-control  @error('name')is-invalid @enderror" id="name" placeholder="Name Example" required value="{{old('name')}}">
              <label for="name">Tanggal Check in Kamar</label>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-floating">
              <input type="text" name="harga" class="form-control  @error('name')is-invalid @enderror" id="name" placeholder="Name Example" required value="{{old('name')}}">
              <label for="name">Harga per Kamar</label>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
          </div>

          <div class="form-floating">
            <input type="text" name="jumlah" class="form-control  @error('name')is-invalid @enderror" id="name" placeholder="Name Example" required value="{{old('name')}}">
            <label for="name">Stok</label>
              @error('name')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
        </div>

            <button class="w-100 btn btn-outline-light mt-4" type="submit">Tambah</button>
            <a href="/lihat_kamar" class="w-100 btn btn-outline-light mt-2">Batal</i></a>
          </form>
        </main>
    </div>
</div>

@endsection
