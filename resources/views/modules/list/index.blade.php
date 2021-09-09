@extends('layouts.admin.app')
@section('title', 'Listas')
@section('breadcum', 'Listas')
@section('volver', '')
@section('content')
    <div class="col-lg-10 offset-lg-1 col-md-12">
        <a class="btn btn-success text-white mt-1" href="{{ route('list.create') }}"><i class="fas fa-plus"></i> Agregar
            Lista</a>
        <div class="card mt-4">

            
                <div class="form-group input-group mb-0">
                    @csrf
                    <div class="form-group input-group mb-0">
                        <input id="SearchList" type="text" class="form-control mb-0" name="SearchList"
                            placeholder="Buscar..">
                        <span class="input-group-text"><a href=""><i class="fas fa-search"></i></span>
                    </div>
                </div>
           

            <div class="row col-12 m-0 p-0" id="contenendor">
                @forelse($listas as $list)
                    <a href="{{ route('list.edit', $list->id) }}" class="card-body border bottom col-12">
                        <div class="row">
                            <div class="col-10">
                                <h3 style="mb-0"><small>{{ ucwords($list->label) }}</small></h4>
                                    <p class="mb-0"> Activo </p>
                            </div>
                            <div class="col-2">
                                <p class="float-right">
                                    {{ date('d/m/Y', strtotime($list->created_at)) }}
                                </p>
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
@stop
@section('script')

<script>
    $("#SearchList").keyup(function(e) {
        if (e.which == 13) {
                        return false;
                }
        $.ajax({
            url: 'list/search',
            method: 'POST',
            data: {
                value: $('input[name="SearchList"]').val(),
                _token: $('input[name="_token"]').val()
            }
        }).done(function(res) {
            var arreglo = JSON.parse(res);
            var date;
            var month;
            $('#contenendor').html('');
            for (let x = 0; x < arreglo.length; x++) {
                id = arreglo[x].id;
                label = arreglo[x].label;
                state = arreglo[x].state;
                if (state == 1) {
                    state = "Activo";
                } else {
                    state = "Inactivo";
                }
                created_at = arreglo[x].created_at;
                date = new Date(created_at);
                month = date.getMonth() + 1;
                var todo = '<a href="list/' + id +
                    '/edit" class="card-body border bottom col-12 text-capitalize">';
                todo += '<div class="row">';
                todo += '<div class="col-10">';
                todo += '<h3 style="mb-0"><small>' + label + '</small></h4>';
                todo += '<p class="mb-0"> ' + state + ' </p> ';
                todo += '</div>';
                todo += '<div class="col-2">';
                todo += '<p class="float-right">';
                todo += date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear()
                todo += '</p>';
                todo += '</div>';
                todo += '</div>';
                todo += '</a>';
                $('#contenendor').append(todo);

            }
        });
    })

</script>

@endsection
