@extends('layouts.admin.app')
@section('title', 'Usuarios')
@section('breadcum', 'Usuarios')
@section('volver', '')
@section('content')
    <div class="col-lg-10 offset-lg-1 col-md-12">
        <a class="btn btn-success text-white mt-1" href="{{ route('user.create') }}"><i class="fas fa-plus"></i> Agregar
            Usuario</a>
        <div class="card mt-4">

           
                <div class="form-group input-group mb-0">
                    @csrf
                    <div class="form-group input-group mb-0">
                        <input id="SearchUser" type="text" class="form-control mb-0" name="SearchUser"
                            placeholder="Buscar..">
                        <span class="input-group-text"><a href=""><i class="fas fa-search"></i></span>
                    </div>
                </div>
          

            <div class="row col-12 m-0 p-0" id="contenendor">
                @forelse($users as $user)
                    <a href="{{ route('user.edit', $user->id) }}" class="card-body border bottom col-12">
                        <div class="row">
                            <div class="col-10">


                                <h4 style="mb-0"><small>{{ ucwords($user->name) }}</small></h4>
                                @if (isset($user->getRoleNames()[0]))
                                    <small class="mb-0 text-custom"> {{ $user->getRoleNames()[0] }} </small><br>
                                @else
                                    <small class="mb-0 text-custom"> {{ __('Sin Rol') }} </small><br>
                                @endif

                                <small class="mb-0 text-custom"> {{ $user->state ? 'Activo' : 'Inactivo' }} </small>
                            </div>
                            <div class="col-2">
                                <p class="float-right">
                                    {{ date('d/m/Y', strtotime($user->created_at)) }}
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
                <div class="p-4">

                    {{ $users->links() }}
                </div>
            </div>


        </div>
    </div>
@stop
@section('script')

    <script>
        $("#SearchUser").keyup(function(e) {
            if (e.which == 13) {
                return false;
            }
            $.ajax({
                url: 'user/search',
                method: 'POST',
                data: {
                    value: $('input[name="SearchUser"]').val(),
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
                    state = state ? "Activo" : "Inactivo";
                    date = new Date(created_at);
                    month = date.getMonth() + 1;
                    var todo = '<a href="user/' + id +
                        '/edit" class="card-body border bottom col-12 text-capitalize">';
                    todo += '<div class="row">';
                    todo += '<div class="col-10">';
                    todo += '<h4 style="mb-0"><small>' + name + '</small></h4>';
                    todo += '<small class="mb-0 text-custom">' + state + '</small> ';
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
