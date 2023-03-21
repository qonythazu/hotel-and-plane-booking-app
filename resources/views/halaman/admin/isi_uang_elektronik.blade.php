@extends('layout/app')

@section('content')
    <div class="column p-5">
        <div class="nambah-uang">
            <h4>Isi Uang Elektronik</h4>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
            <div class="hasil-pencarian bgback p-3 m-3 text-white rounded-2">
                <h5>Putri Qonita Arif</h5>
                <div class="row mb-3">
                    <label for="inputMoney" class="col-sm-4 col-form-label">Jumlah :</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputMoney">
                        <button class="btn btn-outline-light mt-2">YES</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection