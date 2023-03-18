@extends('layout/app')

@section('content')
    <div class="index">
        <div class="formlogin">
            <form action="/sesi/login" method="POST">
                @csrf
                <h2 class="text-center">Booking App</h2>
                <div class="mb-3 ">
                    <label for="inputEmail" class="form-label"></label>
                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="email">
                </div>
                <div class="mb-3">
                    <label for="inputPassword" class="form-label"></label>
                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="password">
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" name="submit" class="btn btn-outline-light">Masuk</button>
                </div>
            </form>
        </div>
    </div>
@endsection
