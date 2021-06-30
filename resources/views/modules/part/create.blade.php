@extends('layouts.admin.app')
@section('title', 'Crear nueva parte')
@section('breadcum', 'Partes / Crear nueva parte')
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
                <form action="{{ route('part.store') }}" method="post" id="formparts">
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
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name"
                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">
                                Ingresa un nombre..
                            </div>
                        @else
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        @endif
                    </div>

                    <div class="form-group">

                        <label for="family_id">Familia</label>
                        <select name="family_id" id="family_id"
                            class="form-control {{ $errors->has('family_id') ? 'is-invalid' : '' }}">
                            <option disabled selected> elija una opción </option>
                            @forelse ($families as $family)
                                <option value="{{ $family->id }}">{{ $family->label }}</option>
                            @empty
                                <option disabled selected> No hay opciones disponibles </option>
                            @endforelse
                        </select>
                        @if ($errors->has('family_id'))
                            <div class="invalid-feedback">
                                Ingresa una familia..
                            </div>
                        @else
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="category_id">Categoria</label>
                        <select name="category_id" id="category_id"
                            class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
                            <option disabled selected> elija una opción </option>
                            @forelse ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->label }}</option>
                            @empty
                                <option disabled selected> No hay opciones disponibles </option>
                            @endforelse
                        </select>
                        @if ($errors->has('category_id'))
                            <div class="invalid-feedback">
                                Ingresa una categoria..
                            </div>
                        @else
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="category_id">Numero parte</label>
                        <input type="text" name="partNum" id="partNum"
                            class="form-control {{ $errors->has('partNum') ? 'is-invalid' : '' }}">
                        @if ($errors->has('partNum'))
                            <div class="invalid-feedback">
                                Ingresa un numero..
                            </div>
                        @else
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        @endif
                    </div>

                    <label for="CostU">Costo unitario</label>
                    <div class="input-icon  form-group">
                        <i class="fas fa-dollar-sign"></i>
                        <input type="text" name="CostU" onkeyup="format(this)" onchange="format(this)" id="CostU"
                            class="form-control  {{ $errors->has('CostU') ? 'is-invalid' : '' }}">
                        @if ($errors->has('CostU'))
                            <div class="invalid-feedback">
                                Ingresa un costo unitario..
                            </div>
                        @else
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        @endif
                    </div>

            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h3 class="d-inline ml-3"><small>Atributos de control</small></h3>

                <div class="form-group mt-4">

                    <label class="mb-4">Campos de control</label><br>
                    @php
                        $cont = 0;
                    @endphp

                    @forelse ($controlfills as $fill)
                        @php
                            $cont + $cont++;
                        @endphp
                        <div class="d-block">
                            <div class="toggle-checkbox toggle-success toggle-sm d-inline">

                                <input type="checkbox" name="toggle[{{ $cont }}]" id="toggle{{ $cont }}"
                                    value="{{ $fill->id }}">
                                <label class="m-0 p-0 " for="toggle{{ $cont }}">

                                </label>

                            </div>
                            <h3 class="d-inline ml-4"><small>{{ $fill->label }}</small></h3>
                        </div>

                    @empty
                        <label> No hay opciones disponibles </label>
                    @endforelse

                </div>



            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4>Valor por cliente</h4>

                <div class="form-group">
                    <label for="client_id">Cliente</label>
                    <select name="client_id" id="client_id" class="form-control">
                        <option disabled selected> elija una opción </option>
                        @forelse ($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                        @empty
                            <option disabled selected> No hay opciones disponibles </option>
                        @endforelse
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">valor cliente</label>
                    <div id="contenedor">

                    </div>
                    <div class="input-icon form-group">
                        <i class="fas fa-dollar-sign"></i>
                        <input name="panel" id="panel" rows="3" class="form-control" type="number" onkeyup="format(this)" onchange="format(this)">
                    </div>
                </div>

            </div>
        </div>
        <div class="float-right">
            <button class="btn btn-success" type="button" id="btnsave">Guardar</button>
            <a href="{{ route('part.index') }}" class="btn btn-link" type="submit">Cancelar</a>
            </form>
        </div>
    </div>


@stop

@section('script')
    <script>
        function format(input) {
            var num = input.value.replace(/\./g, '');
            if (!isNaN(num)) {
                num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
                num = num.split('').reverse().join('').replace(/^[\.]/, '');
                input.value = num;
            } else {
                alert('Solo se permiten numeros');
                input.value = input.value.replace(/[^\d\.]*/g, '');
            }
        }
        $("#partNum").blur(function() {
            let internalN = this.value;
            let icon, type, mesaje;
            $.ajax({
                url: "{{ route('part.validateN') }}",
                type: 'POST',
                data: {
                    "value": internalN,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(res) {
                    var val = JSON.parse(res)
                    if (val == null) {
                        icon = '<i class="far fa-check-circle"></i>';
                        type = "alert-success";
                        mensaje = "El campo numero interno se encuentra disponible";
                    } else {
                        icon = '<i class="far fa-times-circle"></i>';
                        type = "alert-danger";
                        mensaje = "El campo numero interno se encuentra ocupado";
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
        $("#panel").keydown(function(e) {
            if (e.which == 13) {
                $("#contenedor").append(
                    '<a onclick="remove(this.id)" class="btn btn-default btn-inverse btn-rounded tags" id="' +
                    $("#panel").val() + '" value="' +
                    $("#client_id option:selected").text() + ' - ' + $("#panel").val() + '">' + $(
                        "#client_id option:selected").text() + ' - ' + $("#panel").val() +
                    '&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-close"></i> </a>');
                $("#contenedor").append('<input type="hidden" class="data" name="data" id="data' + $("#panel")
                    .val() + '" name="data" value="' + $(
                        "#client_id").val() + ' , ' + $("#panel").val() + '">');
                $("#panel").val("");
                $("#client_id").val("");
                return false;
            }
        });

        function remove(id) {
            $("#" + id).remove();
            $("#data" + id).remove();
        }
        $("#btnsave").click(function() {

            name = $("#name").val();
            family_id = $("#family_id").val();
            category_id = $("#category_id").val();
            partNum = $("#partNum").val();
            CostU = $("#CostU").val();
            Client_id = $("#client_id").val();


            cont = 0;
            name != '' ? cont = 0 : cont = 1;
            family_id != '' ? cont = 0 : cont = 1;
            category_id != '' ? cont = 0 : cont = 1;
            partNum != '' ? cont = 0 : cont = 1;
            CostU != '' ? cont = 0 : cont = 1;
            Client_id == 0 ? cont = 1 : cont = 0;

            if (cont == 0) {
                var listdata = [];
                $('.data').each(function() {
                    listdata.push(this.value);
                });
                if (listdata != '') {
                    $.ajax({
                        url: "{{ route('part.clientv') }}",
                        type: 'POST',
                        data: {
                            "data": listdata,
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(res) {
                            console.log(res)
                            $("#formparts").submit();
                        }
                    });
                } else {
                    $("#formparts").submit();
                }
            } else {
                $("#formparts").submit();
            }
        });

    </script>
@endsection
