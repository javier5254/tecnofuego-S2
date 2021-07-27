@extends('layouts.admin.app')
@section('title', 'Actividades')
@section('breadcum', 'Actividades')
@section('volver', '')
@section('content')
    <div class="col-lg-10 offset-lg-1 col-md-12">


        <div class="row" id="contenendor">
            <!-- Button trigger modal -->
            <div class="col-12">


                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 mx-auto">
                                <label for="">
                                    Equipo:
                                </label><br>
                                <div class="row">
                                    <div class="col-4 text-center border">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="90" height="90" viewBox="0 0 90 90">
                                            <image id="NoPath_-_copia" data-name="NoPath - copia" width="90" height="90"
                                                opacity="0.2"
                                                xlink:href="data:image/png;base64,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" />
                                        </svg>
                                    </div>

                                    <div class="col-8 my-4">
                                        Marca: {{ $equip->marca }} <br>
                                        Modelo: {{ $equip->modelo }} <br>
                                        No Interno: {{ $equip->internalN }} <br>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-12">


                <div class="list-group">
                    @php
                        $cont = 1;
                    @endphp
                    <a class="list-group-item list-group-item-action" type="button" data-toggle="modal"
                        data-target="#generalmodal">{{ $cont }}. Información General Inicial</a>
                    <div class="d-none" id="containtask">
                        @foreach ($list as $l)
                            @php
                                $cont++;
                            @endphp
                            <a onclick="customModal(this.id)" id="{{ $l->id }}"
                                class="list-group-item list-group-item-action" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">{{ $cont . '. ' . $l->name }}</a>
                            <input type="hidden" id="title{{ $l->id }}" value="{{ $l->name }}">
                            <input type="hidden" id="description{{ $l->id }}" value="{{ $l->description }}">
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="customModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="title"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="description"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-success">Guardar cambios</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal infogeneral -->
            <div class="modal fade" id="generalmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-secondary p-3 rounded-0">
                            <h4 class="col-1">
                                <a class="text-md" data-dismiss="modal" aria-label="Close">
                                    <i class="fas fa-arrow-left text-white"></i>
                                </a>
                            </h4>
                            <h4 class="modal-title text-white col-9" id="exampleModalLabel">Informacion
                                general</h4>
                            <h5 class="col-2">
                                <a type="button" style="cursor:pointer;" class="text-white" onclick="saveInitial()">
                                    Guardar
                                </a>
                            </h5>
                        </div>
                        <div class="modal-body">
                            <form action="" id="initialinfo">
                                <div class="form-group">
                                    @php
                                        switch ($module) {
                                            case 1:
                                                $modules = 'inspección';
                                                break;
                                            
                                            case 2:
                                                $modules = 'mantenimiento';
                                                break;
                                            
                                            case 3:
                                                $modules = 'recarga';
                                                break;
                                            
                                            case 4:
                                                $modules = 'reinstalación';
                                                break;
                                            
                                            case 5:
                                                $modules = 'emergencia';
                                                break;
                                            case 6:
                                                $modules = 'inspección CF210';
                                                break;

                                                case 7:
                                                $modules = 'mantenimiento CF210';
                                                break;

                                                case 8:
                                                $modules = 'recarga CF210';
                                                break;

                                                case 9:
                                                $modules = 'reinstalación CF210';
                                                break;

                                                case 10:
                                                $modules = 'emergencia CF210';
                                                break;
                                            default:
                                                $modules = "undefined";
                                                break;
                                        }
                                    @endphp
                                    <p class="text-dark font-weight-semibold" style="text-transform:none;">Registre información general
                                        de la actividad de {{$modules}} </p>
                                </div>
                                <div class="form-group">
                                    <small for="">Fecha inicio</small>
                                    <input type="date" name="startDate" id="startDate" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <small for="">Hora inicio</small>
                                    <input type="time" name="startTime" id="startTime" class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <small for="">Horometro</small>
                                    <input type="text" name="horometer" id="horometer" class="form-control" placeholder="">
                                    <input type="hidden" name="type_id" id="type_id" value="{{$module}}">
                                    <input type="hidden" name="equip_id" id="equip_id" value="{{$id}}">
                                </div>
                                <div class="form-group">
                                    <small for="">Lugar</small>
                                    <select name="location_id" id="location_id" class="form-control">
                                        <option value=""></option>
                                        @foreach ($locations as $l)
                                            <option value="{{$l->id}}">{{$l->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    @stop


    @section('script')

        <script>
            function customModal(id) {
                var title = $('#title' + id).val();
                var description = $('#description' + id).val();
                console.log(description);
                $('#title').html(title);
                $('#description').html("<p>"+description+"</p>");
                $('#customModal').modal('show');
            }

            function saveInitial() {

                // state = $("#state").val(),
                    startDate = $("#startDate").val(),
                    startTime = $("#startTime").val(),
                    horometer = $("#horometer").val(),
                    location_id = $("#location_id").val(),
                    type_id = $("#type_id").val(),
                    equip_id = $("#equip_id").val(),
                    $.ajax({
                        url: "{{ route('activity.storeInitial') }}",
                        type: 'POST',
                        data: {
                            // "state": state,
                            "startDate": startDate,
                            "startTime": startTime,
                            "horometer": horometer,
                            "location_id": location_id,
                            "type_id": type_id,
                            "equip_id": equip_id,
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(res) {
                            console.log(res);
                            var url = "{{ route('activity.edit','id')}}";
                            url = url.replace('id', res);
                            window.location.href = url;
                        }
                    });
            }

        </script>


    @endsection
