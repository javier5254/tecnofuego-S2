@extends('layouts.admin.app')
@section('title', 'Editar Equipo')
@section('breadcum', ' Editar Equipo')
@section('volver', 'si')
@section('content')
    <div class="col-lg-10 offset-lg-1 col-12">
        <div id="alert-container">

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
        </div>
        {{-- Informacion general --}}
        <div class="card">
            <div class="card-body">
                <form action="{{ route('equipment.update', $equipment->id) }}" method="POST" id="formEquipment">
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
                                        {{ $equipment->state ? 'checked value=1' : '' }}>
                                    <label for="state"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="client_id">Cliente</label>
                        <select name="client_id" id="client_id"
                            class="form-control {{ $errors->has('client_id') ? 'is-invalid' : '' }}">
                            <option disabled selected> </option>
                            @if (isset($clients))
                                @forelse ($clients as $client)
                                    <option value="{{ $client->id }}"
                                        {{ $client->id == $equipment->cname ? 'selected' : '' }}>{{ $client->name }}
                                    </option>
                                @empty
                                    <option disabled selected> Sin coincidencias </option>
                                @endforelse
                            @endif

                        </select>
                        @if ($errors->has('client_id'))
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
                        <label for="project_id">Proyecto</label>
                        <select name="project_id" id="project_id"
                            class="form-control {{ $errors->has('project_id') ? 'is-invalid' : '' }}">
                            <option disabled selected> </option>
                            @if (isset($projects))
                                @forelse ($projects as $project)
                                    <option value="{{ $project->id }}"
                                        {{ $project->id == $equipment->pname ? 'selected' : '' }}>{{ $project->name }}
                                    </option>
                                @empty
                                    <option disabled selected> Sin coincidencias </option>
                                @endforelse
                            @endif

                        </select>
                        @if ($errors->has('project_id'))
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
                        <label for="flota_id">Flota</label>
                        <select name="flota_id" id="flota_id"
                            class="form-control {{ $errors->has('flota_id') ? 'is-invalid' : '' }}">
                            <option disabled selected> </option>
                            @forelse ($valists as $flota)
                                @if ($flota->list_id == 6)
                                    <option value="{{ $flota->id }}"
                                        {{ $flota->id == $equipment->flota ? 'selected' : '' }}>{{ $flota->label }}
                                    </option>
                                @endif
                            @empty
                                <option disabled selected> Sin coincidencias </option>
                            @endforelse
                        </select>
                        @if ($errors->has('flota_id'))
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
                        <label for="marca_id">Marca</label>
                        <select name="marca_id" id="marca_id"
                            class="form-control {{ $errors->has('marca_id') ? 'is-invalid' : '' }}"
                            onchange="valuesBrand(this.value)">
                            <option disabled selected> </option>
                            @forelse ($valists as $marca)
                                @if ($marca->list_id == 7)
                                    <option value="{{ $marca->id }}"
                                        {{ $marca->id == $equipment->marca ? 'selected' : '' }}>{{ $marca->label }}
                                    </option>
                                @endif
                            @empty
                                <option disabled selected> Sin coincidencias </option>
                            @endforelse
                        </select>
                        @if ($errors->has('marca_id'))
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
                        <label for="modelo_id">Modelo</label>
                        <select name="modelo_id" id="modelo_id"
                            class="form-control {{ $errors->has('modelo_id') ? 'is-invalid' : '' }}">
                            <option disabled selected> </option>
                            @forelse ($valists as $modelo)
                                @if ($modelo->list_id == 11)
                                    <option value="{{ $modelo->id }}"
                                        {{ $modelo->id == $equipment->modelo ? 'selected' : '' }}>{{ $modelo->label }}
                                    </option>
                                @endif
                            @empty
                                <option disabled selected> Sin coincidencias </option>
                            @endforelse
                        </select>
                        @if ($errors->has('modelo_id'))
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
                        <label for="numberI">Numero interno </label>
                        <input type="number" name="internalN" id="internalN" class="form-control"
                            value="{{ $equipment->internalN }}">
                    </div>
                    <div class="form-group">
                        <label for="sistema_id">Sistema</label>
                        <select name="sistema_id" id="sistema_id"
                            class="form-control {{ $errors->has('sistema_id') ? 'is-invalid' : '' }}">
                            <option disabled selected> </option>
                            @forelse ($valists as $sistema)
                                @if ($sistema->list_id == 8)
                                    <option value="{{ $sistema->id }}"
                                        {{ $sistema->id == $equipment->sistema ? 'selected' : '' }}>
                                        {{ $sistema->label }}
                                    </option>
                                @endif
                            @empty
                                <option disabled selected> Sin coincidencias </option>
                            @endforelse
                        </select>
                        @if ($errors->has('sistema_id'))
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
                        <label for="horometer">Horómetro</label>
                        <input type="text" name="horometer" id="horometer"
                            class="form-control {{ $errors->has('horometer') ? 'is-invalid' : '' }}"
                            value="{{ $equipment->horometer }}">
                        @if ($errors->has('horometer'))
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
                        <label for="periodicidad_id">Periodicidad</label>
                        <select name="periodicidad_id" id="periodicidad_id"
                            class="form-control {{ $errors->has('periodicidad_id') ? 'is-invalid' : '' }}">
                            <option disabled selected> </option>
                            @forelse ($valists as $p)
                                @if ($p->list_id == 9)
                                    <option value="{{ $p->id }}"
                                        {{ $p->id == $equipment->periodicidad ? 'selected' : '' }}>{{ $p->label }}
                                    </option>
                                @endif
                            @empty
                                <option disabled selected> Sin coincidencias </option>
                            @endforelse
                        </select>
                        @if ($errors->has('periodicidad_id'))
                            <div class="invalid-feedback">
                                Ingresa un nombre..
                            </div>
                        @else
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        @endif

                    </div>




            </div>
        </div>
        {{-- Componentes con serial --}}
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

            <div class="row p-0 m-0" id="contenendorC" style="overflow: auto;height:300px;">


                @forelse ($componentsEquip as $ce)

                    <div class="card-body border bottom col-12" id="contain{{ $ce->id }}">
                        <div class="row">
                            <a class="col-sm-8 col-lg-9">
                                <h4 style="m-0">
                                    {{ $ce->iname }}
                                </h4>
                                <small class="text-custom">
                                    Serial: {{ $ce->value }}
                                </small><br>
                                <small class="mb-0 text-custom">
                                    {{ $ce->cname }} | {{ $ce->pname }}
                                </small>
                            </a>
                            <a class="col-sm-4 col-lg-2 btndynamic" href="#" data-toggle="modal"
                                data-target="#modal-md{{ $ce->id }}" id="{{ $ce->id }}">
                                <h5 class="text-center">
                                    <small>
                                        <small>
                                            {{ date('d/m/Y', strtotime($ce->created_at)) }}
                                        </small>
                                        <div class="mt-1">{!! QrCode::size(30)->generate(Request::url('component.edit', $ce->id)) !!}</div>
                                    </small>
                                </h5>
                            </a>
                            <div class="col-lg-1">
                                <button id="{{ $ce->id }}"
                                    class="btn btn-danger btn-inverse btn-rounded float-right mt-3"
                                    onclick="removeCompo(this.id)"><i class="fas fa-times"></i></button>
                            </div>
                            <div class="modal fade" id="modal-md{{ $ce->id }}">
                                <div class="modal-dialog modal-md" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="padding-5">
                                                <div class="row">
                                                    <div class="my-auto mx-auto px-4 py-2">
                                                        {!! QrCode::size(140)->generate(route('component.edit', $ce->id)) !!}
                                                        <button class="btn btn-secondary text-white d-block center mt-4"
                                                            href="#" onclick="imprimir()"><i class="fas fa-print"></i>
                                                            imprimir
                                                            QR </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

                {{-- <div class="row p-4 w-100">
                    <div class="col-6">
                        {{ $componentsEquip->links() }}
                    </div>
                    <div class="col-6">
                        <label class="pull-right">
                            Artículos del {{ $componentsEquip->firstItem() }} al {{ $componentsEquip->lastItem() }} de
                            un
                            total de {{ $componentsEquip->total() }} artículos
                        </label>
                    </div>
                </div> --}}
            </div>

        </div>
        {{-- Componentes sin serial --}}
        <div class="card">
            <h4 class="ml-4 mt-4">Otros componentes</h4>
            <h5><a href="#" data-toggle="modal" data-target="#modal2-md" class="btn btn-success btn-sm my-4 ml-4"><i
                        class="fas fa-plus"></i> &nbsp; Agregar Servicio</a></h5>

            <form action="" method="get" id="form_search">
                <div class="form-group input-group mb-0">
                    @csrf
                    <div class="form-group input-group mb-0">
                        <input id="SearchList" type="text" class="form-control mb-0 border" name="SearchList"
                            placeholder="Buscar..">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                </div>
            </form>

            <div class="row m-0 p-0" id="contenendorS">
                @forelse($servs as $s)
                    <div class="panel panel-default col-12 p-0 border">
                        <div class="panel-heading" role="tab" id="heading-2-One">
                            <div class="row m-3">
                                <div class="col-11">
                                    <a class="" data-toggle="collapse" data-parent="#accordion-2"
                                        href="#collapse-{{ $s->id }}" aria-expanded="true">
                                        <h4 style="m-0">
                                            {{ $s->name }}
                                        </h4>
                                        <small class="text-custom">
                                            No parte: {{ $s->partNum }}
                                        </small>
                                    </a>
                                </div>
                                <div class="col-lg-1">
                                    <button id="compos{{ $s->id }}"
                                        class="btn btn-danger btn-inverse btn-rounded float-right"
                                        onclick="removeServ(this.id)"><i class="fas fa-times"></i></button>
                                </div>
                            </div>

                        </div>
                        <div id="collapse-{{ $s->id }}" class="panel-collapse collapse" style="">
                            <div class="panel-body p-5 border top">
                                <label for="">{{ $s->label }}</label>
                                <input type="date" value="{{ $s->val }}" id="name" class="form-control">
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
        {{-- Botones call to action --}}
        <div class="pull-right">
            <a href="{{ route('equipment.index') }}" class="btn btn-link">Cancelar</a>
            <button type="button" class="btn btn-success btn-sm" id="btnsave">Guardar</button>
            </form>
        </div>
        {{-- modal componentes --}}
        <div class="modal fade" id="modal-md">
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
                        <button data-dismiss="modal" class="btn btn-link float-right" type="buttoin">Cancelar</button>
                    </div>
                </div>
        </div>
    </div>
    {{-- modal componentes sin serial --}}
    <div class="modal fade" id="modal2-md">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="padding-5">
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

                                <div class="row col-12 m-0 p-0" id="contenendor">
                                    @forelse($servs as $serv)
                                        <a class="card-body" style="border-bottom: 1px solid #ccc">
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <div class="checkbox">
                                                        <input id="task10" name="task10" type="checkbox">
                                                        <label for="task10"></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <h5>{{ $serv->name }}</h5>
                                                    <span>Estado:
                                                        {{ $serv->state == 1 ? 'Activo' : 'Inactivo' }}</span><br>

                                                </div>
                                                <div class="col-md-2">
                                                    <span class="float-right">
                                                        Mar 09 2020
                                                    </span>
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
                </div>
                <div class="d-block px-3">
                    <button type="submit" class="btn btn-success btn-sm float-right">Guardar</button>
                    <button data-dismiss="modal" class="btn btn-link float-right" type="buttoin">Cancelar</button>
                </div>
            </div>
        </div>
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

        function removeNew(id) {
            $("#" + id).remove();
            $("#data" + id).remove();
        }

        function removeCompo(id) {
            $.ajax({
                url: "{{ route('equipment.deleteCompo') }}",
                type: 'POST',
                data: {
                    "compo_id": id,
                    "equip_id": "{{ $equipment->id }}",
                    "_token": "{{ csrf_token() }}",
                },
                success: function(res) {
                    $("#contain" + id).remove();
                    $("#" + id).remove();
                    $("#data" + id).remove();

                }
            });
        }
        $('#btnsave').click(function() {
            $("#formEquipment").submit();
        });
        $('#btnaddComp').click(function() {

            let compos = [];
            let compovals;

            $("#contenendorC").html('');

            $(".compos:checkbox:checked").each(function() {
                compos.push($(this).val());

            });
            if (compos) {
                compos.forEach(function(compo, index) {
                    compovals = ('<a class="card-body" style="border-bottom: 1px solid #ccc">');
                    compovals += ('<div class="row">');
                    compovals += ('<div class="col-md-10">');
                    compovals += ('<h5>' + compos[index] + '</h5>');
                    compovals += ('<span>Estado: Activo</span>');
                    compovals += ('</div>');
                    compovals += ('<div class="col-md-2">');
                    compovals += ('<span class="float-right">Mar 09 2020</span>');
                    compovals += ('');
                    compovals += ('</div>');
                    compovals += ('</div>');
                    compovals += ('</a>');
                    $("#contenendorC").append(compovals);
                });
            }

        });

    </script>
@endsection
