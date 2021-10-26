@extends('layouts.admin.app')
@section('title', 'Mi perfil')
@section('breadcum', 'Mi perfil')
@section('volverU', 'si')
@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12" id="notification_update">

                    </div>
                    <div class="col-lg-3 offset-lg-1 col-md-4">
                        <div class="widget-profile-1 card">
                            <div class="profile border bottom">
                                <form action="{{ route('user.updatePhoto') }}" method="POST" enctype="multipart/form-data"
                                    id="fileUploadForm">

                                    @csrf
                                    <label for="profile_photo_path" class="pointer mb-0 mt-3">
                                        @if ($user->profile_photo_path)

                                            <img src="{{ asset('storage') . '/' . $user->profile_photo_path }}" alt=""
                                                width="200px" class="img-circle">
                                        @else
                                            <img src="https://i.pinimg.com/originals/51/f6/fb/51f6fb256629fc755b8870c801092942.png"
                                                alt="" width="80px">
                                        @endif
                                        <input class="d-none" type="file" name="profile_photo_path" multiple=""
                                            id="profile_photo_path">
                                    </label>

                                </form>
                                <h4 class="mrg-top-20 no-mrg-btm text-semibold">{{ ucwords($user->name) }}</h4>
                                <p>
                                    @forelse ($charges as $charge)
                                        {{ $charge->id == $user->charge_id ? ucwords($charge->label) : '' }}
                                    @empty
                                        {{ __('Cargo no encontrado') }}
                                    @endforelse
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 end col-md-8">
                        <div class="card">
                            <div class="card-heading border bottom">
                                <h4 class="card-title">Información general</h4>
                            </div>
                            <div class="card-block">
                                <form action="{{ route('user.update', $user->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        {{-- <div class="col-md-2 offset-md-9">
                                            <label for="state" class="float-right"
                                                {{ $user->state == 1 ? 'checked' : '' }}>Activo</label>
                                        </div>
                                        <div class="col-md-1">
                                            <div
                                                class="toggle-checkbox toggle-success checkbox-inline toggle-sm float-right">
                                                <input type="checkbox" name="state" id="state">
                                                <label for="state"></label>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="mrg-top-10 text-dark"> <b>Nombre</b></p>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="mrg-top-10 form-control" name="name"
                                                value="{{ ucwords($user->name) }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="mrg-top-10 text-dark"> <b>Cedula</b></p>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="mrg-top-10 form-control" name="dni"
                                                value="{{ ucwords($user->dni) }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="mrg-top-10 text-dark"> <b>Correo</b></p>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="email" name="email" class="mrg-top-10 form-control"
                                                value="{{ ucwords($user->email) }}">
                                        </div>
                                    </div>


                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-outline-info mt-4 btn-sm" data-toggle="modal"
                                        data-target="#exampleModal">
                                        Cambiar contraseña
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Cambiar contraseña
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <div class="mb-3">

                                                            <label for="">Contraseña nueva</label>
                                                            <input type="text" name="" id="" class="form-control">
                                                        </div>
                                                        <div class="mb-3">

                                                            <label for="">Repita contraseña</label>
                                                            <input type="text" name="" id="" class="form-control">
                                                        </div>
                                                    </div>
                                                    <button type="button"
                                                        class="btn btn-outline-success pull-right">Actualizar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="mrg-top-10">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class=" text-dark"> <b>Cargo</b></p>
                                        </div>
                                        <div class="col-md-6">

                                            {{ $user->charname ? ucwords($user->charname) : 'N/A' }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class=" text-dark"> <b>Rol</b></p>
                                        </div>
                                        <div class="col-md-6">
                                            @php
                                                $rol = auth()
                                                    ->user()
                                                    ->getRolenames();
                                                echo $rol->first() != '' ? $rol->first() : 'Sin Rol';
                                            @endphp
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class=" text-dark"> <b>Cliente</b></p>
                                        </div>
                                        <div class="col-md-6">
                                            {{ $user->cname ? ucwords($user->cname) : 'N/A' }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class=" text-dark"> <b>Proyecto</b></p>
                                        </div>
                                        <div class="col-md-6">
                                            {{ $user->pname ? ucwords($user->pname) : 'N/A' }}
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
@section('script')
    <script>
        $("#profile_photo_path").change(function() {
            $("#fileUploadForm").submit();
            // $.ajax({
            //     url: '{{ route('user.updatePhoto') }}',
            //     method: 'POST',
            //     data: {
            //         value: $('#profile_photo_path').attr('files'),
            //         _token: $('input[name="_token"]').val()
            //     }
            // }).done(function(res) {
            //     console.log(res);
            //     var arreglo = JSON.parse(res);
            //     // var arreglo = JSON.parse(res);
            //     // $('#contenendor').html('');
            //     // for (let x = 0; x < arreglo.length; x++) {
            //     //     id = arreglo[x].id;
            //     //     name = arreglo[x].name;
            //     //     state = arreglo[x].state;
            //     //     state = state ? 'Activo' : 'Inactivo';
            //     //     var todo = '<a href="client/' + id +
            //     //         '/edit" class="card-body border bottom col-12 text-capitalize">';
            //     //     todo += '<div class="row">';
            //     //     todo += '<div class="col-10">';
            //     //     todo += '<h3 style="mb-0"><small>' + name + '</small></h4>';
            //     //     todo += '<p class="mb-0"> ' + state + ' </p> ';
            //     //     todo += '</div>';
            //     //     todo += '<div class="col-2">';
            //     //     todo += '<p class="float-right">';
            //     //     todo += 'hola'
            //     //     todo += '</p>';
            //     //     todo += '</div>';
            //     //     todo += '</div>';
            //     //     todo += '</a>';
            //     //     $('#contenendor').append(todo);

            //     // }
            // });
        });
    </script>
@endsection
