@extends('layout/app')

@section('content')
    <div class="formproduk p-5">
        <form>
            <h3>Form Tambah Produk</h3><hr>
            <div class="mb-3 mt-5">
                <label for="namaProduk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="namaProduk">
            </div>
            <div class="mb-3">
                <label for="checkType" class="form-label">Tipe Produk</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                    Hotel
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                    Pesawat
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="inputStok" class="form-label">Stok</label>
                <input type="number" class="form-control" id="inputStok">
            </div>
            <button type="submit" class="btn btn-primary">Tambah Produk</button>
        </form>
    </div>
@endsection