@extends('layout/app')

@section('content')
    <div class="index">
        <div class="formlogin">
            <h2 class="text-center">Booking App</h2>
            @if(session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form action="/sesi/login" method="POST">
                @csrf
                <div class="formlog">
                    <label for="inputEmail" class="form-label"></label>
                    <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="inputEmail" placeholder="email" required>
                    @error('email')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="formlog">
                    <label for="inputPassword" class="form-label"></label>
                    <input type="password" name="password" class="form-control  @error('password')is-invalid @enderror" id="inputPassword" placeholder="password" required>
                    @error('password')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="d-grid gap-2 d-md-flex mt-4 justify-content-md-end">
                    <button type="submit" name="submit" class="btn btn-outline-light">Masuk</button>
                </div>
            </form>
        </div>
    </div>
@endsection
