@extends('layouts.admin.app')
@section('title', 'Crear nuevo servicio')
@section('breadcum', 'Servicios / Crear nuevo servicio')
@section('volver', 'si')
@section('content')
    <div class="col-lg-10 offset-lg-1 col-12 pb-5">

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


        <div class="card">
            <div class="card-body">
                <form action="{{ route('serv.store') }}" method="post" id="formparts">
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
                        <label for="quantity">Unidades</label>
                        <input type="number" name="quantity" id="quantity"
                            class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}">
                        @if ($errors->has('quantity'))
                            <div class="invalid-feedback">
                                Ingresa un número..
                            </div>
                        @else
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                    </div>
                    <label for="CostU">Costo unitario</label>
                    <div class="input-icon form-group">
                        <i class="fas fa-dollar-sign"></i>
                        <input type="number" name="CostU" id="CostU"
                            class="form-control  {{ $errors->has('CostU') ? 'is-invalid' : '' }}">
                        @if ($errors->has('CostU'))
                            <div class="invalid-feedback">
                                Ingresa una cifra..
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
                        <input id="panel" rows="3" class="form-control">
                    </div>
                </div>
            </div>

        </div>
        <div class="float-right">

            <button class="btn btn-success" type="button" id="btnsave">Guardar</button>
            <a class="btn btn-link" type="submit">Cancelar</a>
            </form>
        </div>
    </div>


@stop

@section('script')
<script>
    function remove(id) {
        $("#" + id).remove();
        $("#data" + id).remove();
    }
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
            $('.data').each(function() {
                listdata.push(this.value);
            });
            $.ajax({
                url: "{{ route('serv.clientv') }}",
                type: 'POST',
                data: {
                    "data": listdata,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(res) {
                    $("#formparts").submit();
                }
            });
        } else {
            $("#formparts").submit();
        }

    });

</script>
@endsection
