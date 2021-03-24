@extends('layouts.login')
@section('content')
  <body>
    <!-- login page start-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-5"><img class="bg-img-cover bg-center" src="{{ asset('images/login/3.jpg') }}" alt="looginpage"></div>
        <div class="col-xl-7 p-0">
          <div class="login-card">
            <div>
              <div><a class="logo text-start" href="/"><img style="max-width: 200px" class="img-fluid for-light" src="{{ asset('images/logo/login.png') }}" alt="looginpage"><img class="img-fluid for-dark" src="{{ asset('images/logo/logo_dark.png') }}" alt="looginpage"></a></div>
              <div class="login-main">
                <form class="theme-form" method="POST" action="{{ route('login') }}">
                    @csrf
                  <h4>Masuk</h4>
                  <p>Gunakan email & password untuk login</p>
                  <div class="form-group">
                    <label class="col-form-label">Email</label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Password</label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                      <div class="show-hide"><span class="show">                         </span></div>
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                      @enderror
                  </div>
                  <div class="form-group mb-0">
                    <div class="checkbox p-0">
                      <input id="checkbox1" type="checkbox">
                      <label class="text-muted" for="checkbox1">Inagt Password</label>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">Masuk</button>
                  </div>
{{--                  <p class="mt-4 mb-0">Tidak Punya Akun?<a class="ms-2" href="/register">Buat Akun</a></p>--}}
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
@endsection
<!-- Mirrored from admin.pixelstrap.com/cuba/theme/login_two.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Feb 2021 15:06:46 GMT -->

