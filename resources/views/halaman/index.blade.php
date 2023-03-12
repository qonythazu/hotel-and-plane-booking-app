@extends('layout/app')

@section('content')
        <div class="formlogin" style="
            box-sizing: border-box;
            width: 600px;
            padding: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: solid gainsboro;
            border-radius: 10px;
        ">
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
                    <button type="submit" class="btn btn-primary">
                        <a href="/dashboard_admin">Masuk</a>
                    </button>
                </div>
            </form>
        </div>
@endsection
