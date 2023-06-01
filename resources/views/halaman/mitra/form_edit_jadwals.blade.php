@extends('layout/app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <h1 class="text-center mb-4">Edit Jadwal Penerbangan</h1>
        <main class="form-adduser">
          <form action="{{ route('jadwal.update', $produk->id) }}" method="post">
            @method('PUT')
            @csrf
            <input type="hidden" name="produk_id" class="form-control" id="name" placeholder="Name Example" required value="{{ $produk->id }}">
            <div class="form-floating">
              <input type="text" name="kota_asal" class="form-control  @error('kota_asal')is-invalid @enderror" id="kota_asal" placeholder="kota_asal Example" required value="{{ $produk->kota_asal }}">
              <label for="kota_asal">Kota Asal</label>
                @error('kota_asal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-floating">
                <input type="text" name="kota_tiba" class="form-control  @error('kota_tiba')is-invalid @enderror" id="kota_tiba" placeholder="kota_tiba Example" required value="{{ $produk->kota_tiba }}">
                <label for="kota_tiba">Kota Tiba</label>
                  @error('kota_tiba')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
            </div>

            <div class="form-floating">
                <input type="date" name="tgl_pergi" class="form-control  @error('tgl_pergi')is-invalid @enderror" id="tgl_pergi" placeholder="tgl_pergi Example" required value="{{ $produk->tgl_pergi }}">
                <label for="tgl_pergi">Tanggal Berangkat</label>
                  @error('tgl_pergi')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
            </div>

            <div class="form-floating">
                <input type="date" name="tgl_tiba" class="form-control  @error('tgl_tiba')is-invalid @enderror" id="tgl_tiba" placeholder="tgl_tiba Example" required value="{{ $produk->tgl_tiba }}">
                <label for="tgl_tiba">Tanggal Tiba</label>
                  @error('tgl_tiba')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
            </div>

            <div class="form-floating">
                <input type="time" name="waktu_pergi" class="form-control  @error('waktu_pergi')is-invalid @enderror" id="waktu_pergi" step="1" placeholder="waktu_pergi Example" required value="{{ $produk->waktu_pergi }}">
                <label for="waktu_pergi">Waktu Berangkat</label>
                  @error('waktu_pergi')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
            </div>

            <div class="form-floating">
                <input type="time" name="waktu_tiba" class="form-control  @error('waktu_tiba')is-invalid @enderror" id="waktu_tiba" step="1" placeholder="waktu_tiba Example" required value="{{ $produk->waktu_tiba }}">
                <label for="waktu_tiba">Waktu Tiba</label>
                  @error('waktu_tiba')
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

          <div class="form-floating">
            <input type="number" name="harga" class="form-control  @error('harga')is-invalid @enderror" id="harga" placeholder="harga Example" required value="{{ $produk->harga }}">
            <label for="harga">Harga</label>
              @error('harga')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
        </div>

            <button class="w-100 btn btn-outline-light mt-4" type="submit">Ubah</button>
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
