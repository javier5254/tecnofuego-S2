@php
    switch ($module) {
        case 1:
            $modules = 'inspeccion';
            break;
        
        case 2:
            $modules = 'mantenimiento';
            break;
        
        case 3:
            $modules = 'recarga';
            break;
        
        case 4:
            $modules = 'reinstalacion';
            break;
        
        case 5:
            $modules = 'emergencia';
            break;
        
        default:
            $modules = "undefined";
            break;
    }
@endphp
@extends('layouts.admin.app')
@section('title', $modules)
@section('breadcum', $modules)
@section('volver', '')
@section('content')

    <div class="col-lg-10 offset-lg-1 col-md-12">
        @can('client-create')

            <a class="btn btn-success text-white mt-1" href="{{ route('activity.index',$module) }}"><i class="fas fa-plus"></i> Agregar
                {{$modules}}
            </a>
         @endcan







        <div class="card mt-4">
                <div class="pill-success">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a href="#pills-success-1" class="nav-link" role="tab" data-toggle="tab">Codigo QR</a>
                        </li>
                        <li class="nav-item">
                            <a href="#pills-success-2" class="nav-link active" role="tab" data-toggle="tab" aria-selected="true">Buscar</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade" id="pills-success-1">
                            <div class="col-4 mx-auto py-5">
                                <video id="preview" src=""></video>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade in active" id="pills-success-2">
                            <div class="">
                                <form action="{{ route('client.search') }}" method="get" id="form_search">
                                    <div class="form-group input-group mb-0">
                                        @csrf
                                        <div class="form-group input-group mb-0">
                                            <input type="text" class="form-control mb-0" id="SearchComponent"
                                                name="SearchComponent" placeholder="Buscar..">
                                            <span class="input-group-text"><a href=""><i class="fas fa-search"></i></span>
                                        </div>
                                    </div>
                                </form>

                                <div class="row col-12 m-0 p-0" id="contenendor">
                                    @forelse ($vals as $val)
                                    <a href="{{route('activity.edit',$val->id)}}" class="card-body border bottom col-12">
                                        <div class="row">
                                            <div class="col-10">
                                                <h3 style="mb-0"><small>No interno: {{ $val->internalN }} </small></h3>
                                                <small class="text-gray">{{ $val->cname }} | {{ $val->pname }}</small>
                                            </div>
                                            <div class="col-2">
                                                <p class="float-right">
                                                    {{ date('d/m/Y', strtotime($val->created_at)) }}
                                                </p>
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
                        </div>
                    </div>

                </div>
        </div>
    </div>








@stop
@section('script')
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script type="text/javascript">
    var scanner = new Instascan.Scanner({
        video: document.getElementById('preview'),
        scanPeriod: 5,
        mirror: true
    });
    scanner.addListener('scan', function(content) {
        alert(content);
        //window.location.href=content;
    });
    Instascan.Camera.getCameras().then(function(cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[0]);
            $('[name="options"]').on('change', function() {
                if ($(this).val() == 1) {
                    if (cameras[0] != "") {
                        scanner.start(cameras[0]);
                    } else {
                        alert('No Front camera found!');
                    }
                } else if ($(this).val() == 2) {
                    if (cameras[1] != "") {
                        scanner.start(cameras[1]);
                    } else {
                        alert('No Back camera found!');
                    }
                }
            });
        } else {
            console.error('No cameras found.');
            alert('No cameras found.');
        }
    }).catch(function(e) {
        console.error(e);
        alert(e);
    });

</script>
<script>
    $("#SearchClient").keyup(function(e) {

        $.ajax({
            url: 'client/search',
            method: 'POST',
            data: {
                value: $('input[name="SearchClient"]').val(),
                _token: $('input[name="_token"]').val()
            }
        }).done(function(res) {
            var arreglo = JSON.parse(res);
            $('#contenendor').html('');
            for (let x = 0; x < arreglo.length; x++) {
                id = arreglo[x].id;
                name = arreglo[x].name;
                state = arreglo[x].state;
                state = state ? 'Activo' : 'Inactivo';
                var todo = '<a href="client/' + id +
                    '/edit" class="card-body border bottom col-12 text-capitalize">';
                todo += '<div class="row">';
                todo += '<div class="col-10">';
                todo += '<h3 style="mb-0"><small>' + name + '</small></h4>';
                todo += '<p class="mb-0"> ' + state + ' </p> ';
                todo += '</div>';
                todo += '<div class="col-2">';
                todo += '<p class="float-right">';
                todo += 'hola'
                todo += '</p>';
                todo += '</div>';
                todo += '</div>';
                todo += '</a>';
                $('#contenendor').append(todo);

            }
        });
    })

</script>
{{-- <div class="btn-group btn-group-toggle mb-5" data-toggle="buttons">
    <label class="btn btn-primary active">
        <input type="radio" name="options" value="1" autocomplete="off" checked> Front Camera
    </label>
    <label class="btn btn-secondary">
        <input type="radio" name="options" value="2" autocomplete="off"> Back Camera
    </label>
</div> --}}

@endsection
 