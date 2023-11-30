@extends('layouts.app_login')

@section('login')

<div class="page-header min-vh-100" style="">

    <span class="mask"></span>

    <div class="container">
        <div class="row justify-content-center">

          <div class="col-lg-4 col-md-7">

            <div class="card card_login mt-5 mb-5">
              <div class="card-header border_card_header">

                <img class="img_login_header" src="{{ asset('assets/media/img/ilustraciones/sobreexpuesto2.webp') }}" alt="">

                <h5 class="text-dark text-center tittle_login mt-2 mb-3">
                    ¡BIENVENIDO!
                </h5>

              </div>

              <div class="card-body px-3">
                <form method="POST" action="{{ route('login') }}" class="row">

                  @csrf

                  <div class="form-group col-12 mb-3">
                      <label for="name" class="label_custom_primary_Dark">Celular :</label>
                      <div class="input-group ">
                          <span class="input-group-text span_custom_primary_dark" id="basic-addon1">
                              <img class="icon_span_form" src="{{ asset('assets/media/icons/telefono-movil.webp') }}" alt="" width="35px">
                          </span>
                          <input id="email" type="number" class="form-control input_custom_primary_dark @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>

                  <div class="form-group col-12 mb-3">
                    <label for="name" class="label_custom_primary_Dark">Contraseña :</label>
                    <div class="input-group ">
                        <span class="input-group-text span_custom_primary_dark" id="basic-addon1">
                            <img class="icon_span_form" src="{{ asset('assets/media/icons/encerrar.webp') }}" alt="" width="35px">
                        </span>
                        <input id="password" type="password" class="form-control input_custom_primary_dark @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>

                  <div class="form-group col-12 mb-2">
                    <label for="name" class="label_custom_primary_Dark"></label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" id=" customCheckLogin" type="checkbox" name="remember" id="remember"{{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="rememberMe">Recuerdame</label>
                      </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn_gradient_primary w-100 mt-3 mb-3"> Iniciar Sesion</button>
                  </div>

                </form>
              </div>

            </div>
          </div>

        </div>
    </div>
</div>

@endsection
