@extends('layouts.admin.app')
@section('title','Editar cliente')
@section('breadcum','Clientes / Editar cliente')
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
            <form action="{{ route('client.update',$client->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group mt-4"> 
                    <div class="row">
                        <div class="col-md-2 offset-md-9">
                            <label for="state" class="float-right">Activo</label>
                        </div>
                        <div class="col-md-1">
                            <div class="toggle-checkbox toggle-success checkbox-inline toggle-sm float-right">
                                <input type="checkbox" name="state" id="state" {{ $client->state ? 'checked value=1': ''}}>
                                <label for="state"></label>
                            </div>    
                        </div>    
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">Nombre del cliente</label>
                    <input type="text" name="name" id="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" value="{{ $client->name }}">
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
                    <label for="name_person">Persona contacto</label>
                    <input type="text" name="name_person" id="name_person" class="form-control {{$errors->has('name_person') ? 'is-invalid' : ''}}" value="{{ $client->name_person }}">
                    @if ($errors->has('name_person'))
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
                    <label for="phone_person">Telefono contacto</label>
                    <input type="text" name="phone_person" id="phone_person" class="form-control" value="{{ $client->phone_person }}">
                </div>
                <div class="form-group">
                    <label for="description">Descripción del cliente</label>
                    <textarea name="description" id="description" rows="3" class="form-control">{{ $client->description }}</textarea>
                </div>
            
        </div>
    </div>
    <div class="pull-right">
        <button type="submit" class="btn btn-success btn-sm">Guardar</button>
        <a href="{{ route('client.index') }}" class="btn btn-link" type="submit">Cancelar</a>
    </div>
    </form>
</div>
@stop

