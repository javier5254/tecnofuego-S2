@extends('layouts.admin.app')
@section('title','Crear nuevo rol')
@section('breadcum','Roles / Crear nuevo rol')
@section('volver','si')
@section('content')



<div class="col-12 col-lg-10 offset-lg-1">
  <form action=" {{ route('role.store')}} " method="POST">
    @csrf
    <div class="card text-left">
      <div class="card-body">
        <div class="form-group"> 
            <label for="name"></label>
            <input name="name" id="name" class="form-control" type="text" value="" placeholder="nombre del rol">
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
                            <input name="permission[{{$cp->id}}]" type="checkbox" id="{{$cp->id}}" value="{{$cp->id}}">
                            <label for="{{$cp->id}}"></label>
                          </td>
                          <td></td>  
                        @else
                          <td> 
                            <div class="checkbox text-left">
                            <input name="permission[{{$cp->id}}]" type="checkbox" id="{{$cp->id}}" value="{{$cp->id}}">
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