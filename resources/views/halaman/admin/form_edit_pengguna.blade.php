@extends('layout/app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <h1 class="text-center mb-4">Edit User</h1>
        <main class="form-adduser">
          <form action="{{ route('daftar_akun.update', $user->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="form-floating">
              <input type="text" name="name" class="form-control  @error('name')is-invalid @enderror" id="name" placeholder="Name Example" required value="{{ $user->name }}">
              <label for="name">Nama</label>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ $user->email }}">
                <label for="email">Email</label>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="formselect">
                <select class="form-select" aria-label="Default select example" name="role_id" required>
                    <option> </option>
                    @foreach ($roles as $role)
                        @if($role['id']>1)
                            @if (($user->role_id) == $role->id)
                                <option value="{{ $role->id }}" selected> {{ $role->role }} </option>
                            @else
                                <option value="{{ $role->id }}"> {{ $role->role }} </option>
                            @endif
                        @endif
                    @endforeach
                </select>
            </div>

            <button class="w-100 btn btn-outline-light mt-4" type="submit">Perbarui</button>
            <a href="/daftar_akun" class="w-100 btn btn-outline-light mt-2">Batal</i></a>
          </form>
        </main>
    </div>
</div>

@endsection
