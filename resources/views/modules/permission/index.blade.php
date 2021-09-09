@extends('layouts.admin.app')
@section('title','Permisos')
@section('breadcum','Permisos')
@section('volver','')
@section('content')
     <div class="card">
         @forelse($agrees as $agree)
         <a href="{{ route('permission.edit',$agree->id) }}" class="card-body" style="border-bottom: 1px solid #ccc">
              <div class="row">
                  <div class="col-md-10">
                       <h5>{{ $agree->description }}</h5>
                        <span>Estado: {{  $agree->state == 1 ? 'Activo': 'Inactivo' }}</span><br>

                  </div>
                  <div class="col-md-2">
                      <span class="float-right">
                             Mar 09 2020
                          </span>
                  </div>

              </div>

         </a>
         @empty
            <p>No hay informacion.</p>
        @endforelse
     </div>
@endsection
