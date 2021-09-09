@extends('layouts.admin.app')
@section('title','Crear Usuario')
@section('breadcum',' Crear Usuario')
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
                <form action="{{ route('user.store') }}" 
                enctype="multipart/form-data"
                method="POST">
                    @csrf
                    <div class="form-group mt-4"> 
                        <div class="row">
                            <div class="col-md-2 offset-md-9">
                                <label for="state" class="float-right">Activo</label>
                            </div>
                            <div class="col-md-1">
                                <div class="toggle-checkbox toggle-success checkbox-inline toggle-sm float-right">
                                    <input type="checkbox" name="state" id="state" checked>
                                    <label for="state"></label>
                                </div>    
                            </div>    
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" style="text-transform:none;">Nombres y apellidos</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}">
                        @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            Ingresa un nombre..
                          </div>
                        @else
                        <div class="valid-feedback">
                            Looks good!
                          </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="typeD_id" style="text-transform:none;">Tipo de documento</label>
                        <select name="typeD_id" id="typeD_id" class="form-control {{$errors->has('typeD_id') ? 'is-invalid' : ''}}">
                            <option disabled selected>  </option>
                            @forelse ($typeDocs as $type)
                                <option value="{{$type->id}}" {{ old('typeD_id') == $type->id ? 'selected' : '' }}>{{$type->label}}</option>    
                            @empty
                                <option disabled selected> No hay opciones disponibles </option>
                            @endforelse
                        </select>
                        @if ($errors->has('typeD_id'))
                        <div class="invalid-feedback">
                            Selecciona un tipo de documento..
                          </div>
                        @else
                        <div class="valid-feedback">
                            Looks good!
                          </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="dni">Cédula</label>
                        <input type="text" name="dni" id="dni" value="{{ old('dni') }}" class="form-control {{$errors->has('dni') ? 'is-invalid' : ''}}">
                        @if ($errors->has('dni'))
                        <div class="invalid-feedback">
                            Ingresa un documento..
                          </div>
                        @else
                        <div class="valid-feedback">
                            Looks good!
                          </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Correo</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}">
                        @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            Ingresa un correo..
                          </div>
                        @else
                        <div class="valid-feedback">
                            Looks good!
                          </div>
                        @endif
                    </div> 
                    <div class="form-group">
                        <label for="charge_id">Cargo</label>
                        <select name="charge_id" id="charge_id" class="form-control {{$errors->has('charge_id') ? 'is-invalid' : ''}}">
                            <option disabled selected>  </option>
                            @forelse ($charges as $charge)
                                <option value="{{$charge->id}}" {{ old('charge_id') == $charge->id ? 'selected' : '' }}>{{$charge->label}}</option>    
                            @empty
                                <option disabled selected> Sin coincidencias </option>
                            @endforelse
                        </select>
                        @if ($errors->has('charge_id'))
                        <div class="invalid-feedback">
                            Ingresa un cargo..
                          </div>
                        @else
                        <div class="valid-feedback">
                            Looks good!
                          </div>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label for="client_id">Cliente</label>
                        <select name="client_id" id="client_id" class="form-control" value="{{ old('client_id') }}">
                            <option disabled selected>  </option>
                            @forelse ($clients as $client)
                                <option value="{{$client->id}}" {{ old('client_id') == $client->id ? 'selected' : '' }}>{{$client->name}}</option>    
                            @empty
                                <option disabled selected> Sin coincidencias </option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="project_id">Proyecto</label>
                        <select name="project_id" id="project_id" class="form-control" value="{{ old('project_id') }}">
                            <option disabled selected> </option>
                            @forelse ($projects as $project)
                                <option value="{{$project->id}}" {{ old('project_id') == $project->id ? 'selected' : '' }}>{{$project->name}}</option>    
                            @empty
                                <option disabled selected> Sin coincidencias </option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label>foto</label><br>
                        <label for="profile_photo_path" class="pointer">
                            <span class="btn btn-default display-block no-mrg-btm">Choose file</span>
                            <input class="d-none" type="file" name="profile_photo_path" multiple="" id="profile_photo_path" value="{{ old('profile_photo_path') }}">
                        </label>
                    </div>
                    <div id="preview">
                        <img src="" alt="" id="img" class="img-fluid">
                    </div>
            </div>
        </div>
        <div class="pull-right">
            <button type="submit" class="btn btn-success btn-sm">Guardar</button>
            <a href="{{ route('user.index') }}" class="btn btn-link" type="submit">Cancelar</a>
        </form>
        </div>
    
    </div>
 
   

@stop
@section('script')
<script>
    document.getElementById("profile_photo_path").onchange = function(e) {
  // Creamos el objeto de la clase FileReader
  let reader = new FileReader();

  // Leemos el archivo subido y se lo pasamos a nuestro fileReader
  reader.readAsDataURL(e.target.files[0]);

  // Le decimos que cuando este listo ejecute el código interno
  reader.onload = function(){
    let preview = document.getElementById('preview'),
            image = document.getElementById('img');
            
            image.src = reader.result;

    
  };
}
</script>
    
@endsection