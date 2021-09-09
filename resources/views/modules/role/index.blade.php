@extends('layouts.admin.app')
@section('title','Roles')
@section('breadcum','Roles')
@section('volver','')
@section('content')
    <div class="col-12 col-lg-10 offset-lg-1">
        <a class="btn btn-success text-white" href="{{ route('role.create') }}"><i class="fas fa-plus"></i> Agregar Rol</a>
        <div class="card mt-4">
            
                <div class="form-group input-group mb-0">
                    @csrf
                    <div class="form-group input-group mb-0">
                        <input id="SearchRole" type="text" class="form-control mb-0" name="SearchRole"
                            placeholder="Buscar..">
                        <span class="input-group-text"><a href="" class="text-custom"><i class="fas fa-search"></i></span>
                    </div>
                </div>
            

            <div class="row col-12 m-0 p-0" id="contenendor">
                @forelse($roles as $role)

                <a href="{{ route('role.edit', $role->id) }}" class="card-body border bottom col-12">
                    <div class="row">
                        <div class="col-10">
                            <h5>{{ $role->name }}</h5>
                        </div>
                        <div class="col-2">
                            <p class="float-right">
                                {{ date('d/m/Y', strtotime($role->created_at)) }}
                            </p>
                        </div>

                    </div>
                </a>
                @empty
                    <p>No hay informacion.</p>
                @endforelse
            </div>
        </div>
    </div>
    @stop
    @section('script')
    
    <script>
        $("#SearchRole").keyup(function(e) {
            if (e.which == 13) {
                        return false;
                }
            $.ajax({
                url: 'role/search',
                method: 'POST',
                data: {
                    value: $('input[name="SearchRole"]').val(),
                    _token: $('input[name="_token"]').val()
                }
            }).done(function(res) {
                var arreglo = JSON.parse(res);
                console.log(arreglo);
                var date;
                var month;
                $('#contenendor').html('');
                for (let x = 0; x < arreglo.length; x++) {
                    id = arreglo[x].id;
                    name = arreglo[x].name;
                    created_at = arreglo[x].created_at;
                    date = new Date(created_at);
                    month = date.getMonth() + 1;
                    var todo = '<a href="client/' + id +
                        '/edit" class="card-body border bottom col-12 text-capitalize">';
                    todo += '<div class="row">';
                    todo += '<div class="col-10">';
                    todo += '<h3 style="mb-0"><small>' + name + '</small></h4>';
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