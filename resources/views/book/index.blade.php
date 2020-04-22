@extends('auth.main')

@section('title')
    Buku Tamu
@endsection

@section('content')
 <!-- Header -->
 <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
    <div class="container">
      <div class="header-body text-center mb-7">

      </div>
    </div>
    <div class="separator separator-bottom separator-skew zindex-100">
      <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
        <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
      </svg>
    </div>
  </div>
  <!-- Page content -->
  <div class="container mt--8 pb-5">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card bg-secondary border-0 mb-0">

          <div class="card-body px-lg-8 py-lg-8">
            <div class="text-center text-muted mb-4">
             <b> <h2>Buku Tamu</h2></b>
            </div>
            <form method="POST" role="form" action="{{ route('login') }}">
                @csrf
              <div class="form-group mb-3">
                <div class="input-group input-group-merge input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input value="{{ old('email') }}" required autocomplete="email" autofocus class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" type="email">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
                </div>
              </div>
              <div class="form-group mb-3">
                <div class="input-group input-group-merge input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                  </div>
                  <input value="{{ old('email') }}" required autocomplete="email" autofocus class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" type="email">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-merge input-group-alternative">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                  </div>
                  <input class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password" type="password">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                    @enderror
                </div>
              </div>
              <div class="custom-control custom-control-alternative custom-checkbox">
                <input class="custom-control-input"  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="custom-control-label" for="remember">
                  <span class="text-muted">Remember me</span>
                </label>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary my-4">Login</button>
              </div>
            </form>
          </div>
        </div>
        <div class="row mt-3">


        </div>
      </div>
    </div>
  </div>
@endsection
