@extends('layouts.admin.app')
@section('title', 'Editar Componente')
@section('breadcum', 'Editar Componente')
@section('volver', 'si')
@section('content')
    <div class="col-lg-10 offset-lg-1 col-12">
        <div id="alert-container">
        </div>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">OPS! <label class="text-lowercase">Parece que faltán campos por llenar...</label>
                </h4>
                <hr>
                <ul class="list-unstyled">
                    @php
                        $cont = 1;
                    @endphp
                    @foreach ($errors->all() as $error)
                        <li class="text-lowercase">{{ $cont++ . '. ' }}<label
                                class="text-capitalize">El&nbsp;</label>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <form action="{{ route('component.update', $component->id) }}" method="post" id="formComponent">
                    @method('PUT')
                    @csrf
                    <div class="form-group mt-4">

                        <div class="row">
                            <div class="col-md-2 offset-md-9">
                                <label for="state" class="float-right">Activo</label>
                            </div>
                            <div class="col-md-1">
                                <div class="toggle-checkbox toggle-success checkbox-inline toggle-sm float-right">
                                    <input type="checkbox" name="state" id="state"
                                        {{ $component->state ? 'checked value=1' : '' }}>
                                    <label for="state"></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="iditem" id="iditem" value="{{ $id }}">
                    <div class="form-group">
                        <label for="client_id">Cliente</label>
                        <select class="form-control {{ $errors->has('client_id') ? 'is-invalid' : '' }}" name="client_id">
                            <option disabled selected></option>
                            @forelse ($clients as $client)
                                <option value="{{ $client->id }}"
                                    {{ $client->id == $component->client_id ? 'selected' : '' }}>{{ $client->name }}
                                </option>
                            @empty
                                <option disabled>No hay informacion.</option>
                            @endforelse
                        </select>
                        @if ($errors->has('client_id'))
                            <div class="invalid-feedback">
                                Ingresa un cliente..
                            </div>
                        @else
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="project_id">Proyecto</label>
                        <select class="form-control {{ $errors->has('project_id') ? 'is-invalid' : '' }}"
                            name="project_id">
                            <option disabled selected></option>
                            @forelse ($projects as $project)
                                <option value="{{ $project->id }}"
                                    {{ $project->id == $component->project_id ? 'selected' : '' }}>
                                    {{ $project->name }}
                                </option>
                            @empty
                                <option disabled>No hay informacion.</option>
                            @endforelse
                        </select>
                        @if ($errors->has('project_id'))
                            <div class="invalid-feedback">
                                Ingresa un proyecto..
                            </div>
                        @else
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        @endif
                    </div>
                    @foreach ($controlfills as $cf)

                        <div class="form-group">
                            @foreach ($controlPart as $c)

                                @if ($c->valist_id == $cf->id)
                                    @if ($cf->id == 11 || $cf->id == 10)
                                        <label for="">{{ $cf->label }}</label>
                                        <input type="date" name="cf[{{ $c->id }}]" id="name" class="form-control"
                                            value="{{ $c->value }}">
                                    @else
                                        @if ($c->valist_id = 9)
                                            <label for="">{{ $cf->label }}</label>
                                            <input type="text" name="cf[{{ $c->id }}]" id="cf[{{ $cf->id }}]"
                                                class="form-control" value="{{ $c->value }}"
                                                onchange="validSerial($(this))">
                                        @else
                                            <label for="">{{ $cf->label }}</label>
                                            <input type="text" name="cf[{{ $c->id }}]" id="cf[{{ $cf->id }}]"
                                                class="form-control" value="{{ $c->value }}">
                                        @endif
                                    @endif

                                @endif
                            @endforeach

                        </div>
                    @endforeach
            </div>
        </div>

        <div class="pull-right">
            <button type="button" class="btn btn-success btn-sm" id="validate">Guardar</button>
            <a href="{{ route('component.index') }}" class="btn btn-link">Cancelar</a>
        </div>
        </form>
    </div>
@stop
@section('script')
    <script>
        $("#validate").click(function() {
            var values = document.getElementById("cf[9]");
            if (values.value) {
                $("#formComponent").submit();
            } else {
                var todo = '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                todo += '<h4 class="alert-heading">';
                todo += '<i class="far fa-times-circle"></i>&nbsp;&nbsp;';
                todo += 'El campo serial se encuentra vacio</h4>';
                todo += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                todo += '<span aria-hidden="true">&times;</span>';
                todo += '</button>';
                todo += '</div>';
                $('#alert-container').html(todo);
            }
        });

        function validSerial(values) {
            var project = $('#project_id').val();
            resp = values.val();
            if (project) {
                $.ajax({
                    url: "{{ route('component.validSerial') }}",
                    type: 'POST',
                    data: {
                        "data": resp,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(res) {
                        var val = JSON.parse(res)
                        var mensaje;
                        var type;
                        var icon;
                        $('#alert-container').html('');
                        switch (val) {
                            case '1':
                                icon = '<i class="far fa-times-circle"></i>';
                                type = "alert-danger";
                                mensaje = "El serial/Consecutivo que escribiste no es valido";
                                break;
                            case '2':
                                icon = '<i class="far fa-times-circle"></i>';
                                type = "alert-danger";
                                mensaje =
                                    "El serial/Consecutivo que escribiste ya se encuentra registrado, intenta con otro";
                                break;
                            case '3':
                                icon = '<i class="far fa-check-circle"></i>';
                                type = "alert-success";
                                mensaje = "El serial/Consecutivo que escribiste se encuentra disponible";

                                break;
                            default:
                                console.log('default');

                        }
                        var todo = '<div class="alert ' + type + ' alert-dismissible fade show" role="alert">';
                        todo += '<h4 class="alert-heading" style="text-transform:none;">';
                        todo += '<i class="far fa-times-circle"></i>&nbsp;&nbsp;';
                        todo += mensaje + '</h4>';
                        todo += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                        todo += '<span aria-hidden="true">&times;</span>';
                        todo += '</button>';
                        todo += '</div>';
                        $('#alert-container').append(todo);
                    }
                });
            }
        }

    </script>

@endsection
