@extends('layouts.admin.app')
@section('title', 'Crear Proyecto')
@section('breadcum', 'Crear Proyecto')
@section('volver', 'si')
@section('content')
    <div class="col-lg-10 offset-lg-1 col-12">
        <div id="alert-container">
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading">OPS! <label class="text-lowercase">Parece que faltán campos por
                            llenar...</label> </h4>
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
                <form action="{{ route('project.store') }}" method="post">
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
                    <div class="form-group">
                        <label for="name">Nombre del proyecto</label>
                        <input type="text" name="name" id="name"
                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
                        @if ($errors->has('name'))
                            <div class="invalid-feedback text-lowercase">
                                Ingresa un nombre..
                            </div>
                        @else
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        @endif
                    </div>


                    <div class="form-group">
                        <label for="phone_person">Cliente</label>
                        <select class="form-control {{ $errors->has('client_id') ? 'is-invalid' : '' }}" name="client_id">
                            <option disabled selected>Elije un cliente</option>
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
                        <label for="description">Locaciones</label>
                        <div id="contenedor">

                        </div>
                        <input id="panel" rows="3" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción del proyecto</label>
                        <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                    </div>
            </div>
        </div>
        <div class="pull-right">
            <button type="submit" class="btn btn-success btn-sm">Guardar</button>
            <a href="{{ route('project.index') }}" class="btn btn-link" type="submit">Cancelar</a>
            </form>
        </div>
    </div>


@stop
@section('script')
<script>
    $("#name").blur(function() {
        let name = this.value;
        let icon, type, mesaje;
        $.ajax({
            url: "{{ route('project.validateN') }}",
            type: 'POST',
            data: {
                "value": name,
                "_token": "{{ csrf_token() }}",
            },
            success: function(res) {
                var val = JSON.parse(res)
                if (val == null) {
                    icon = '<i class="far fa-check-circle"></i>';
                    type = "alert-success";
                    mensaje = "El campo nombre se encuentra disponible";
                } else {
                    icon = '<i class="far fa-times-circle"></i>';
                    type = "alert-danger";
                    mensaje = "El campo nombre se encuentra ocupado";
                }
                $('#alert-container').html('');
                var todo = '<div class="alert ' + type +
                    ' alert-dismissible fade show" role="alert">';
                todo += '<h4 class="alert-heading text-lowercase">';
                todo += icon + '&nbsp;&nbsp;';
                todo += mensaje + '</h4>';
                todo +=
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                todo += '<span aria-hidden="true">&times;</span>';
                todo += '</button>';
                todo += '</div>';
                $('#alert-container').append(todo);
            }
        });
    });

    function remove(id) {
        $("#" + id).remove();
        $("#data" + id).remove();
    }
    $("#panel").keydown(function(e) {
        if (e.which == 13) {
            label = $("#panel").val();
            $("#contenedor").append(
                '<a onclick="remove(this.id)" class="btn btn-default btn-inverse btn-rounded tags" id="' +
                $("#panel").val() + '" value="' + $("#panel").val() + '">' + label +
                '&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-close"></i> </a>');
            $("#contenedor").append('<input type="hidden" class="data" name="data[' + $("#panel")
                .val() + ']" id="data' + $("#panel")
                .val() + '" value="' + $("#panel").val() + '">');
            $("#panel").val("");
            return false;
        }
    });

</script>
@endsection
