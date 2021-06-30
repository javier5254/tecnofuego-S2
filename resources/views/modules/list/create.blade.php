@extends('layouts.admin.app')
@section('title', 'Crear listas')
@section('breadcum', 'Listas / Crear nueva lista')
@section('volver', 'si')
@section('content')
    <div class="col-lg-10 offset-lg-1 col-12">
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
                <form action="{{ route('list.store') }}" method="post" id="formlist">
                    @csrf
                    <div class="form-group">
                        <label for="label">Nombre de la lista</label>
                        <input type="text" name="label" id="label"
                            class="form-control {{ $errors->has('label') ? 'is-invalid' : '' }}">
                        @if ($errors->has('label'))
                            <div class="invalid-feedback text-lowercase">
                                Ingresa un nombre de lista..
                            </div>
                        @else
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 offset-md-9">
                                <label for="label" class="float-right">Tiene padre?</label>
                            </div>
                            <div class="col-md-1">
                                <div class="toggle-checkbox toggle-success checkbox-inline toggle-sm float-right">
                                    <input type="checkbox" name="son" id="son">
                                    <label for="son"></label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group d-none nullable">
                        <label for="lfather_id">Lista padre</label>
                        <select class="form-control" name="lfather_id" id="lfather_id">
                            <option disabled selected value="0">Elije una lista</option>
                            @forelse ($listas as $lista)
                                <option value="{{ $lista->id }}">{{ $lista->label }}</option>
                            @empty
                                <option disabled>No hay informacion.</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="form-group d-none nullable">
                        <label for="vfather_id">Valor padre</label>
                        <select class="form-control" id="vfather_id">
                            <option disabled selected value="0">Elije una lista</option>
                            @forelse ($Valoreslistas as $valist)
                                <option value="{{ $valist->id }}">{{ $valist->label }}</option>
                            @empty
                                <option disabled>No hay informacion.</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description">valores de la lista</label>
                        <div id="contenedor">

                        </div>
                        <div class="row">
                            <div class="col-md-8 col-12 mb-3">
                                <input id="panel" rows="3" class="form-control">
                            </div>
                            <div class="col-md-2 col-12">
                                <label for="state" class="float-right">Estado</label>
                                <div class="toggle-checkbox toggle-success checkbox-inline toggle-sm float-right">
                                    <input type="checkbox" name="state" id="state" checked>
                                    <label for="state"></label>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
        <div class="pull-right">
            <button type="submit" class="btn btn-success btn-sm">Guardar</button>
            <a href="{{ route('list.index') }}" class="btn btn-link" type="submit">Cancelar</a>
            </form>
        </div>
    </div>
@stop

@section('script')
    <script>
        $("#lfather_id").change(function() {

            console.log(this.value);
            $.ajax({
                url: "{{ route('list.showVals') }}",
                type: 'POST',
                data: {
                    "value": this.value,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(res) {
                    var val = JSON.parse(res)
                    $('#vfather_id').html("");
                    $('#vfather_id').append($('<option>', {
                        value: null,
                        text: "seleccione una opcion"
                    }));
                    for (let x = 0; x < val.length; x++) {
                        id = val[x].id;
                        label = val[x].label;
                        $('#vfather_id').append($('<option>', {
                            value: id,
                            text: label
                        }));
                    }
                }
            });
        });
        $("#son").click(function() {
            if ($("#son").prop("checked")) {
                $(".nullable").removeClass("d-none")
            } else {
                $(".nullable").addClass("d-none")
            }
        });
        $("#panel").keydown(function(e) {
            if (e.which == 13) {
                valfather = $("#vfather_id").val() != null ? " - " + $("#vfather_id option:selected").text() : "";
                valfatherid = $("#vfather_id").val() != null ? ',' + $("#vfather_id").val() : "";
                label = $("#panel").val();
                value = label + valfather
                if (document.getElementById('state').checked) {
                    state = 1;
                    $("#contenedor").append(
                        '<a onclick="remove(this.id)" class="btn btn-default btn-inverse btn-rounded tags border border-success" id="' +
                        $("#panel").val() + '" value="' + $("#panel").val() + '">' + value +
                        '&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-close"></i> </a>');
                }else{
                    state = 0;
                    $("#contenedor").append(
                        '<a onclick="remove(this.id)" class="btn btn-default btn-inverse btn-rounded tags border border-danger" id="' +
                        $("#panel").val() + '" value="' + $("#panel").val() + '">' + value +
                        '&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-close"></i> </a>');
                }
                $("#contenedor").append('<input type="hidden" class="data" name="data[' + $("#panel")
                    .val() + ']" id="data' + $("#panel")
                    .val() + '" value="' + $("#panel").val() + " , " + state + valfatherid + '">');
                $("#panel").val("");
                return false;
            }
        });

        function remove(id) {
            $("#" + id).remove();
            $("#data" + id).remove();
        }

    </script>
@endsection
