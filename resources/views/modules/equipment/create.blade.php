@extends('layouts.admin.app')
@section('title', 'Crear Equipo')
@section('breadcum', ' Crear Equipo')
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
        {{-- info general --}}
        <div class="card">
            <div class="card-body">
                <form action="{{ route('equipment.store') }}" method="POST" id="formEquipment">
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
                        <label for="client_id">Cliente</label>
                        <div id="containerValues">

                        </div>
                        <select name="client_id" id="client_id"
                            class="form-control {{ $errors->has('client_id') ? 'is-invalid' : '' }}">
                            <option disabled selected> </option>
                            @if (isset($clients))
                                @forelse ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @empty
                                    <option disabled selected> Sin coincidencias </option>
                                @endforelse
                            @endif

                        </select>
                        @if ($errors->has('client_id'))
                            <div class="invalid-feedback">
                                Seleccione un cliente..
                            </div>
                        @else
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="project_id">Proyecto</label>
                        <select name="project_id" id="project_id"
                            class="form-control {{ $errors->has('project_id') ? 'is-invalid' : '' }}">
                            <option disabled selected> </option>
                            @if (isset($projects))
                                @forelse ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                                @empty
                                    <option disabled selected> Sin coincidencias </option>
                                @endforelse
                            @endif

                        </select>
                        @if ($errors->has('project_id'))
                            <div class="invalid-feedback">
                                Seleccione un projecto..
                            </div>
                        @else
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="flota_id">Flota</label>
                        <select name="flota_id" id="flota_id"
                            class="form-control {{ $errors->has('flota_id') ? 'is-invalid' : '' }}">
                            <option disabled selected> </option>
                            @forelse ($flotas as $flota)
                                <option value="{{ $flota->id }}">{{ $flota->label }}</option>
                            @empty
                                <option disabled selected> Sin coincidencias </option>
                            @endforelse
                        </select>
                        @if ($errors->has('flota_id'))
                            <div class="invalid-feedback">
                                Seleccione una flota..
                            </div>
                        @else
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label for="marca_id">Marca</label>
                        <select name="marca_id" id="marca_id"
                            class="form-control {{ $errors->has('marca_id') ? 'is-invalid' : '' }}"
                            onchange="valuesBrand(this.value)">
                            <option disabled selected> </option>
                            @forelse ($marcas as $marca)
                                <option value="{{ $marca->id }}">{{ $marca->label }}</option>
                            @empty
                                <option disabled selected> Sin coincidencias </option>
                            @endforelse
                        </select>
                        @if ($errors->has('marca_id'))
                            <div class="invalid-feedback">
                                Seleccione una marca..
                            </div>
                        @else
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label for="modelo_id">Modelo</label>
                        <select name="modelo_id" id="modelo_id"
                            class="form-control {{ $errors->has('modelo_id') ? 'is-invalid' : '' }}">
                            <option disabled selected> </option>

                        </select>
                        @if ($errors->has('modelo_id'))
                            <div class="invalid-feedback">
                                Seleccione un modelo..
                            </div>
                        @else
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label for="numberI">Numero interno </label>
                        <input type="number" name="internalN" id="internalN"
                            class="form-control {{ $errors->has('internalN') ? 'is-invalid' : '' }}">
                        @if ($errors->has('internalN'))
                            <div class="invalid-feedback">
                                ingrese un numero interno..
                            </div>
                        @else
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="sistema_id">Sistema</label>
                        <select name="sistema_id" id="sistema_id"
                            class="form-control {{ $errors->has('sistema_id') ? 'is-invalid' : '' }}">
                            <option disabled selected> </option>
                            @forelse ($sistemas as $sistema)
                                <option value="{{ $sistema->id }}">{{ $sistema->label }}</option>
                            @empty
                                <option disabled selected> Sin coincidencias </option>
                            @endforelse
                        </select>
                        @if ($errors->has('sistema_id'))
                            <div class="invalid-feedback">
                                ingrese un sistema..
                            </div>
                        @else
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label for="formato_id">Formato</label>
                        <select name="formato_id" id="formato_id"
                            class="form-control {{ $errors->has('formato_id') ? 'is-invalid' : '' }}">
                            <option disabled selected> </option>
                            @forelse ($formatos as $formato)
                                <option value="{{ $formato->id }}">{{ $formato->label }}</option>
                            @empty
                                <option disabled selected> Sin coincidencias </option>
                            @endforelse
                        </select>
                        @if ($errors->has('formato_id'))
                            <div class="invalid-feedback">
                                ingrese un sistema..
                            </div>
                        @else
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <label for="horometer">Horómetro</label>
                        <input type="text" name="horometer" id="horometer"
                            class="form-control {{ $errors->has('horometer') ? 'is-invalid' : '' }}">
                        @if ($errors->has('horometer'))
                            <div class="invalid-feedback">
                                Ingresa un horometro..
                            </div>
                        @else
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="periodicidad_id">Periodicidad</label>
                        <select name="periodicidad_id" id="periodicidad_id"
                            class="form-control {{ $errors->has('periodicidad_id') ? 'is-invalid' : '' }}">
                            <option disabled selected> </option>
                            @forelse ($periodicidad as $p)
                                <option value="{{ $p->id }}">{{ $p->label }}</option>
                            @empty
                                <option disabled selected> Sin coincidencias </option>
                            @endforelse
                        </select>
                        @if ($errors->has('periodicidad_id'))
                            <div class="invalid-feedback">
                                Seleccione una periodicidad..
                            </div>
                        @else
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        @endif

                    </div>




            </div>
        </div>
        {{-- componentes --}}
        <div class="card">
            <h4 class="ml-4 mt-4">Componentes</h4>
            <h5><a href="#" data-toggle="modal" data-target="#modal-md" class="btn btn-success btn-sm my-4 ml-4"><i
                        class="fas fa-plus"></i> &nbsp; Agregar Componente</a></h5>

            <form action="" method="get" id="form_search">
                <div class="form-group input-group mb-0">
                    @csrf
                    <div class="form-group input-group mb-0">
                        <input id="SearchList" type="text" class="form-control mb-0 border" placeholder="Buscar..">
                        <span class="input-group-text"><a href=""><i class="fas fa-search"></i></span>
                    </div>
                </div>
            </form>

            <div class="row col-12 m-0 p-0" id="contenendorC">


                <a href="#" class="card-body" style="border-bottom: 1px solid #ccc">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <h5 class="text-center text-gray">No se encontrarón registros</h5>

                        </div>

                    </div>
                </a>

            </div>

        </div>
        {{-- otros componentes --}}
        <div class="card">
            <h4 class="ml-4 mt-4">Otros componentes</h4>
            <h5><a href="#" data-toggle="modal" data-target="#modal2-md" class="btn btn-success btn-sm my-4 ml-4"><i
                        class="fas fa-plus"></i> &nbsp; Agregar componente</a></h5>

            <form action="" method="get" id="form_search">
                <div class="form-group input-group mb-0">
                    @csrf
                    <div class="form-group input-group mb-0">
                        <input id="SearchList" type="text" class="form-control mb-0 border" name="SearchList"
                            placeholder="Buscar..">
                        <span class="input-group-text"><a href=""><i class="fas fa-search"></i></span>
                    </div>
                </div>
            </form>

            <div class="row col-12 m-0 p-0" id="contenendorS">

                <a href="#" class="card-body" style="border-bottom: 1px solid #ccc">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <h5 class="text-center text-gray">No se encontrarón registros</h5>

                        </div>

                    </div>
                </a>


            </div>

        </div>

        {{-- modal componentes --}}
        <div class="modal fade" id="modal-md">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-body -0 ppy-4">

                        <div class="row">
                            <div class="col-12">
                                <form action="" method="get" id="form_search">
                                    <div class="form-group input-group mb-0">
                                        @csrf
                                        <div class="form-group input-group mb-0">
                                            <input id="" type="text" class="form-control mb-0 border"
                                                placeholder="Buscar..">
                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                                        </div>
                                    </div>
                                </form>

                                <div class="row m-0 p-0" id="contenendor" style="overflow: auto;height:300px;">
                                    @forelse($components as $component)

                                        <div class="card-body border bottom col-12">
                                            <div class="row">
                                                <div class="checkbox col-1 pl-4">
                                                    <input class="compos" type="checkbox"
                                                        id="compo[{{ $component->id }}]" value="{{ $component->id }}">
                                                    <label for="compo[{{ $component->id }}]"></label>
                                                </div>
                                                <div class="col-md-9">

                                                    <h5 style="mb-0">
                                                        {{ $component->name }}
                                                        <input type="hidden" name="" id="name{{ $component->id }}"
                                                            value="{{ $component->name }}">

                                                    </h5>

                                                    <small class="mb-0 text-custom">
                                                        Serial: {{ $component->value }}
                                                        <input type="hidden" name="" id="serial{{ $component->id }}"
                                                            value="{{ $component->value }}">


                                                    </small><br>
                                                    <small class="mb-0 text-custom">
                                                        @foreach ($clients as $client)
                                                            @if ($client->id = $component->client_id)
                                                                {{ $client->name . ' | ' }}
                                                                <input type="hidden" id="client{{ $component->id }}"
                                                                    value="{{ $client->name . ' | ' }}">
                                                            @break
                                                        @endif
                                    @endforeach
                                    @foreach ($projects as $project)
                                        @if ($project->id = $component->project_id)
                                            {{ $project->name . ' | ' }}
                                            <input type="hidden" id="project{{ $component->id }}"
                                                value="{{ $project->name . ' | ' }}">
                                        @break
                                    @endif
                                    @endforeach
                                    {{ $component->state ? 'Activo' : 'Inactivo' }}
                                    <input type="hidden" id="state{{ $component->id }}"
                                        value="{{ $component->state ? 'Activo' : 'Inactivo' }}">
                                    </small>
                                </div>
                                <div class="col-2" href="#" data-toggle="modal"
                                    data-target="#modal-md{{ $component->id }}" id="{{ $component->id }}">
                                    <h5 class="text-center">
                                        <small>
                                            <small>
                                                {{ date('M,d,Y', strtotime($component->created_at)) }}
                                                <input type="hidden" id="date{{ $component->id }}"
                                                    value="{{ date('M,d,Y', strtotime($component->created_at)) }}">
                                            </small>
                                            <div class="mt-1">
                                                {!! QrCode::size(30)->generate(Request::url('component.edit', $component->id)) !!}
                                            </div>
                                        </small>
                                    </h5>


                                </div>
                            </div>
                        </div>
                    @empty
                        <a href="#" class="card-body" style="border-bottom: 1px solid #ccc">
                            <div class="row">
                                <div class="col-md-10 offset-md-1">
                                    <h5 class="text-center text-gray">No se encontrarón registros</h5>

                                </div>

                            </div>
                        </a>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="d-block px-3">
            <button id="btnaddComp" type="button" class="btn btn-success btn-sm float-right"
                data-dismiss="modal">Agregar</button>

            <button type="button" class="btn btn-link float-right" data-dismiss="modal">Cancelar</button>
        </div>
    </div>
    </div>
    </div>
    {{-- modal otros componentes --}}
    <div class="modal fade" id="modal2-md">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body p-0 py-4">
                    <div class="row">
                        <div class="col-12">
                            <form action="" method="get" id="form_search">
                                <div class="form-group input-group mb-0">
                                    @csrf
                                    <div class="form-group input-group mb-0">
                                        <input id="SearchList" type="text" class="form-control mb-0 border"
                                            name="SearchList" placeholder="Buscar..">
                                        <span class="input-group-text"><a href=""><i class="fas fa-search"></i></span>
                                    </div>
                                </div>
                            </form>

                            <div class="row m-0 p-0" id="contenendor2" style="overflow: auto;height:300px;">
                                @forelse($servs as $serv)
                                    <a class="card-body border bottom col-12">
                                        <div class="row">
                                            <div class="checkbox col-md-1 pl-4">
                                                <input class="servs" id="servs[{{ $serv->id }}]"
                                                    value="{{ $serv->id }}" type="checkbox">
                                                <label for="servs[{{ $serv->id }}]"></label>
                                            </div>
                                            <div class="col-md-10">
                                                <h5>{{ $serv->name }}</h5>
                                                <input type="hidden" name="" id="name2{{ $serv->id }}"
                                                    value="{{ $serv->name }}">
                                                <small class="text-custom">No parte:
                                                    {{ $serv->partNum }}</small><br>
                                                <input type="hidden" name="" id="partNum{{ $serv->id }}"
                                                    value="{{ $serv->partNum }}">
                                            </div>
                                            <div class="col-md-1 end">
                                                <small class="text-custom float-right">
                                                    {{ date('M,d,Y', strtotime($serv->created_at)) }}
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                @empty
                                    <a href="#" class="card-body" style="border-bottom: 1px solid #ccc">
                                        <div class="row">
                                            <div class="col-md-10 offset-md-1">
                                                <h5 class="text-center text-gray">No se encontrarón registros</h5>

                                            </div>

                                        </div>
                                    </a>
                                @endforelse
                            </div>
                        </div>
                    </div>

                </div>
                <div class="d-block px-3">
                    <button type="button" class="btn btn-success btn-sm float-right" id="btnaddServ"
                        data-dismiss="modal">Agregar</button>
                    <a class="btn btn-link float-right" data-dismiss="modal">Cancelar</a>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- call to action --}}
    <div class="pull-right">
        <a href="{{ route('equipment.index') }}" class="btn btn-link">Cancelar</a>
        <button type="button" class="btn btn-success btn-sm" id="btnsave">Guardar</button>
        </form>
    </div>

@stop

@section('script')
    <script>
        $("#internalN").blur(function() {
            let internalN = this.value;
            let icon, type, mesaje;
            var project_id = $("#project_id").val();
            if (project_id) {
                $.ajax({
                    url: "{{ route('equipment.validateN') }}",
                    type: 'POST',
                    data: {
                        "project_id": project_id,
                        "value": internalN,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(res) {
                        var val = JSON.parse(res)
                        if (val == null) {
                            icon = '<i class="far fa-check-circle"></i>';
                            type = "alert-success";
                            mensaje = "El campo número interno se encuentra disponible";
                        } else {
                            icon = '<i class="far fa-times-circle"></i>';
                            type = "alert-danger";
                            mensaje = "El campo número interno se encuentra ocupado";
                        }
                        $('#alert-container').html('');
                        var todo = '<div class="alert ' + type +
                            ' alert-dismissible fade show" role="alert">';
                        todo +=
                        '<h4 class="alert-heading text-lowercase" style="text-transform:none;">';
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
            }
        });

        function saveValue(id) {
            item = document.getElementById(id);
            data = ('<input type="hidden" name="attrs' + id + '"  value="' + item.value + '">');
            $("#containerValues").append(data);
        }

        function bringAttr(id) {
            var type;
            $.ajax({
                url: "{{ route('equipment.showAttributes') }}",
                type: 'POST',
                data: {
                    "value": id,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(res) {
                    var val = JSON.parse(res)
                    console.log(val);

                    for (let x = 0; x < val.length; x++) {
                        valist_id = val[x].valist_id;
                        item_id = val[x].item_id;
                        label = val[x].label;
                        if (valist_id == 10 || valist_id == 11) {
                            type = "date"
                        } else {
                            type = "type"
                        }
                        values = '<div class="form-group my-3">',
                            values += '<label>' + label + '</label>',
                            values += '<input type="' + type + '" class="form-control" name="cf[' +
                            item_id + ',' + valist_id + ']" onblur="saveValue(this.id)" id="cf[' + item_id +
                            ',' + valist_id + ']" >',
                            values += '</div>'
                        $("#containAttr" + item_id).append(values);
                    }
                }
            });
        }

        function valuesBrand(value) {

            if (value != '') {
                $.ajax({
                    url: "{{ route('equipment.showModelos') }}",
                    type: 'POST',
                    data: {
                        "value": value,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(res) {
                        var val = JSON.parse(res)
                        $('#modelo_id').html("");
                        $('#modelo_id').append($('<option>', {
                            value: null,
                            text: "seleccione una opcion"
                        }));
                        for (let x = 0; x < val.length; x++) {
                            id = val[x].id;
                            label = val[x].label;
                            $('#modelo_id').append($('<option>', {
                                value: id,
                                text: label
                            }));
                        }
                    }
                });
            }
        }

        function removeCompo(id) {
            $("#contain" + id).remove();
            $("#compos" + id).remove();
        }

        function removeServ(id) {
            $("#contain" + id).remove();
            $("#compos" + id).remove();
        }
        $('#btnsave').click(function() {
            $("#formEquipment").submit();
        });

        $('#btnaddComp').click(function() {
            let compos = [];
            let compovals;
            let data;
            $("#contenendorC").html('');
            $(".compos:checkbox:checked").each(function() {
                compos.push($(this).val());

            });
            if (compos) {
                compos.forEach(function(compo, index) {
                    compovals = ('<div class="card-body border bottom col-12" id="contain' + compos[
                        index] + '">');
                    compovals += ('<div class="row">');
                    compovals += ('<div class="col-md-10">');
                    compovals += ('<h5>' + $("#name" + compos[index]).val() + '</h5>');
                    compovals += ('<small class="text-custom">Serial: ' + $("#serial" + compos[index])
                        .val() + '</h5>');
                    compovals += ('<br>');
                    compovals += ('<small class="text-custom">' + $("#client" + compos[index]).val() +
                        '</small>');
                    compovals += ('<small class="text-custom">' + $("#project" + compos[index]).val() +
                        '</small>');
                    compovals += ('<small class="text-custom">' + $("#state" + compos[index]).val() +
                        '</small>');
                    compovals += ('</div>');
                    compovals += ('<div class="col-md-2">');
                    compovals += ('<button id="' + compos[index] +
                        '" class="btn btn-danger btn-inverse btn-rounded float-right" onclick="removeCompo(this.id)"><i class="fas fa-times"></i></button>'
                    );
                    compovals += ('</div>');
                    compovals += ('</div>');
                    compovals += ('</div>');
                    $("#contenendorC").append(compovals);

                    data = ('<input type="hidden" name="compos[' + compos[index] + ']" id="compos' +
                        compos[index] + '" value="' + compos[index] + '">');
                    $("#containerValues").append(data);
                });



            }

        });

        $('#btnaddServ').click(function() {

            let serv = [];
            let servvals;
            let data;

            $("#contenendorS").html('');
            $(".servs:checkbox:checked").each(function() {
                serv.push($(this).val());
            });
            if (serv) {
                serv.forEach(function(compo, index) {
                    servvals = '<div class="panel panel-default col-12 p-0 border">',
                        servvals += '<div class="panel-heading" role="tab" id="heading-2-One">',
                        servvals += '<div class="row m-3">',
                        servvals += '<div class="col-11">',
                        servvals +=
                        '<a class="" data-toggle="collapse" data-parent="#accordion-2" href="#collapse-' +
                        serv[index] + '" aria-expanded="true">',
                        servvals += '<h4 style="m-0">',
                        servvals += $("#name2" + serv[index]).val(),
                        servvals += '</h4>',
                        servvals += '<small class="text-custom">',
                        servvals += 'No parte :' + $("#partNum" + serv[index]).val(),
                        servvals += '</small>',
                        servvals += '</a>',
                        servvals += '</div>',
                        servvals += '<div class="col-lg-1">',
                        servvals += '<button id="' + serv[index] + '"',
                        servvals +=
                        'class="btn btn-danger btn-inverse btn-rounded float-right" onclick="removeServ(this.id)"><i class="fas fa-times"></i></button>',
                        servvals += '</div>',
                        servvals += '</div>',
                        servvals += '</div>',
                        servvals += '<div id="collapse-' + serv[index] +
                        '" class="panel-collapse collapse" style="">',
                        servvals += '<div class="panel-body px-5 border top">',
                        servvals += '<div id="containAttr' + serv[index] + '"></div>',
                        servvals += '</div>',
                        servvals += '</div>',
                        servvals += '</div>',
                        $("#contenendorS").append(servvals);
                    bringAttr(serv[index]);
                    data = ('<input type="hidden" name="servs[' + serv[index] + ']" id="servs' + serv[
                        index] + '" value="' + serv[index] + '">');
                    $("#containerValues").append(data);
                });
            }
        });

    </script>
@endsection
