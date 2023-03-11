@extends('layout/app')

@section('content')
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="formlogin">
            <form>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3">
                    </div>
                </div>
                <a href="pengguna_book_hotel.html">anu</a><br>
                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
        </div>
    </div>
@endsection
