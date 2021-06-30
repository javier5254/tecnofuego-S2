@extends('layouts.admin.app')
@section('title', 'tf')

@section('breadcum', 'Principal')
@section('volver', '')
@section('content')
    <div class="row">
        <div class="col-12 col-md-10 mx-auto" style="overflow-x:scroll;">
            <div class="row col-rows-5 h-25 mx-auto" style="width:150vh;">
                <div class="col mx-2 d-inline">
                    <div class="card h-75 shadow-1" style="background:#FFFAFA;opacity:.7;">
                        <div class="card-body text-center">
                            <label class="text-dark mb-0 text-normal" style="font-size:45px;line-height: 40px;">{{$r1}}</label><br>
                            <small class="text-dark text-normal">Inspecciones</small>
                        </div>
                    </div>
                </div>
                <div class="col mx-2 d-inline">
                    <div class="card h-75 shadow-1" style="background:#FFFAFA;opacity:.7;">
                        <div class="card-body text-center">
                            <label class="text-dark mb-0 text-normal" style="font-size:45px;line-height: 40px;">{{$r2}}</label><br>
                            <small class="text-dark text-normal">Mantenimientos</small>
                        </div>
                    </div>
                </div>
                <div class="col mx-2 d-inline">
                    <div class="card h-75 shadow-1" style="background:#FFFAFA;opacity:.7;">
                        <div class="card-body text-center">
                            <label class="text-dark mb-0 text-normal" style="font-size:45px;line-height: 40px;">{{$r3}}</label><br>
                            <small class="text-dark text-normal">Recargas</small>
                        </div>
                    </div>
                </div>
                <div class="col mx-2 d-inline">
                    <div class="card h-75 shadow-1" style="background:#FFFAFA;opacity:.7;">
                        <div class="card-body text-center">
                            <label class="text-dark mb-0 text-normal" style="font-size:45px;line-height: 40px;">{{$r4}}</label><br>
                            <small class="text-dark text-normal">Reinstalaciones</small>
                        </div>
                    </div>
                </div>
                <div class="col mx-2 d-inline">
                    <div class="card h-75 shadow-1" style="background:#FFFAFA;opacity:.7;">
                        <div class="card-body text-center">
                            <label class="text-dark mb-0 text-normal" style="font-size:45px;line-height: 40px;">{{$r5}}</label><br>
                            <small class="text-dark text-normal">Emergencias</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-10  mx-auto p-0">
            <div class="card w-100 shadow-1" style="">
                <div class="form-group input-group mb-0">
                    <input type="text" class="form-control mb-0" id="SearchActivities" name="SearchActivities" placeholder="Todos los registros..">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <span class="input-group-text"><i class="fas fa-sliders-h"></i></span>
                </div>
                <div class="row col-12 m-0 p-0" id="contenendor">
                    @forelse ($r7 as $activ)
                        <a href="" class="card-body border bottom col-12">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="text-custom mb-0 float-left">{{$activ->tyname}}</h5>
                                    <small class="text-custom float-right">{{$activ->created_at}}</small>
                                </div>
                                <div class="col-12">
                                    <small class="text-custom">Equipo: {{$activ->internalN}} / {{$activ->marca}} / {{$activ->modelo}}</small><br>
                                    <small class="text-custom">{{$activ->pname}} / {{$activ->cname}}</small><br>
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

                        {{ $r7->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    
    <script>
        $("#SearchActivities").keyup(function(e) {
            $('#contenendor').html('');
            $.ajax({
                url: 'home/search',
                method: 'POST',
                data: {
                    value: $('input[name="SearchActivities"]').val(),
                    _token: $('input[name="_token"]').val()
                }
            }).done(function(res) {
                var arreglo = JSON.parse(res);
                console.log(arreglo);
                var date;
                var month;
                for (let x = 0; x < arreglo.length; x++) {
                    id = arreglo[x].id;
                    tyname = arreglo[x].tyname;
                    internalN = arreglo[x].internalN;
                    marca = arreglo[x].marca;
                    marca = arreglo[x].internalN;
                    modelo = arreglo[x].modelo;
                    pname = arreglo[x].pname;
                    cname = arreglo[x].cname;
                    created_at = arreglo[x].created_at;
                    date = new Date(created_at);
                    month = date.getMonth() + 1;
                    var todo = '<a href="activity/' + id +
                        '/edit" class="card-body border bottom col-12 text-capitalize">';
                    todo += '<div class="row">';
                    todo += '<div class="col-12">';
                    todo += '<h5 class="text-custom mb-0 float-left">'+tyname+'</h5>';
                    todo += '<small class="text-custom float-right">'+date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear()+'</small>';
                    todo += '</div>';
                    todo += '<div class="col-12">';
                    todo += '<small class="text-custom">Equipo: '+internalN+' / '+marca+' / '+modelo+'</small><br>';
                    todo += '<small class="text-custom">'+pname+' / '+cname+'</small><br>';
                    todo += '</div>';
                    todo += '</div>';
                    todo += '</a>';
    
                $('#contenendor').append(todo);
                }
            });
        })
    
    </script>
    
@endsection
    