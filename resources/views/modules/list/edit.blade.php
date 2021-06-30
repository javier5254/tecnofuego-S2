@extends('layouts.admin.app')
@section('title', 'Editar Listas')
@section('breadcum', 'Listas / Editar Listas')
@section('volver', 'si')
@section('content')
    <div class="col-12 col-md-10 mx-auto">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">OPS! Parece que faltán campos por llenar...</h4>
                <hr>
                <ul class="list-unstyled">
                    @php
                        $cont = 1;
                    @endphp
                    @foreach ($errors->all() as $error)
                        <li>{{ $cont++ . '. ' . $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <form action="{{ route('list.update', $listas->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="label">Nombres de la lista</label>
                        <input type="text" name="label" id="label" class="form-control" value="{{ $listas->label }}">
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2 offset-md-9">
                                <label for="label" class="float-right">Tiene padre?</label>
                            </div>
                            <div class="col-md-1">
                                <div class="toggle-checkbox toggle-success checkbox-inline toggle-sm float-right">
                                    <input type="checkbox" name="son" id="son"
                                        {{ $listas->son ? 'checked value=1' : '' }}>
                                    <label for="son"></label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group nullable {{ $listas->son == 1 ? '' : 'd-none' }}">
                        <label for="lfather_id">Lista padre</label>
                        <select class="form-control" name="lfather_id" id="lfather_id">
                            <option disabled selected>Elije una lista</option>
                            @if ($listasOthers)
                                @forelse ($listasOthers as $lista)
                                    <option value="{{ $lista->id }}"
                                        {{ $listas->father_id == $lista->id ? 'selected' : '' }}>
                                        {{ $lista->label }}</option>
                                @empty
                                    <option disabled>No hay informacion.</option>
                                @endforelse
                            @endif
                        </select>
                    </div>

                    <div class="form-group nullable {{ $listas->son == 1 ? '' : 'd-none' }}">
                        <label for="vfather_id">Valor padre</label>
                        <select class="form-control" name="vfather_id" id="vfather_id">
                            <option disabled selected>Elije una lista</option>
                            @if ($valoresOthers)
                                @forelse ($valoresOthers as $valist)
                                    @if ($valist->list_id == $listas->father_id)
                                        <option value="{{ $valist->id }}">
                                            {{ $valist->label }}</option>
                                    @endif
                                @empty
                                    <option disabled>No hay informacion.</option>
                                @endforelse
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="description">valores de la lista</label>
                        <div id="contenedor">
                            @if ($valoreslistas)

                                @forelse ($valoreslistas as $valist)

                                    <div id="container{{ $valist->id }}"
                                        class="btn btn-default btn-inverse btn-rounded tags {{ $valist->state == 1 ? 'border border-success' : 'border border-danger' }}">
                                        @if ($valist->father_id != null)
                                            @foreach ($valoresOthers as $vlabel)

                                                @php
                                                    $father = $valist->father_id == $vlabel->id ? $valist->label . ' - ' . $vlabel->label : '';
                                                @endphp
                                                {{ $father }}
                                            @endforeach
                                        @else
                                            {{ $valist->label }}
                                        @endif
                                        &nbsp;&nbsp; <a onclick="remove(this.id)" id="{{ $valist->id }}"><i
                                                class="fa fa-close"></i></a>
                                        &nbsp;&nbsp; <a onclick="edit(this.id)" id="{{ $valist->id }}"><i
                                                class="fa fa-pencil"></i></a>
                                    </div>
                                    <input type="hidden" class="data" name="data[{{ $valist->label }}]"
                                        value="{{ $valist->label }}" id="data{{ $valist->id }}">
                                    <input type="hidden" value="{{ $valist->father_id }}"
                                        id="father[{{ $valist->id }}]">
                                @empty

                                @endforelse
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-12 mb-3">
                                <input id="panel" rows="3" class="form-control" placeholder="presiona enter para agregar">
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
            <button class="btn btn-success" type="submit">Guardar</button>
            <a href="{{ route('list.index') }}" class="btn btn-link">Cancelar</a>
        </div>
        </form>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar valores</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group nullable {{ $listas->son == 1 ? '' : 'd-none' }}">
                            <label for="father_edit">Valor padre</label>
                            <select class="form-control" name="father_edit" id="father_edit">
                                <option disabled selected>Elije una lista</option>
                                @if ($valoresOthers)
                                    @forelse ($valoresOthers as $valist)
                                        @if ($valist->list_id == $listas->father_id)
                                            <option value="{{ $valist->id }}">
                                                {{ $valist->label }}</option>
                                        @endif
                                    @empty
                                        <option disabled>No hay informacion.</option>
                                    @endforelse
                                @endif
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-9 col-12 mb-3">
                                <input id="panel_edit" rows="3" class="form-control" value="">
                                <input id="id_edit" type="hidden" value="">
                            </div>
                            <div class="col-md-3 col-12">
                                <label for="state_edit" class="float-right">Estado</label>
                                <div class="toggle-checkbox toggle-success checkbox-inline toggle-sm float-right">
                                    <input type="checkbox" name="state_edit" id="state_edit" checked>
                                    <label for="state_edit"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-success" onclick="update()">Guardar cambios</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script>
        function update() {
            var state;
            if (document.getElementById('state_edit').checked) {
                state = 1;
            }else{
                state = 0;
            }
            $.ajax({
                url: "{{ route('list.updatevalist') }}",
                type: 'POST',
                data: {
                    "id": $('#id_edit').val(),
                    "father_id": $('#father_edit').val(),
                    "label": $('#panel_edit').val(),
                    "state": state,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(res) {
                    $('#exampleModal').hide();
                    window.location.reload();
                }
            });
        }

        function edit(id) {
            
            $.ajax({
                url: "{{ route('list.findinfovalue') }}",
                type: 'POST',
                data: {
                    "id": id,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(res) {
                    var val = JSON.parse(res)
                    $('#exampleModal').modal();
                    if (val.father_id) {
                        $("#father_edit option[value=" + val.father_id + "]").attr("selected", true);
                    }
                    if (val.state == 1) {
                        $('#state_edit').prop('checked', true);
                    } else {
                        $('#state_edit').prop('checked', false);
                    }
                    document.getElementById('panel_edit').value = val.label;
                    document.getElementById('id_edit').value = val.id;
                }
            });

        }
        $("#vfather_id").change(function() {
            var todo;
            $('#contenedor').html('');
            $.ajax({
                url: "{{ route('list.filtervalues') }}",
                type: 'POST',
                data: {
                    "value": this.value,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(res) {
                    var val = JSON.parse(res)
                    for (let x = 0; x < val.length; x++) {
                        id = val[x].id;
                        label = val[x].label;
                        father_id = val[x].father_id;
                        state = val[x].state;
                        if (state == 1) {

                            todo =
                                '<div class="btn btn-default btn-inverse btn-rounded tags border border-success" id="container' +
                                id + '" value="' + label + '">' + label + " - " + $("#vfather_id option:selected").text() +
                                '&nbsp;&nbsp; <a onclick="remove(this.id)" id="' + id +
                                '"><i class="fa fa-close"></i></a> &nbsp;&nbsp; <a onclick="edit(this.id)" id="' +
                                id + '"><i class="fa fa-pencil"></i></a> </div>';
                        } else {

                            todo =
                                '<div class="btn btn-default btn-inverse btn-rounded tags border border-danger" id="container' +
                                id + '" value="' + label + '">' + label + " - " + $("#vfather_id option:selected").text() +
                                '&nbsp;&nbsp; <a onclick="remove(this.id)" id="' + id +
                                '"><i class="fa fa-close"></i></a> &nbsp;&nbsp; <a onclick="edit(this.id)" id="' +
                                id + '"><i class="fa fa-pencil"></i></a> </div>';
                        }
                        todo += ' <input type="hidden" value="' + father_id + '" id="father[' + id + ']">'
                        $('#contenedor').append(todo);
                    }
                }
            });

        });
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
                $("#father_id").val("");
                $("#list_id").val("");
            }
        });
        $("#panel").keypress(function(e) {
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

        function removeNew(id) {
            $("#" + id).remove();
            $("#data" + id).remove();
            $("#container" + id).remove();
            $("#father" + id).remove();
        }

        function remove(id) {

            $.ajax({
                url: "{{ route('list.destroy', ' + id + ') }}",
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(res) {
                    $("#" + id).remove();
                    $("#data" + id).remove();
                    $("#container" + id).remove();
                    $("#father" + id).remove();
                }
            });
        }

    </script>
@endsection
