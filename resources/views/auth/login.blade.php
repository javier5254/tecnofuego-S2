@extends('layouts.admin.components.app')
@section('title', 'Login')
@section('breadcum', 'Login')
@section('volver', 'si')
@section('content')


    <div class="col-12 col-md-7 col-lg-4 mx-auto full-height height-100 d-flex align-items-center">
        <div class="col-12 mt-4">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading">OPS! <label class="text-lowercase">Parece que hubo error...</label> </h4>
                    <hr>
                    <ul class="list-unstyled">
                        @php
                            $cont = 1;
                        @endphp
                        @foreach ($errors->all() as $error)
                            <li class="text-uppercase"> {{$cont++.'. R'}}<label class="text-lowercase">ectifica tu correo o contraseña</label></li>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card w-100 ">
                <div class="card-body">
                    <div class="my-3 overflow-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="420"
                            height="57.5" viewBox="0 0 323 57.5">
                            <defs>
                                <pattern id="pattern" preserveAspectRatio="none" width="100%" height="100%"
                                    viewBox="0 0 191 189">
                                    <image width="191" height="189"
                                        xlink:href="data:image/png;base64,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" />
                                </pattern>
                            </defs>
                            <g id="Grupo_237" data-name="Grupo 237" transform="translate(-460 -154.5)">
                                <rect id="NoPath_-_copia" data-name="NoPath - copia" width="55" height="54"
                                    transform="translate(413 158)" fill="url(#pattern)" />
                                <text id="TECNO_FUEGO" data-name="TECNO FUEGO" transform="translate(472.5 179.5)"
                                    fill="#707070" stroke="#707070" stroke-width="1" font-size="23"
                                    font-family="Interstate-RegularComp, Interstate Comp" letter-spacing="0.05em">
                                    <tspan x="0" y="0">TECNO FUEGO</tspan>
                                </text>
                                <text id="Sistema_de_Registro_de_Actividades_y_Componentes_SIRAC"
                                    data-name="Sistema de Registro de Actividades y Componentes  SIRAC"
                                    transform="translate(473 205)" fill="#707070" font-size="13"
                                    font-family="Interstate-RegularComp, Interstate Comp">
                                    <tspan x="0" y="0" xml:space="preserve">Sistema de Registro de Actividades y Componentes
                                        SIRAC</tspan>
                                </text>
                            </g>
                        </svg>

                    </div>
                    <p class="mt-4 info-login" style="text-transform: none;">Ingrese a su cuenta SIDERAC 2.0</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <x-jet-input id="email" class="form-control" type="email" name="email" :value="old('email')"
                            autocomplete="username email" required autofocus placeholder="Su correo electrónico" />
                        </div>

                        {{-- <div class=" input-icon form-group">
                            <x-jet-input id="password" class="form-control" type="password" name="password" required
                                placeholder="Contraseña" autocomplete="current-password" />
                            <a class="pull-right" onclick="mostrarContrasena()">
                                <i class="ti-eye input-group-append"></i>
                            </a>
                        </div> --}}
                        <div class="mb-3">
                            <div class="input-group auth-pass-inputgroup">
                                <x-jet-input id="password" class="form-control" type="password" name="password" required
                                placeholder="Contraseña" autocomplete="current-password" />
                                <a class="btn btn-info btn-rounded btn-inverse end" onclick="mostrarContrasena()">
                                    <i class="ti-eye input-group-append"></i>
                                </a>
                            </div>
                        </div>


                        <div class="col-12 p-0">
                            <label for="remember_me" class="flex items-center">
                                <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                                <small class="text-custom">{{ __('Recordarme') }}</small>
                            </label>
                            <button class="btn btn-success pull-right">
                                {{ __('Iniciar sesion') }}
                            </button><br>

                        </div>
                        <div class="col-12 p-0">
                            <div class="mt-5">
                                @if (Route::has('password.request'))
                                    <a class="text-sm" href="{{ route('password.request') }}">
                                        <small>
                                            {{ __('¿Olvidaste la contraseña?') }}
                                        </small>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>



    @stop

    @section('script')
        <script>
            function mostrarContrasena() {
                var tipo = document.getElementById("password");
                if (tipo.type == "password") {
                    tipo.type = "text";
                } else {
                    tipo.type = "password";
                }
            }

        </script>
    @endsection
