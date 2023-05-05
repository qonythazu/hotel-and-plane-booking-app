@extends('layout/app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-5 tb">
        <h1 class="text-center mb-4">Tambah Produk</h1>
        <main class="form-adduser">
          <form action="/form_tambah_pengguna" method="post">
            @csrf
            <div class="form-floating">
              <input type="text" name="nama_produk" class="form-control  @error('name')is-invalid @enderror" id="name" placeholder="Name Example" required value="{{old('name')}}">
              <label for="name">Nama Produk</label>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            
            <div class="formselect">
                <select class="form-select" aria-label="Default select example" name="role_id" required>
                    <option selected="" disabled="">Tipe</option>
                    <option> Hotel </option>
                    <option> Pesawat </option>
                </select>
            </div>
            
            <div class="form-floating">
                <input type="text" name="deskripsi" class="form-control  @error('deskripsi')is-invalid @enderror" id="deskripsi" placeholder="deskripsi">
                <label for="deskripsi">Deskripsi</label>
                @error('deskripsi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-floating">
                <input type="text" name="stok" class="form-control  @error('stok')is-invalid @enderror" id="stok" placeholder="stok" required>
                <label for="stok">Stok</label>
            </div>
            

            <button class="w-100 btn btn-outline-light mt-4" type="submit">Tambah</button>
            <a href="/halaman_mitra" class="w-100 btn btn-outline-light mt-2">Batal</i></a>
          </form>
        </main>
    </div>
</div>

@endsection