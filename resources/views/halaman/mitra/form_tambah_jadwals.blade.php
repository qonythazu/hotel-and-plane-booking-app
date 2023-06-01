@extends('layout/app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <h1 class="text-center mb-4">Tambah Jadwal Penerbangan</h1>
        <main class="form-adduser">
          <form action="/jadwal" method="post">
            @csrf
            @foreach ($produk as $p)
            <input type="hidden" name="produk_id" class="form-control" id="name" placeholder="Name Example" required value="{{ $p->id }}">
            @endforeach
            <div class="form-floating">
              <input type="text" name="kota_asal" class="form-control  @error('name')is-invalid @enderror" id="name" placeholder="Name Example" required value="{{old('name')}}">
              <label for="name">Kota Asal</label>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-floating">
                <input type="text" name="kota_tiba" class="form-control  @error('name')is-invalid @enderror" id="name" placeholder="Name Example" required value="{{old('name')}}">
                <label for="name">Kota Tiba</label>
                  @error('name')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
            </div>

            <div class="form-floating">
                <input type="date" name="tgl_pergi" class="form-control  @error('name')is-invalid @enderror" id="name" placeholder="Name Example" required value="{{old('name')}}">
                <label for="name">Tanggal Berangkat</label>
                  @error('name')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
            </div>

            <div class="form-floating">
                <input type="date" name="tgl_tiba" class="form-control  @error('name')is-invalid @enderror" id="name" placeholder="Name Example" required value="{{old('name')}}">
                <label for="name">Tanggal Tiba</label>
                  @error('name')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
            </div>

            <div class="form-floating">
                <input type="time" name="waktu_pergi" class="form-control  @error('name')is-invalid @enderror" id="name" step="1" placeholder="Name Example" required value="00:00:00">
                <label for="name">Waktu Berangkat</label>
                  @error('name')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
            </div>

            <div class="form-floating">
                <input type="time" name="waktu_tiba" class="form-control  @error('name')is-invalid @enderror" id="name" step="1" placeholder="Name Example" required value="00:00:00">
                <label for="name">Waktu Tiba</label>
                  @error('name')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
            </div>

            <div class="form-floating">
              <input type="number" name="jumlah" class="form-control  @error('name')is-invalid @enderror" id="name" placeholder="Name Example" required value="{{old('name')}}">
              <label for="name">Stok</label>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
          </div>

          <div class="form-floating">
            <input type="number" name="harga" class="form-control  @error('name')is-invalid @enderror" id="name" placeholder="Name Example" required value="{{old('name')}}">
            <label for="name">Harga</label>
              @error('name')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
        </div>

            <button class="w-100 btn btn-outline-light mt-4" type="submit">Tambah</button>
            @if(Auth::user()->role_id == 1)
                <a href="/tabel_pesawat" class="w-100 btn btn-outline-light mt-2">Batal</i></a>
            @elseif(Auth::user()->role_id == 2)
                <a href="/halaman_mitra" class="w-100 btn btn-outline-light mt-2">Batal</i></a>
            @endif
          </form>
        </main>
    </div>
</div>

@endsection
