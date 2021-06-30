@extends('layouts.admin.app')
@section('title','Editar rol')
@section('breadcum','Roles / Editar rol')
@section('volver','si')
@section('content')


<div class="col-12 col-lg-10 offset-lg-1">
  
  @if ($content != '')
  
  <div class="alert {{ $content = 0 ? 'alert-danger' : 'alert-success'}} alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">{{ $content = 0 ? 'OPS! Parece que ocurrio un error intentalo mas tarde...' : 'El rol ha sido actualizado correctamente'}}</h4>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
  @endif
  @if ($errors->any())
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">OPS! <label class="text-lowercase">Parece que faltán campos por llenar...</label> </h4>
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

  <form action="{{ route('role.update', $row->id) }}" method="post">
      @method('PUT')
      @csrf
      <div class="card text-left">
        <div class="card-body">
          <div class="form-group">
              <label for="name"></label>
              <input name="name" id="name" class="form-control" type="text" value="{{$row->name}}" placeholder="nombre del rol">
          </div>
        </div>
      </div>


      

      <div class="card text-left">
        
        <div class="card-body px-5">
          <div class="row">
              <table class="table table-hover table-sm">
                <thead> 
                    <tr>
                        <th class="text-left">Modulo</th>
                        <th class="text-left">crear</th>
                        <th class="text-left">ver</th>
                        <th class="text-left">editar</th>
                    </tr>
                </thead>
                <tbody>   
                  @foreach ($modules as $module)
                    <tr>
                      <td class="text-left">{{ $module->description }}</td>
                      @foreach ($permissions as $cp)
                        @if ($cp->category_id == $module->id)
                          @if ($module->id == 8 || $module->id == 5)
                            <td></td>  
                            <td> 
                              <div class="checkbox text-left">
                              <input name="permission[{{$cp->id}}]" type="checkbox" id="{{$cp->id}}" value="{{$cp->id}}" {{$row->hasPermissionTo($cp->id) ? "checked" : "" }}>
                              <label for="{{$cp->id}}"></label>
                            </td>
                            <td></td>  
                          @else
                            <td> 
                              <div class="checkbox text-left">
                              <input name="permission[{{$cp->id}}]" type="checkbox" id="{{$cp->id}}" value="{{$cp->id}}" {{$row->hasPermissionTo($cp->id) ? "checked" : "" }}>
                              <label for="{{$cp->id}}"></label>
                            </td>
                          @endif
                        </div>
                        @endif
                        
                      @endforeach
                    </tr>
                  @endforeach
                  
                </tbody>
              </table>
              
          </div>
        </div>
      </div>

      <div class="row">
          <div class="col-12">
              <div class="float-right">
                  <a href="{{ route('role.index') }}" class="btn btn-outline-danger">Cancelar</a>
                  <button type="submit" class="ml-2 btn btn-success">Grabar</button>
              </div>
          </div>
      </div>

  </form>
</div>

@endsection
