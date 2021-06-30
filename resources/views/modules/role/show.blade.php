@extends('layouts.admin.app')
@section('title','detalle  rol')
@section('breadcum','Roles / detalle rol')
@section('volver','si')
@section('content')

    <div class="card text-left">
      <div class="card-body">
        
           
             <div class="row pull-right">
                <a href="{{ route('role.edit', $row->id) }}" class="dropdown-item" title="Editar Rol">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="javascript:{}" onclick="document.getElementById('form_delete').submit(); return false;" class="dropdown-item" title="Eliminar Rol">
                    <i class="fa fa-trash text-danger"></i>
                </a>
                <form method="post" action="{{ route('role.destroy', $row->id) }}" id="form_delete">
                    <input type="hidden" name="_method" value="delete">
                    @csrf
                </form>
            </div>
            <div class="row">
                <div class="col-12 col-md-4">
                    <p><b>Nombre</b> <br> {{ $row->name }}</p>
                </div>
                <div class="col-12 col-md-8">
                    <p><b>Descripción</b> <br> {{ $row->description }}</p>
                </div>
            </div>
        
      </div>
    </div>



    <div class="card text-left">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $can_view_permissions = auth()->user()->can('admin-permission-show');
                        @endphp

                        @foreach ($row->permissions as $permission)
                            <tr>
                                <td>
                                    @if($can_view_permissions)
                                        <a href="{{ route('modules.permission.show', $row->id) }}">
                                            {{ $permission->name }}
                                        </a>
                                    @else
                                        {{ $permission->name }}
                                    @endif
                                </td>
                                <td>{{ $permission->description }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card text-left">
      
      <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nombres y Apellidos</th>
                        <th>Login</th>
                        <th>Correo Electrónico</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($row->users as $user)
                        <tr>
                            <td><a href="">{{ $user->first_name . ' ' . $user->last_name}}</a></td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
      </div>
    </div>

   
    


       

@stop

@if( session()->has('process_result') )
    @section('scripts')
        <script>
            $(function() {
                toastr.{{ session('process_result')['status'] }}('{{ session('process_result')['content'] }}')
            });
        </script>
    @endsection
@endif