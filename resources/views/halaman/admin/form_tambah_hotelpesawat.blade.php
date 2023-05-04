@extends('layout/app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <h1 class="text-center mb-4">Tambah Ketersediaan</h1>
        <main class="form-adduser">
          <form action="/form_tambah_hotelpesawat" method="post">
            @csrf
            <div class="form-floating">
              <input type="text" name="name" class="form-control  @error('name')is-invalid @enderror" id="name" placeholder="Name Example" required value="{{old('name')}}">
              <label for="name">Nama Produk</label>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            
            <div class="formselect">
                <select class="form-select" aria-label="Default select example" name="produk_id" required>
                    <option> </option>
                    <option>Hotel</option>
                    <option>Pesawat</option>
                    {{-- @foreach ($produks as $produk)
                    @if($produk['id']>1)
                    <option value="{{ $role->id }}"> {{ $role->role }} </option>
                    @endif
                    @endforeach --}}
                </select>
            </div>

            <div class="form-floating">
                <input type="text" name="desk" class="form-control  @error('name')is-invalid @enderror" id="name" placeholder="Name Example" required value="{{old('name')}}">
                <label for="name">Deskripsi</label>
                  @error('name')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
              </div>

            <button class="w-100 btn btn-outline-light mt-4" type="submit">Tambah</button>
            <a href="/pengaturan_hotelpesawat" class="w-100 btn btn-outline-light mt-2">Batal</i></a>
          </form>
        </main>
    </div>
</div>

@endsection