@extends('layout/app')

@section('content')
        <div class="formlogin">
            <form>
                <div class="mb-3 ">
                    <label for="inputEmail3" class="form-label"></label>
                    <input type="email" class="form-control" id="inputEmail3" placeholder="email">
                </div>
                <div class="mb-3">
                    <label for="inputPassword3" class="form-label"></label>
                    <input type="password" class="form-control" id="inputPassword3" placeholder="password">
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary">Masuk</button>
                    <a href="/halaman_mitra">Masuk</a>
                </div>
            </form>
        </div>
@endsection
