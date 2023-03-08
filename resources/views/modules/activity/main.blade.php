@php
switch ($module) {
    case [1, 6]:
        $modules = 'inspeccion';
        break;

    case [2, 7]:
        $modules = 'mantenimiento';
        break;

    case [3, 8]:
        $modules = 'recarga';
        break;

    case [4, 9]:
        $modules = 'reinstalacion';
        break;

    case [5, 10]:
        $modules = 'emergencia';
        break;

    default:
        $modules = 'undefined';
        break;
}
@endphp
@extends('layouts.admin.app')
@section('title', $modules)
@section('breadcum', $modules)
@section('volver', '')
@section('content')

    <div class="col-lg-10 offset-lg-1 col-md-12">
        @can('activity-create')

            <a class="btn btn-success text-white mt-1" href="{{ route('activity.index', $module) }}"><i
                    class="fas fa-plus"></i> Agregar
                {{ $modules }}
            </a>
            <input type="hidden" name="" id="modules" value="{{ $modules }}">
        @endcan
        <div class="card mt-4">
            <div class="pill-success">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#pills-success-1" class="nav-link" role="tab" data-toggle="tab">Codigo QR</a>
                    </li>
                    <li class="nav-item">
                        <a href="#pills-success-2" class="nav-link active" role="tab" data-toggle="tab"
                            aria-selected="true">Buscar</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade" id="pills-success-1">
                        <div class="col-12 mx-auto py-5">
                            {{-- <video id="preview" src=""></video> --}}
                        </div>
                        <div class="select">
                            <label for="audioSource">Audio source: </label><select id="audioSource"></select>
                          </div>
                        
                          <div class="select">
                            <label for="videoSource">Video source: </label><select id="videoSource"></select>
                          </div>
                        
                          <video id="preview" autoplay muted playsinline></video>

                    </div>
                    <div role="tabpanel" class="tab-pane fade in active" id="pills-success-2">
                        <div class="">
                            <form action=" {{ route('equipment.search') }}" method="get" id="form_search">
                                <div class="form-group input-group mb-0">
                                    @csrf
                                    <div class="form-group input-group mb-0">
                                        <input type="text" class="form-control mb-0" id="SearchListActivities"
                                            name="" placeholder="Buscar..">
                                        <span class="input-group-text"><a href=""><i class="fas fa-search"></i></span>
                                    </div>
                                </div>
                            </form>

                            <div class="row col-12 m-0 p-0" id="contenendor">
                                @forelse ($vals as $val)
                                    <div class="card-body border bottom col-12 contentActivList" id="{{ $val->internalN }}">
                                        <div class="row">
                                            
                                            <div class="col-8">
                                                @if (isset($val->endDate))
                                                    <a href="#" onclick="notifycompleteactivity()">
                                                        <h3 class="mb-0"><small>{{$val->flota."  |  ".$val->marca}}</small>
                                                        </h3>
                                                        <h3 class="mb-0"><small>No interno: {{ $val->internalN }} </small>
                                                        </h3>
                                                        <small class="text-gray">{{ $val->cname }} |
                                                            {{ $val->pname }} | {{ $val->name }}</small>
                                                    </a>
                                                @else
                                                    <a href="{{ route('activity.edit', $val->id) }}">
                                                        <h3 class="mb-0"><small>{{$val->flota."  |  ".$val->marca}}</small>
                                                        </h3>
                                                        <h3 class="mb-0"><small>No interno: {{ $val->internalN }} </small>
                                                        </h3>
                                                        <small class="text-gray">{{ $val->cname }} |
                                                            {{ $val->pname }} | {{ $val->name }}</small>
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="col-md-1">

                                                @if (isset($val->endDate))
                                                    <button class="btn btn-success btn-sm"
                                                        onclick="exportTableToExcel('{{ $val->id }}')">
                                                        <i class="far fa-file-excel fa-lg"></i>
                                                    </button>
                                                @endif
                                            </div>
                                            <div class="col-1">
                                                <form method="POST" action="{{ route('activity.destroy', $val->id) }}">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger text-white btn-sm"><i
                                                            class="fa fa-times"></i></button>
                                                </form>
                                            </div>
                                            <div class="col-2">
                                                <p class="float-left">
                                                    {{ date('d/m/Y', strtotime($val->created_at)) }}
                                                </p>
                                            </div>

                                        </div>
                                    </div>

                                @empty

                                    <a href="#" class="card-body" style="border-bottom: 1px solid #ccc">
                                        <div class="row">
                                            <div class="col-md-10 offset-md-1">
                                                <h5 class="text-center text-gray" style="text-transform: none;">No se
                                                    encontraron registros</h5>

                                            </div>

                                        </div>
                                    </a>
                                @endforelse

                            </div>
                            <div class="d-none">
                                <table id="tableExport">
                                    <tr></tr>
                                    <tr></tr>
                                    <tr>
                                        <th></th>
                                        <th colspan='2'>
                                            {{-- <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="79" height="78" viewBox="0 0 79 78">
                                        <defs>
                                          <pattern id="pattern" width="1" height="1" viewBox="2.35 -10.465 74.3 73.36">
                                            <image preserveAspectRatio="none" width="79" height="78" xlink:href="data:image/png;base64,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"/>
                                          </pattern>
                                        </defs>
                                        <rect id="NoPath_-_copia" data-name="NoPath - copia" width="79" height="78" fill="url(#pattern)"/>
                                      </svg> --}}
                                            Logotipo TF

                                        </th>
                                        <th colspan='3' id="formate"></th>
                                        <th colspan='2'>Fecha : {{ date('d-m-Y') }}</th>
                                    </tr>


                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal py-4 col-8 mx-auto" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <h5 class="text-center" id="exampleModalLabel">Atenci&oacute;n</h5>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="63"
                                height="62" viewBox="0 0 63 62">
                                <defs>
                                    <filter id="Polígono_18" x="0" y="0" width="63" height="62"
                                        filterUnits="userSpaceOnUse">
                                        <feOffset dy="3" input="SourceAlpha" />
                                        <feGaussianBlur stdDeviation="3" result="blur" />
                                        <feFlood flood-opacity="0.161" />
                                        <feComposite operator="in" in2="blur" />
                                        <feComposite in="SourceGraphic" />
                                    </filter>
                                </defs>
                                <g id="Grupo_142" data-name="Grupo 142" transform="translate(-258 -173)">
                                    <g transform="matrix(1, 0, 0, 1, 258, 173)" filter="url(#Polígono_18)">
                                        <g id="Polígono_18-2" data-name="Polígono 18" transform="translate(9 6)"
                                            fill="#f6f61a" stroke-linecap="round" stroke-linejoin="round">
                                            <path
                                                d="M 41.73094940185547 43.00000381469727 L 3.269049882888794 43.00000381469727 C 2.763159990310669 43.00000381469727 2.503979921340942 42.66563415527344 2.416029930114746 42.52188491821289 C 2.32807993888855 42.37812423706055 2.148380041122437 41.99512481689453 2.378700017929077 41.54471588134766 L 21.60964965820312 3.937525272369385 C 21.7840690612793 3.596445322036743 22.11691093444824 3.392815351486206 22.5 3.392815351486206 C 22.88308906555176 3.392815351486206 23.2159309387207 3.596445322036743 23.39035034179688 3.937525272369385 L 42.62129974365234 41.54471588134766 C 42.85161972045898 41.99512481689453 42.67192077636719 42.37812423706055 42.58396911621094 42.52188491821289 C 42.49602127075195 42.66563415527344 42.23683929443359 43.00000381469727 41.73094940185547 43.00000381469727 Z"
                                                stroke="none" />
                                            <path
                                                d="M 22.5 4.392814636230469 L 3.269050598144531 41.99998474121094 C 3.269046783447266 41.9999885559082 3.269046783447266 41.99999237060547 3.269046783447266 41.99999618530273 C 3.269046783447266 41.99999618530273 3.269046783447266 41.99999618530273 3.269050598144531 41.99999618530273 L 41.73094177246094 41.99999618530273 L 22.5 4.392814636230469 M 22.5 2.392807006835938 C 23.20464706420898 2.392807006835938 23.90929412841797 2.755950927734375 24.28068923950195 3.482234954833984 L 43.51163101196289 41.08941650390625 C 44.1921501159668 42.42020416259766 43.22563171386719 43.99999618530273 41.73094940185547 43.99999618530273 L 3.269050598144531 43.99999618530273 C 1.774368286132812 43.99999618530273 0.8078498840332031 42.42020416259766 1.488361358642578 41.08941650390625 L 20.71931076049805 3.482234954833984 C 21.09070587158203 2.755950927734375 21.79535293579102 2.392807006835938 22.5 2.392807006835938 Z"
                                                stroke="none" fill="#000" />
                                        </g>
                                    </g>
                                    <text id="_" data-name="!" transform="translate(284 216)" font-size="30"
                                        font-family="Helvetica">
                                        <tspan x="0" y="0">!</tspan>
                                    </text>
                                </g>
                            </svg>

                            <input type="hidden" id="equip_id">
                            <input type="hidden" id="model_id">
                            <div class="container">
                                <div class="" id="contain1">
                                    <p class="w-50 mx-auto my-2" style="text-transform:none;">Aseg&uacute;rese de contar con
                                        los
                                        EPP adecuados y en buen estado para la ejecuci&oacute;n de cada tarea.</p>
                                    <a class="btn btn-success my-2 text-white" id="btn1" onclick="dinamicpopup(this.id)">
                                        <small class="mx-2">
                                            Entendido
                                        </small>
                                    </a>
                                </div>
                                <div class="d-none" id="contain2">
                                    <p class="w-50 mx-auto my-2" style="text-transform:none;">Aseg&uacute;rese de
                                        diligenciar
                                        todos los permisos de trabajo requeridos para la ejecuci&oacute;n de cada tarea.</p>
                                    <a class="btn btn-success my-2 text-white" id="btn2" onclick="dinamicpopup(this.id)">
                                        <small class="mx-2">
                                            Entendido
                                        </small>
                                    </a>
                                </div>
                                <div class="d-none" id="contain3">
                                    <p class="w-50 mx-auto my-2" style="text-transform:none;">Verifique que las &aacute;reas
                                        de
                                        riesgo del equipo no hayan cambiado de su ubicaci&oacute;n original, en caso de ser
                                        as&iacute; notif&iacute;quelo inmediatamente a su Supervisor.</p>
                                    <a class="btn btn-success my-2 text-white" id="btn3" onclick="dinamicpopup(this.id)">
                                        <small class="mx-2">
                                            Entendido
                                        </small>
                                    </a>
                                </div>
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
       

        var videoElement = document.querySelector('video');
        var audioSelect = document.querySelector('select#audioSource');
        var videoSelect = document.querySelector('select#videoSource');

        audioSelect.onchange = getStream;
        videoSelect.onchange = getStream;

        getStream().then(getDevices).then(gotDevices);

        function getDevices() {
            // AFAICT in Safari this only gets default devices until gUM is called :/
            return navigator.mediaDevices.enumerateDevices();
        }

        function gotDevices(deviceInfos) {
            window.deviceInfos = deviceInfos; // make available to console
            console.log('Available input and output devices:', deviceInfos);
            for (const deviceInfo of deviceInfos) {
                const option = document.createElement('option');
                option.value = deviceInfo.deviceId;
                if (deviceInfo.kind === 'audioinput') {
                    option.text = deviceInfo.label || `Microphone ${audioSelect.length + 1}`;
                    audioSelect.appendChild(option);
                } else if (deviceInfo.kind === 'videoinput') {
                    option.text = deviceInfo.label || `Camera ${videoSelect.length + 1}`;
                    videoSelect.appendChild(option);
                }
            }
        }

        function getStream() {
            if (window.stream) {
                window.stream.getTracks().forEach(track => {
                    track.stop();
                });
            }
            const audioSource = audioSelect.value;
            const videoSource = videoSelect.value;
            const constraints = {
                audio: {
                    deviceId: audioSource ? {
                        exact: audioSource
                    } : undefined
                },
                video: {
                    deviceId: videoSource ? {
                        exact: videoSource
                    } : undefined
                }
            };
            return navigator.mediaDevices.getUserMedia(constraints).
            then(gotStream).catch(handleError);
        }

        function gotStream(stream) {
            window.stream = stream; // make stream available to console
            audioSelect.selectedIndex = [...audioSelect.options].
            findIndex(option => option.text === stream.getAudioTracks()[0].label);
            videoSelect.selectedIndex = [...videoSelect.options].
            findIndex(option => option.text === stream.getVideoTracks()[0].label);
            videoElement.srcObject = stream;
        }

        function handleError(error) {
            console.error('Error: ', error);
        }




        var scanner = new Instascan.Scanner({
            video: document.getElementById('preview'),
            scanPeriod: 5,
            mirror: true
        });
        scanner.addListener('scan', function(content) {
            alert(content);

            $("#equip_id").val(content);
            $("#SearchActivities").val(content);
            $("#exampleModal").modal('show');

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
                        if (cameras[2] != "") {
                            scanner.start(cameras[2]);
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
            alert('No logramos conectarnos a tu camara para escanear QR');
        });
    </script>
    <script>
         $("#SearchListActivities").keyup(function(e) {
            e.preventDefault();
            var txtType = $("#SearchListActivities").val();
            var contentActivList = document.querySelectorAll('.contentActivList');
            if (txtType == ''){
                contentActivList.forEach(function(contentActivList) {
                    contentActivList.classList.remove("d-none")
                })
            }else{
                contentActivList.forEach(function(contentActivList) {
                    // 
                    contentActivList.classList.add("d-none");
                    var idImportant = contentActivList.id
                    // console.log(idImportant)
                    var v1 ='';           
                    // idImportant = idImportant.toString
                    for(var i = 0; i < txtType.length; i++){
                        // 
                            if ( txtType.length > 1 ){
                                for(var o = 0; o < txtType.length; o++){
                                    v1 += idImportant.charAt(o)
                                }
                            }else{
                                var v1 = idImportant.charAt(i)
                            }
                            // 
                            if(txtType == v1){
                                console.log(txtType+" / "+idImportant)
                                contentActivList.classList.remove("d-none");
                            }else{
                                
                                
                            }
                        }
                    
                });
            }
        })
        function dinamicpopup(id) {
            switch (id) {
                case 'btn1':
                    $("#contain1").addClass("d-none");
                    $("#contain2").removeClass("d-none");
                    $("#contain3").addClass("d-none");
                    break;
                case 'btn2':
                    $("#contain1").addClass("d-none");
                    $("#contain2").addClass("d-none");
                    $("#contain3").removeClass("d-none");

                    break;
                case 'btn3':
                    var equip = $("#equip_id").val();
                    var model = "";
                    var modules = $("#modules").val();

                    switch (modules) {
                        case "inspeccion":
                            modules = 1;
                            break;
                        case "mantenimiento":
                            modules = 2;
                            break;
                        case "recarga":
                            modules = 3;
                            break;
                        case "reinstalacion":
                            modules = 4;
                            break;
                        case "emergencia":
                            modules = 5;
                            break;

                        default:
                            break;
                    }
                    $.ajax({
                        url: "{{ route('equipment.getFormat') }}",
                        method: 'POST',
                        data: {
                            value: equip,
                            _token: $('input[name="_token"]').val()
                        },
                        success: function(res) {
                            var response = JSON.parse(res);
                            console.log(response);
                            equip = response.id;
                            switch (response.sistema_id) {
                                case 175:
                                    response = parseInt(modules);
                                    break;
                                case 176:
                                    response = parseInt(modules) + 5;
                                    break;
                                default:
                                    response = parseInt(modules);
                                    break;
                            }
                            model = response;

                            window.location = ("/activity/" + equip + "-" + model + "/create");
                        }
                    });

                    console.log(equip);
                    console.log(model);

                    break;
                default:
                    break;
            }

        }


        function notifycompleteactivity() {
            alert("Esta actividad fue completada exitosamente, ya no puede ser modificada.");
        }
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

        function exportTableToExcel(value, filename = "") {


            $.ajax({
                url: '{{ route('activity.getEquip') }}',
                method: 'POST',
                data: {
                    value: value,
                    _token: "{{ csrf_token() }}",
                },
                success: function(res) {

                    var arreglo = JSON.parse(res);
                    console.log(arreglo);
                    console.log(arreglo.type_id);

                    id = arreglo.equips.id;
                    cname = arreglo.equips.cname;
                    detection = arreglo.equips.detection;
                    extinction = arreglo.equips.extinction;
                    flota = arreglo.equips.flota;
                    horometer = arreglo.equips.horometer;
                    internalN = arreglo.equips.internalN;
                    marca = arreglo.equips.marca;
                    modelo = arreglo.equips.modelo;
                    pname = arreglo.equips.pname;

                    switch (arreglo.type_id) {
                        case 1:
                            arreglo.type_id = "INSPECCIÓN A LOS SISTEMAS CHECKFIRE SC-N/LT-A/LVS";
                            break;
                        case 2:
                            arreglo.type_id =
                                "MANTENIMIENTO A LOS SISTEMAS CHECKFIRE SC-N/LT-A/LVS";
                            break;
                        case 3:
                            arreglo.type_id = "RECARGAS A LOS SISTEMAS CHECKFIRE SC-N/LT-A/LVS";
                            break;
                        case 4:
                            arreglo.type_id =
                                "REINSTALACION A LOS SISTEMAS CHECKFIRE SC-N/LT-A/LVS";
                            break;
                        case 5:
                            arreglo.type_id = "EMERGENCIA A LOS SISTEMAS CHECKFIRE SC-N/LT-A/LVS";
                            break;
                        case 6:
                            arreglo.type_id = "INSPECCION A LOS SISTEMAS CHECKFIRE 210/LT-A/LVS";
                            break;
                        case 7:
                            arreglo.type_id = "MANTENIMINETO A LOS SISTEMAS CHECKFIRE 210/LT-A/LVS";
                            break;
                        case 8:
                            arreglo.type_id = "RECARGA A LOS SISTEMAS CHECKFIRE 210/LT-A/LVS";
                            break;
                        case 9:
                            arreglo.type_id = "REINSTALACION A LOS SISTEMAS CHECKFIRE 210/LT-A/LVS";
                            break;
                        case 10:
                            arreglo.type_id = "EMERGENCIA A LOS SISTEMAS CHECKFIRE 210/LT-A/LVS";
                            break;
                        default:
                            arreglo.type_id = "N/A";
                            break;
                    }
                    var f = new Date();
                    filename = arreglo.type_id + " - No INTERNO " + internalN + " - " + f
                        .getDate() + "/" + (f
                            .getMonth() + 1) + "/" + f.getFullYear()
                    $('#formate').append(arreglo.type_id);
                    todo = "<tr>";
                    todo += "</tr>";
                    todo += "<td>";
                    todo += "</td>";
                    todo += "<td>";
                    todo += "Numero interno: " + internalN;
                    todo += "</td>";
                    todo += "<td>";
                    todo += "Detection: " + detection;
                    todo += "</td>";
                    todo += "<td>";
                    todo += "Cliente: " + cname + "/ Proyecto: " + pname;;
                    todo += "</td>";
                    todo += "<td>";
                    todo += "Extinction: " + extinction + "/ Flota: " + flota;
                    todo += "</td>";
                    todo += "<td>";
                    todo += "Marca: " + marca + "/ Modelo: " + modelo;
                    todo += "</td>";
                    todo += "<td>";
                    todo += "Horometro: " + horometer;
                    todo += "</td>";
                    todo += "</tr>";

                    $('#tableExport').append(todo);
                    todo = "";
                    todo += "<tr>";
                    todo += "</tr>";
                    todo += "<tr>";
                    todo += "<th>";
                    todo += "</th>";
                    todo += "<th colspan='2'>";
                    todo += "</th>";
                    todo += "<th colspan='3'>";
                    todo += " Actividades checklist ";
                    todo += "</th>";
                    todo += "</tr>";
                    todo += "<tr>";
                    todo += "</tr>";
                    todo += "<tr>";
                    todo += "<th>";
                    todo += "</th>";
                    todo += "<th colspan='2'>Nombre";
                    todo += "</th>";
                    todo += "<th colspan='3'>Descripcion";
                    todo += "</th>";
                    todo += "<th colspan='2'>Estado";
                    todo += "</th>";
                    todo += "</tr>";


                    $('#tableExport').append(todo);
                    todo = "";
                    description2 = "";
                    for (let x = 0; x < arreglo.listActiv.length; x++) {
                        id = arreglo.listActiv[x].id;
                        name = arreglo.listActiv[x].name;
                        description = arreglo.listActiv[x].description;
                        state = arreglo.listActiv[x].state;
                        father = arreglo.listActiv[x].father;
                        father_id = arreglo.listActiv[x].father_id;

                        if (state == 1) {
                            state = "OK";
                        } else {
                            state = "N/A";
                        }
                        if (father == 1) {
                            for (let x = 0; x < arreglo.listActiv.length; x++) {
                                father_id2 = arreglo.listActiv[x].father_id;
                                name2 = arreglo.listActiv[x].name;
                                if (id == father_id2) {
                                    description2 = description2 + " - " + name2;
                                }

                            }
                        }
                        if (father_id == null) {
                            todo = "<tr>";
                            todo += "<td>";
                            todo += "</td>";
                            todo += "<td colspan='2'>";
                            todo += name;
                            todo += "</td>";
                            todo += "<td colspan='3'>";
                            todo += father == 1 ? description2 : description;
                            todo += "</td>";
                            todo += "<td colspan='2'>";
                            todo += state;
                            todo += "</td>";
                            todo += "</tr>";
                            $('#tableExport').append(todo);
                        }
                    }

                    var tableID = 'tableExport'
                    var downloadLink;
                    var dataType = 'application/vnd.ms-excel';
                    var tableSelect = document.getElementById(tableID);
                    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

                    // Specify file name
                    filename = filename ? filename + '.xls' : 'Checklist.xls';

                    // Create download link element
                    downloadLink = document.createElement("a");

                    document.body.appendChild(downloadLink);

                    if (navigator.msSaveOrOpenBlob) {
                        var blob = new Blob(['ufeff', tableHTML], {
                            type: dataType
                        });
                        navigator.msSaveOrOpenBlob(blob, filename);
                    } else {
                        // Create a link to the file
                        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

                        // Setting the file name
                        downloadLink.download = filename;

                        //triggering the function
                        downloadLink.click();
                    }
                }
            });


        }
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
