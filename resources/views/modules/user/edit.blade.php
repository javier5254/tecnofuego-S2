@extends('layouts.admin.app')
@section('title','Editar Usuarios')
@section('breadcum','Editar Usuario')
@section('volver','si')
@section('content')

<div class="col-lg-10 offset-lg-1 col-12">
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">OPS! <label class="text-lowercase">Parece que faltán campos por llenar...</label> </h4>
            <hr>
            <ul class="list-unstyled">
                @php 
                    $cont = 1
                @endphp
                @foreach ($errors->all() as $error)
                <li class="text-lowercase">{{ $cont++ . '. ' }}<label class="text-capitalize">El&nbsp;</label>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="card-body"> 
            <form action="{{ route('user.update',$user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @csrf
                <div class="form-group mt-4"> 
                    <div class="row">
                        <div class="col-md-2 offset-md-9">
                            <label for="state" class="float-right">Activo</label>
                        </div>
                        <div class="col-md-1">
                            <div class="toggle-checkbox toggle-success checkbox-inline toggle-sm float-right">
                                <input type="checkbox"  class="checkboxes" id="statec" {{ $user->state ? 'checked value=1': 'value=0'}}>
                                <label for="statec"></label>
                            </div>    
                        </div>    
                        <input type="hidden"  name="state" id="state" {{ $user->state ? 'value=1' : 'value=0'}}>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" style="text-transform:none;">Nombres y apellidos</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="typeD_id" style="text-transform:none;">Tipo de documento</label>
                    <select name="typeD_id" id="typeD_id" class="form-control">
                        <option disabled selected> elija una opción </option>
                        @forelse ($typeD as $type)
                            <option value="{{$type->id}}" {{ $type->id == $user->typeD_id ? 'selected' : '' }}>{{$type->label}}</option>    
                        @empty
                            <option disabled selected> No hay opciones disponibles </option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label for="dni">Número de documento</label>
                <input type="text" name="dni" id="dni" class="form-control" value="{{$user->dni}}">
                </div>
                <div class="form-group">
                    <label for="email">Correo</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="charge_id">Cargos</label>
                    <select name="charge_id" id="charge_id" class="form-control">
                        <option disabled selected> elija una opción </option>
                        @forelse ($charges as $charge)
                            <option value="{{$charge->id}}" {{ $charge->id == $user->charge_id ? 'selected' : '' }}>{{$charge->label}}</option>    
                        @empty
                            <option disabled selected> No hay opciones disponibles </option>
                        @endforelse
                    </select>

                </div>
                
                
                <div class="form-group">
                    <label for="client_id">Cliente</label>
                    <select name="client_id" id="client_id" class="form-control">
                        <option disabled selected> elija una opción </option>
                        @forelse ($clients as $client)
                            <option value="{{$client->id}}" {{ $client->id == $user->client_id ? 'selected' : '' }}>{{$client->name}}</option>    
                        @empty
                            <option disabled selected> No hay opciones disponibles </option>
                        @endforelse
                    </select>
                </div>
        
                <div class="form-group">
                    <label for="project_id">Proyecto</label>
                    <select name="project_id" id="project_id" class="form-control">
                        <option disabled selected> elija una opción </option>
                        @forelse ($projects as $project)
                            <option value="{{$project->id}}" {{ $project->id == $user->project_id ? 'selected' : '' }}>{{$project->name}}</option>    
                        @empty
                            <option disabled selected> No hay opciones disponibles </option>
                        @endforelse
                    </select>
                </div>
            </div>
            
        </div>
        <div class="card">
          <div class="card-body">
            <div class="form-group"> 
                <label for="client_id">Rol</label><br>
                <h5><a href="#" data-toggle="modal" data-target="#modal-md" class="text-success"><i class="fas fa-plus"></i> &nbsp; Asignar rol</a></h5>
            </div>
          </div>
        </div>
        <div class="pull-right">
            <button class="btn btn-success" type="submit">Guardar</button>
            <a class="btn btn-link" href="{{ route('user.index') }}">Cancelar</a>
        </div>
    </form>
      </div>
    </div>

    <div class="modal fade" id="modal-md">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="padding-5">
                        <div class="row">
                            <div class="my-auto mx-auto px-4 py-2">
                                <form action="{{ route('user.role', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <h4 style="text-transform: none;">Aquí puedes seleccionar uno o varios roles</h4>

                                    <div class="row">
                                        @foreach ($roles as $role)
                                        <div class="col-12">
                                            <div class="checkbox">
                                                <input name="roles[{{$role->id}}]" type="checkbox" id="{{$role->id}}" value="{{$role->id}}" {{$user->hasRole($role->id) ? "checked" : "" }}>
                                                <label for="{{$role->id}}">{{$role->name}}</label>
                                            </div>
                                        </div> 
                                        @endforeach  
                                    </div>
                                    <div class="pull-right">
                                        <button class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('script')

<script>
    $(".checkboxes").click(function() {
    chk = $(".checkboxes").prop('checked')  ? 1 : 0;
    $("#state").val(chk);
});
</script>
    
@endsection