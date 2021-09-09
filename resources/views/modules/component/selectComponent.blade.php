@extends('layouts.admin.app')
@section('title','Componentes')
@section('breadcum','Seleccione Componente')
@section('volver','')
@section('content')
<div class="col-lg-10 offset-lg-1 col-md-12">
    <div class="card mt-4">
        <form action="{{ route('user.search') }}" method="get" id="form_search">
            <div class="form-group input-group mb-0">
                @csrf
                <div class="form-group input-group mb-0">
                    <input id="text" type="text" class="form-control mb-0" name="name" placeholder="Buscar..">
                    <span class="input-group-text"><a href=""><i class="fas fa-search"></i></span>
                </div>
            </div>
        </form>
         @forelse($items as $item)
         <a href="{{ route('component.formdinamic',$item->id) }}" class="card-body" style="border-bottom: 1px solid #ccc">
              <div class="row">
                  <div class="col-md-10">
                       <h5>{{ $item->name }}</h5>
                       <small class="text-custom">familia :
                        @foreach ($families as $family)
                        @if ($family->id == $item->family_id)
                            {{$family->label}}
                        @endif
                        @endforeach
                    </small>

                  </div>
                  <div class="col-md-2">
                    <small class="text-custom float-right">No Parte: {{ $item->partNum }}</small>
                    {{-- <a href="{{ route('part.edit',$item->id) }}"><i class="far fa-edit"></i></a> --}}
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
     </div>
    </div>
@endsection
