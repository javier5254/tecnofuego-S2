@extends('layouts.admin.app')
@section('title', 'Servicios')
@section('breadcum', 'Servicios')
@section('volver', '')
@section('content')
    <div class="col-lg-10 offset-lg-1 col-md-12">
        <a class="btn btn-success text-white mt-1" href="{{ route('serv.create') }}"><i class="fas fa-plus"></i> Agregar
            servicio</a>
        <div class="card mt-4">
            <form action="{{ route('serv.search') }}" method="get" id="form_search">
                <div class="form-group input-group mb-0">
                    @csrf
                    <div class="form-group input-group mb-0">
                        <input id="SearchServ" type="text" class="form-control mb-0" name="SearchServ"
                            placeholder="Buscar..">
                        <span class="input-group-text"><a href=""><i class="fas fa-search"></i></span>
                    </div>
                </div>
            </form>
            <div class="row col-12 m-0 p-0" id="contenendor">
                @forelse($items as $item)
                    <a href="{{ route('serv.edit', $item->id) }}" class="card-body border bottom col-12">
                        <div class="row">
                            <div class="col-md-10">
                                <h5>{{ $item->name }}</h5>
                                <span class="text-custom">{{ $item->quantity }}</span><br>

                            </div>
                            <div class="col-md-2">
                                <small class="float-right text-custom">{{ date('d/m/Y', strtotime($item->created_at)) }}</small>
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
    $("#SearchServ").keyup(function(e) {

        $.ajax({
            url: 'serv/search',
            method: 'POST',
            data: {
                value: $('input[name="SearchServ"]').val(),
                _token: $('input[name="_token"]').val()
            }
        }).done(function(res) {
            var arreglo = JSON.parse(res);
            $('#contenendor').html('');
            for (let x = 0; x < arreglo.length; x++) {
                id = arreglo[x].id;
                name = arreglo[x].name;
                state = arreglo[x].state;
                created_at = arreglo[x].created_at;
                state = state ? 'Activo' : 'Inactivo';
                var todo = '<a href="serv/' + id +
                    '/edit" class="card-body border bottom col-12 text-capitalize">';
                todo += '<div class="row">';
                todo += '<div class="col-10">';
                todo += '<h3 style="mb-0"><small>' + name + '</small></h4>';
                todo += '<p class="mb-0"> ' + state + ' </p> ';
                todo += '</div>';
                todo += '<div class="col-2">';
                todo += '<p class="float-right">';
                todo += created_at;
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
