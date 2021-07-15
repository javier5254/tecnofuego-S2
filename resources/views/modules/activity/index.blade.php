@extends('layouts.admin.app')
@section('title','Equipos')
@section('breadcum','Equipos')
@section('volver','')
@section('content') 
    <div class="col-lg-10 offset-lg-1 col-md-12">
        
        <a class="btn btn-success text-white mt-1" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> continuar
        </a>
        <div class="card mt-4">
            
        <form action="" method="get" id="form_search">
            <div class="form-group input-group mb-0">
                @csrf
                <div class="form-group input-group mb-0">
                    <input id="SearchList" type="text" class="form-control mb-0" name="SearchList" placeholder="Buscar..">
                    <span class="input-group-text"><a href=""><i class="fas fa-search"></i></span>
                </div>
            </div>
        </form>
            
        <div class="row col-12 m-0 p-0" id="contenendor">
            @forelse($equips as $equip)
                    <div class="card-body border bottom col-12">
                        <div class="row">
                            <div class="col-10">
                                @php
                                if($equip->detection == 'S' && $equip->extinction == 'S'){
                                    $module += 5;
                                }
                                @endphp
                                <a href="{{route('activity.create',$equip->id."-".$module)}}">
                                    <h3 class="m-0 p-0"><small>No Interno: {{ $equip->internalN }} </small></h3>
                                    <small class="text-gray">{{ $equip->flota }} | {{ $equip->marca }}/{{ $equip->modelo }}</small><br>
                                    <small class="text-gray">{{ $equip->cname }} | {{ $equip->pname }}</small>
                                </a>

                            </div>
                            <div class="col-2">
                                <small class="pull-right">
                                    {{ date('d/m/Y', strtotime($equip->created_at)) }}
                                </small><br>
                                <a href="#" data-toggle="modal" data-target="#modal-md"
                                    class="text-success d-block pull-right mr-2">
                                    {!! QrCode::size(40)->generate(Request::url('equipment.edit', $equip->id)) !!}
                                </a>
                            </div>
                        </div>
                    </div>
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

                    {{ $equips->links() }}
                </div>
        </div>
        
    </div>
    

            <!-- Modal -->
        

            <!-- Modal -->
            <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <h5 class="text-center" id="exampleModalLabel">Atencion</h5>
                            <i class="fa fa-warning fa-3x my-2"></i>
                            <p class="w-50 mx-auto my-2">Asegúrese de diligenciar todos los permisos de trabajo requeridos para la ejecución de cada
                                tarea.</p>
                            <a href="{{ route('activity.create','1') }}" class="btn btn-success my-2">
                                <small class="mx-2">
                                    Entendido
                                </small>
                                <i class="fa fa-arrow-right float-right mt-1"></i>
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>    
    
    <div class="modal fade" id="modal-md">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="padding-5">
                        <div class="row">
                            <div class="my-auto mx-auto px-4 py-2">
                                {!! QrCode::size(140)->generate('hola'); !!} 
                                <button class="btn btn-secondary text-white d-block center mt-4" href="#"><i class="fas fa-print"></i> imprimir QR </button>
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
    $("#SearchList").keyup(function(e){
        
       $.ajax({
        url: 'equipment/search',
        method: 'POST',
        data:{
            value: $('input[name="SearchList"]').val(),
            _token: $('input[name="_token"]').val()
        }
       }).done(function(res){
            var arreglo = JSON.parse(res);
            $('#contenendor').html('');
            for (let x = 0; x < arreglo.length; x++) {
                    id = arreglo[x].id;
                    name = arreglo[x].name; 
                    state = arreglo[x].state; 
                    state = state ? 'Activo' : 'Inactivo';
                    var todo = '<a href="equipment/'+id+'/edit" class="card-body border bottom col-12 text-capitalize">';
                    todo+= '<div class="row">';
                    todo+=      '<div class="col-10">';
                    todo+=          '<h3 style="mb-0"><small>'+name+'</small></h4>';
                    todo+=          '<p class="mb-0"> '+state+' </p> ';   
                    todo+=      '</div>';
                    todo+=        '<div class="col-2">';
                    todo+=            '<p class="float-right">';
                    todo+=               ''
                    todo+=            '</p>';
                    todo+=        '</div>';
                    todo+= '</div>';
                    todo+= '</a>';
                $('#contenendor').append(todo);   

            }
       });
    })
</script>

@endsection
