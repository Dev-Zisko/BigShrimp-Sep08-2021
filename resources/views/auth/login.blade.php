@extends('layouts.404')

@section('content')

    <div style="margin: 0 auto; margin-top: 165px;" class="col-md-4">
      <div style="width: 350px; margin-left: -60px;" class="free-quote bg-dark h-100">
        <h2 class="my-4 heading  text-center">Login</h2>
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror btn-block" id="email" name="email" placeholder="Ingresar correo electrónico..." value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group mb-4">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror btn-block" id="password" name="password" placeholder="Ingresar contraseña..." required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <input type="submit" class="btn btn-primary text-white py-2 px-4 btn-block" value="Entrar">  
          </div>
        </form>
      </div>
    </div>

@endsection
