@extends('layout/app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-5 tb">
        <h1 class="text-center mb-4">Edit Produk</h1>
        <main class="form-adduser">
          <form action="{{ route('produk.update', $produk->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="form-floating">
              <input type="text" name="nama_produk" class="form-control  @error('name_produk')is-invalid @enderror" id="nama_produk" placeholder="nama_produk Example" required value="{{ $produk->nama_produk }}">
              <label for="nama_produk">Nama Produk</label>
              @error('nama_produk')
              <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="formselect">
                <select class="form-select" aria-label="Default select example" name="jenis_id" required>
                    <option> </option>
                    @foreach ($jenis as $jen)
                        @if (($produk->jenis_id) == $jen->id)
                            <option value="{{ $jen->id }}" selected> {{ $jen->jenis }} </option>
                        @else
                            <option value="{{ $jen->id }}"> {{ $jen->jenis }} </option>
                        @endif
                    @endforeach
                </select>
             </div>

            <div class="form-floating">
                <input type="text" name="deskripsi" class="form-control  @error('deskripsi')is-invalid @enderror" id="deskripsi" placeholder="deskripsi" required value="{{ $produk->deskripsi }}">
                <label for="deskripsi">Kelas Penerbangan (untuk pesawat) / Kota (untuk hotel) </label>
                @error('deskripsi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-floating">
                <input type="hidden" name="user_id" class="form-control  @error('user_id')is-invalid @enderror" id="user_id" placeholder="user_id" required value="{{ $produk->user_id }}">
                @error('user_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            @if(Auth::user()->role_id == 1)
            <div class="formselect">
                <select class="form-select" aria-label="Default select example" name="user_id" required>
                    <option> </option>
                    @foreach ($acc as $p)
                    @if($p->role_id == 2)
                        @if ($produk->user_id == $p->id)
                        <option value="{{ $p->id }}" selected> {{ $p->name }} </option>
                        @else
                        <option value="{{ $p->id }}"> {{ $p->name }} </option>
                        @endif
                    @endif
                    @endforeach
                </select>
            </div>
            @elseif(Auth::user()->role_id == 2)
            <div class="formselect">
                <input type="hidden" name="user_id" class="form-control  @error('user_id')is-invalid @enderror" id="user_id" placeholder="nama_produk Example" required value="{{ Auth::user()->id }}">
            </div>
            @endif

            <button class="w-100 btn btn-outline-light mt-4" type="submit">Perbarui</button>
            @if(Auth::user()->role_id == 1)
                <a href="/pengaturan_hotel_pesawat" class="w-100 btn btn-outline-light mt-2">Batal</i></a>
            @elseif(Auth::user()->role_id == 2)
                <a href="/halaman_mitra" class="w-100 btn btn-outline-light mt-2">Batal</i></a>
            @endif
          </form>
        </main>
    </div>
</div>

@endsection
