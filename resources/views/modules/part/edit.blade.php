@extends('layouts.admin.app')
@section('title', 'Editar parte')
@section('breadcum', 'Editar parte')
@section('volver', 'si')
@section('content')
    <div class="col-lg-10 offset-lg-1 col-12">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">OPS! <label class="text-lowercase">Parece que faltán campos por llenar...</label> </h4>
                <hr>
                <ul class="list-unstyled">
                    @php
                        $cont = 1;
                    @endphp
                    @foreach ($errors->all() as $error)
                    <li class="text-lowercase">{{ $cont++ . '. ' }}<label class="text-capitalize">El&nbsp;</label>{{ $error }}</li>
                @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ route('part.update', $item->id) }}" id="formparts" method="post">
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
                                        {{ $item->state ? 'checked value=1' : '' }}>
                                    <label for="state"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" value="{{ $item->name }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
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
                                <option value="{{ $family->id }}" {{ $family->id == $item->family_id ? 'selected' : '' }}>
                                    {{ $family->label }}</option>
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
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $item->category_id ? 'selected' : '' }}>{{ $category->label }}
                                   
                                </option>
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
                            class="form-control {{ $errors->has('partNum') ? 'is-invalid' : '' }}"
                            value="{{ $item->partNum }}">
                        @if ($errors->has('partNum'))
                            <div class="invalid-feedback">
                                Ingresa un número
                            </div>
                        @else
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        @endif
                    </div>
                    <label for="CostU">Costo unitario</label>
                    <div class="input-icon form-group">
                        <i class="fas fa-dollar-sign"></i>
                        <input type="text" name="CostU" onkeyup="format(this)" onchange="format(this)" id="CostU"
                            class="form-control  {{ $errors->has('CostU') ? 'is-invalid' : '' }}"
                            value="{{ $item->costU }}">
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
                                <input type="checkbox" name="toggle[{{$fill->id}}]" id="toggle{{ $cont }}" @foreach ($control as $c)  @if ($fill->id==$c->valist_id)
                                checked @endif
                                @endforeach
                                >
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
                        @foreach ($costClient as $cc)
                            @foreach ($clients as $client)
                                @if ($cc->client_id == $client->id)
                                    <a onclick="remove(this.id)" id="{{ $cc->cost }}"
                                        class="btn btn-default btn-inverse btn-rounded tags"
                                        value="{{ $cc->item_id . ' - ' . $cc->client_id }}">{{ $client->name . ' - ' . $cc->cost }}
                                        &nbsp;&nbsp; <i class="fa fa-close"></i></a>
                                    <input type="hidden" class="data" name="data" id="data{{ $cc->cost }}" name="data"
                                        value="{{ $cc->client_id . ',' . $cc->item_id }}">
                                @endif
                            @endforeach
                        @endforeach
                    </div>

                    <div class="input-icon form-group">
                        <i class="fas fa-dollar-sign"></i>
                        <input name="panel" id="panel" rows="3" class="form-control" onkeyup="format(this)" onchange="format(this)">
                    </div>

                </div>



            </div>
        </div>
        <div class="float-right">
            <button class="btn btn-success" type="button" id="btnsave">Guardar</button>
            <a class="btn btn-link" type="button" href="{{ route('part.index') }}">Cancelar</a>
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
        function removeNew(id) {
            $("#" + id).remove();
            $("#data" + id).remove();
        }
        function remove(id) {
        var data = $("#data" + id).val();
        var array = data.split(',');
        $.ajax({
            url: "{{ route('part.deleteclientv') }}",
            type: 'POST',
            data: {
                "data": array,
                "_token": "{{ csrf_token() }}",
            },
            success: function(res) {
                $("#" + id).remove();
                $("#data" + id).remove();
            }
        });




    }
    $("#panel").keypress(function(e) {
        if (e.which == 13) {
            $("#contenedor").append(
                '<a onclick="removeNew(this.id)" class="btn btn-default btn-inverse btn-rounded tags" id="' +
                $("#panel").val() + '" value="' +
                $("#client_id option:selected").text() + ' - ' + $("#panel").val() + '">' + $(
                    "#client_id option:selected").text() + ' - ' + $("#panel").val() +
                '&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-close"></i> </a>');
            $("#contenedor").append('<input type="hidden" class="dat"  id="dat' + $("#panel")
                .val() + '" name="dat" value="' + $(
                    "#client_id").val() + ' , ' + $("#panel").val() + '">');
            $("#panel").val("");
            $("#client_id").val("");
            return false;
        }
    });
    $("#btnsave").click(function() {
        name = $("#name").val();
        quantity = $("#quantity").val();
        costU = $("#CostU").val();
        cont = 0;
        name != '' ? cont = 0 : cont = 1;
        quantity != '' ? cont = 0 : cont = 1;
        costU != '' ? cont = 0 : cont = 1;
        if (cont == 0) {
            var listdata = [];
            $('.dat').each(function() {
                listdata.push(this.value);
            });
            if (listdata != "") {
                $.ajax({
                    url: "{{ route('serv.clientv') }}",
                    type: 'POST',
                    data: {
                        "data": listdata,
                        "id": "{{ $item->id }}",
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(res) {
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
