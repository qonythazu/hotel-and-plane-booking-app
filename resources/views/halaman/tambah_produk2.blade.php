@extends('layout/app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-5 tb">
        <h1 class="text-center mb-4">Tambah Produk</h1>
        <main class="form-adduser">
          <form action="/produk" method="post">
            @csrf
            <div class="form-floating">
              <input type="text" name="nama_produk" class="form-control  @error('name_produk')is-invalid @enderror" id="nama_produk" placeholder="nama_produk Example" required value="{{old('nama_produk')}}">
              <label for="nama_produk">Nama Produk</label>
              @error('nama_produk')
              <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
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

            <div class="formselect">
                <select class="form-select" aria-label="Default select example" name="jenis_id" required>
                    <option selected="" disabled="">Tipe</option>
                    @foreach ($produk as $p)
                        @if (old('jenis_id') == $p->jenis->id)
                        <option value="{{ $p->jenis->id }}" selected> {{ $p->jenis->jenis }} </option>
                        @else
                        <option value="{{ $p->jenis->id }}"> {{ $p->jenis->jenis }} </option>
                        @endif
                        @endforeach
                    </select>
                </div>

                {{-- <div class="formselect">
                    <select class="form-select" aria-label="Default select example" name="user_id" required>
                        <option> </option>
                        @foreach ($produk->unique('user_id') as $p)
                        @if (old('user_id') == $p->user->id)
                        <option value="{{ $p->user->id }}" selected> {{ $p->user->name }} </option>
                        @else
                        <option value="{{ $p->user->id }}"> {{ $p->user->name }} </option>
                        @endif
                        @endforeach
                    </select>
                </div> --}}
            <div class="formselect">
                <input type="hidden" name="user_id" class="form-control  @error('user_id')is-invalid @enderror" id="user_id" placeholder="nama_produk Example" required value="{{ Auth::user()->id }}">
            </div>

            <button class="w-100 btn btn-outline-light mt-4" type="submit">Tambah</button>
            <a href="/halaman_mitra" class="w-100 btn btn-outline-light mt-2">Batal</i></a>
          </form>
        </main>
    </div>
</div>

@endsection
