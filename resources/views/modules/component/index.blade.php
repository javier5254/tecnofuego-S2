@extends('layouts.admin.app')
@section('title', 'Componentes')
@section('breadcum', 'Componentes')
@section('volver', '')
@section('content')
    <div class="col-lg-10 offset-lg-1 col-md-12">
        <a class="btn btn-success text-white mt-1" href="{{ route('component.create') }}"><i class="fas fa-plus"></i>
            Agregar Componente</a>
        <div class="card mt-4">

            <form action="{{ route('client.search') }}" method="get" id="form_search">
                <div class="form-group input-group mb-0">
                    @csrf
                    <div class="form-group input-group mb-0">
                        <input type="text" class="form-control mb-0" id="SearchComponent" name="SearchComponent"
                            placeholder="Buscar..">
                        <span class="input-group-text"><a href=""><i class="fas fa-search"></i></span>
                    </div>
                </div>
            </form>

            <div id="table_data">
                @include('modules.component.tableajax')
            </div>

        </div>



    </div>

@stop
@section('script')

    <script>
        $(document).ready(function() {
            // $(document).on('click', '.page-item a', function(event) {
            //     event.preventDefault();
            //     var page = $(this).attr('href').split('page=')[1];
            //     fetch_data(page);
            // });
            // function fetch_data(page) {
            //     var _token = $("input[name=_token]").val();
            //     $.ajax({
            //         url: "{{ route('component.fetch_data') }}",
            //         method: "POST",
            //         data: {
            //             _token: _token,
            //             page: page
            //         },
            //         success: function(data) {
            //             $('#table_data').html(data);
            //         }
            //     });
            // }
        });
        function imprimir() {
            var ficha = document.getElementById('toprint');
            var ventimp = window.open(' ', 'popimpr');
            ventimp.document.write(ficha.innerHTML);
            ventimp.document.close();
            ventimp.print();
            ventimp.close();
        }
        $("#SearchComponent").keyup(function(e) {
            var day , month, year;
            $.ajax({
                url: 'component/search',
                method: 'POST',
                data: {
                    value: $('input[name="SearchComponent"]').val(),
                    _token: $('input[name="_token"]').val()
                }
            }).done(function(res) {
                var arreglo = JSON.parse(res);
                $('#contenendor').html('');
                if (arreglo.length == 0) {
                    $('#contenendor').html('<h3 class="py-3 mx-auto" t><small>No se encontraron registros</small></h4>');
                }
                for (let x = 0; x < arreglo.length; x++) {
                    id = arreglo[x].id;
                    name = arreglo[x].name;
                    cname = arreglo[x].cname;
                    pname = arreglo[x].pname;
                    value = arreglo[x].value;
                    state = arreglo[x].state;
                    internalN = arreglo[x].internalN;
                    created_at = arreglo[x].created_at;
                    equipocompostate = arreglo[x].equipocompostate;
                    state = state ? 'Activo' : 'Inactivo';
                    internalN = internalN ? internalN : 'N/A';
                    if (internalN != 'N/A') {
                        state = 'Asignado';
                    }
                    if (equipocompostate == 0) {
                        state = 'Activo';
                        internalN =  'N/A';
                    }
                    var todo = '<a href="component/' + id +
                        '/edit" class="card-body border bottom col-12 text-capitalize">';
                    todo += '<div class="row">';
                    todo += '<div class="col-10">';
                    todo += '<h3 style="mb-0"><small>' + name + '</small></h4>';
                    todo += '<small class="mb-0 text-custom">Serial : ' + value + '</small><br> ';
                    todo += '<small class="mb-0 text-custom">Equipo : ' + internalN + '</small><br> ';
                    todo += '<small class="mb-0 text-custom"> ' + cname + ' | ' + pname + ' | ' + state + '</small> ';
                    todo += '</div>';
                    todo += '<div class="col-2">';
                    todo += '<p class="float-right">';
                    todo += created_at
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
