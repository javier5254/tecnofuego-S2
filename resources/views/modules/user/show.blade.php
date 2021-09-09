@extends('layouts.admin.app')
@section('title', 'Mi perfil')
@section('breadcum', 'Mi perfil')
@section('volverU', 'si')
@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-3 offset-lg-1 col-md-4">
                        <div class="widget-profile-1 card">
                            <div class="profile border bottom">
                                <form action="{{route("user.updatePhoto")}}" method="POST" enctype="multipart/form-data" id="fileUploadForm">
                                    
                                    @csrf
                                    <label for="profile_photo_path" class="pointer mb-0 mt-3">
                                        @if ($user->profile_photo_path)
    
                                            <img src="{{ asset('storage') . '/' . $user->profile_photo_path }}" alt=""
                                                width="200px" class="img-circle">
                                        @else
                                            <img src="https://i.pinimg.com/originals/51/f6/fb/51f6fb256629fc755b8870c801092942.png"
                                                alt="" width="80px">
                                        @endif
                                        <input class="d-none" type="file" name="profile_photo_path" multiple="" id="profile_photo_path">
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
                                        <div class="col-md-2 offset-md-9">
                                            <label for="state" class="float-right"
                                                {{ $user->state == 1 ? 'checked' : '' }}>Activo</label>
                                        </div>
                                        <div class="col-md-1">
                                            <div
                                                class="toggle-checkbox toggle-success checkbox-inline toggle-sm float-right">
                                                <input type="checkbox" name="state" id="state">
                                                <label for="state"></label>
                                            </div>
                                        </div>
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
                                    <hr class="mrg-top-30">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="mrg-top-10 text-dark"> <b>Cargo</b></p>
                                        </div>
                                        <div class="col-md-6">
                                            @forelse ($charges as $charge)
                                                <p class="mrg-top-10">
                                                    {{ $charge->id == $user->charge_id ? ucwords($charge->label) : '' }} </p>
                                            @empty
                                                <p class="mrg-top-10"> Sin coincidencias</p>
                                            @endforelse
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="mrg-top-10 text-dark"> <b>Rol</b></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="mrg-top-10"> Sin coincidencias</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="mrg-top-10 text-dark"> <b>Cliente</b></p>
                                        </div>
                                        <div class="col-md-6">
                                            @forelse ($clients as $client)
                                                <p class="mrg-top-10">
                                                    {{ $client->id == $user->client_id ? $client->name : 'Sin coincidencias' }}
                                                </p>
                                            @empty
                                                <p class="mrg-top-10"> Sin coincidencias</p>
                                            @endforelse
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="mrg-top-10 text-dark"> <b>Proyecto</b></p>
                                        </div>
                                        <div class="col-md-6">
                                            @forelse ($projects as $project)
                                                <p class="mrg-top-10">
                                                    {{ $project->id == $user->project_id ? $project->name : 'Sin coincidencias' }}
                                                </p>
                                            @empty
                                                <p class="mrg-top-10"> Sin coincidencias</p>
                                            @endforelse
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
            //     url: '{{route("user.updatePhoto")}}',
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
