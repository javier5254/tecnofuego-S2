@extends('layouts.admin.app')
@section('title', 'Componentes')
@section('breadcum', 'Componentes')
@section('volver', '')
@section('content')
<div class="col-lg-10 offset-lg-1 col-md-12">
    <a class="btn btn-success text-white mt-1" href="{{ route('component.create') }}"><i class="fas fa-plus"></i>
        Agregar Componente</a>
    <div class="card mt-4">


        <div class="form-group input-group mb-0">
            @csrf
            <div class="form-group input-group mb-0">
                <input type="text" class="form-control mb-0" id="SearchComponent" name="SearchComponent" placeholder="Buscar..">
                <span class="input-group-text"><a href="">
                        <a type="button" class="text-success" id="SearchComponentBtn">
                            <i class="fas fa-search"></i>
                        </a>
                </span>

            </div>
        </div>


        <div id="table_data">
            @include('modules.component.tableajax')
        </div>

    </div>



</div>

@stop
@section('script')

<script>
    $(document).ready(function() {
        $(document).on('click', '.page-item a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        function fetch_data(page) {
            var _token = $("input[name=_token]").val();
            $.ajax({
                url: "{{ route('component.fetch_data') }}",
                method: "POST",
                data: {
                    _token: _token,
                    page: page
                },
                success: function(data) {
                    $('#table_data').html(data);
                }
            });
        }
    });

    function imprimir(id) {
        var ficha = document.getElementById('toprint' + id);
        var ventimp = window.open(' ', 'popimpr');
        ventimp.document.write(ficha.innerHTML);
        ventimp.document.close();
        ventimp.print();
        ventimp.close();
    }
    $("#SearchComponentBtn").click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('component.fetch_dataSearch') }}",
            method: 'POST',
            data: {
                value: $('input[name="SearchComponent"]').val(),
                _token: $('input[name="_token"]').val()
            }
        }).success(function(res) {
            $('#contenendor').html(res);
        });
    })
</script>
@endsection