@extends('layouts.admin.app')
@section('title', 'Crear Componente')
@section('breadcum', 'Crear Componente')
@section('volver', 'si')
@section('content')
    <div class="col-lg-10 offset-lg-1 col-12">
        <div id="alert-container">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading">OPS! <label class="text-lowercase">Parece que faltán campos por llenar...</label> </h4>
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
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('component.store') }}" method="post" id="formComponent">
                    @csrf
                    <div class="form-group mt-4">
                        <div class="row">
                            <div class="col-md-2 offset-md-9">
                                <label for="state" class="float-right">Activo</label>
                            </div>
                            <div class="col-md-1">
                                <div class="toggle-checkbox toggle-success checkbox-inline toggle-sm float-right">
                                    <input type="checkbox" name="state" id="state" checked>
                                    <label for="state"></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="id" id="id" value="{{ $id }}">

                    <div class="form-group">
                        <label for="client_id">Cliente</label>
                        <select class="form-control {{ $errors->has('project_id') ? 'is-invalid' : '' }}"
                            name="client_id">
                            <option disabled selected></option>
                            @forelse ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                            @empty
                                <option disabled>No hay informacion.</option>
                            @endforelse
                        </select>
                        @if ($errors->has('client_id'))
                            <div class="invalid-feedback text-lowercase">
                                Selecciona un cliente..
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
                            name="project_id" id="project_id">
                            <option disabled selected></option>
                            @forelse ($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @empty
                                <option disabled>No hay informacion.</option>
                            @endforelse
                        </select>
                        @if ($errors->has('project_id'))
                            <div class="invalid-feedback text-lowercase">
                                Selecciona un projecto..
                            </div>
                        @else
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        @endif
                    </div>
                    @foreach ($control as $c)
                        <div class="form-group">
                            @foreach ($controlfills as $cf)
                                @if ($cf->id == $c->valist_id && $c->value == '')
                                    @if ($cf->id == 10 || $cf->id == 11 || $cf->id == 12 || $cf->id == 13)
                                        <label for="">{{ $cf->label }}</label>
                                        <input type="date" name="cf[{{ $c->valist_id }}]" id="name" class="form-control" required>
                                    @else
                                        @if ($cf->id = 9 || $cf->id == 14 || $cf->id == 15 || $cf->id == 16 || $cf->id == 17 || $cf->id == 18)
                                            <label for="">{{ $cf->label }}</label>
                                            <input type="text" name="cf[{{ $c->valist_id }}]"
                                                id="cf[{{ $c->valist_id }}]" class="form-control" {{ $c->valist_id == 9 ? "onblur=validSerial($(this))" : '' }} required>

                                        @endif

                                    @endif

                                @endif
                            @endforeach

                        </div>
                    @endforeach
            </div>
        </div>
        <div class="pull-right">
            <button type="submit" class="btn btn-success btn-sm" id="validate">Guardar</button>
            <a href="{{ route('component.index') }}" class="btn btn-link" type="submit">Cancelar</a>
        </div>
        </form>
    </div>

@stop
@section('script')
    <script>
        $("#validate").click(function(){
            var values = document.getElementById("cf[9]");
            if (values.value){
                $("#formComponent").submit();
            }else{
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
           
            if(project){
                resp = values.val();
                $.ajax({
                    url: "{{ route('component.validSerial') }}",
                    type: 'POST',
                    data: {
                        "data": resp,
                        "project": project,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(res) {
                        var val = JSON.parse(res)
                        console.log(val);
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
                                mensaje = "El serial/Consecutivo que escribiste ya se encuentra registrado, intenta con otro";            
                                break;
                            case '3':
                                icon = '<i class="far fa-check-circle"></i>';
                                type = "alert-success";
                                mensaje = "El serial/Consecutivo que escribiste se encuentra disponible";            
                                
                                break;
                            default:
                            console.log('default');
                                
                        }
                        var todo = '<div class="alert '+type+' alert-dismissible fade show" role="alert">';
                        todo += '<h4 class="alert-heading text-lowercase" style="text-transform:none;">';
                        todo += icon+'&nbsp;&nbsp;';
                        todo += mensaje+'</h4>';
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
