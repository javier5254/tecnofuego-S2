@extends('layouts.admin.app')
@section('title', 'Equipos')
@section('breadcum', 'Equipos')
@section('volver', '')
@section('content')
    <div class="col-lg-10 offset-lg-1 col-md-12">

        
        <div class="card mt-4">


            <form action="{{ route('activity.search') }}" method="get" id="form_search">
                <div class="form-group input-group mb-0">
                    @csrf
                    <div class="form-group input-group mb-0">
                        <input id="SearchList" type="text" class="form-control mb-0 d-block col-12" name="SearchList" placeholder="Buscar..">
                        <span class="input-group-text"><a href=""><i class="fas fa-search"></i></span>
                    </div>
                </div>
                <input type="hidden" id="moduleid" value="{{$module}}">
            </form>
            <div class="row m-0 p-0" id="contenendor">
                @forelse($equips as $equip)
                    <div class="card-body border bottom col-12" >
                        <div class="row">
                            <div class="col-10">
                                @php
                                    if ($equip->extinction == 'S') {
                                        $modulecf = $module + 5;
                                    }
                                    @endphp
                                    
                                    <a data-toggle="modal" data-target="#exampleModal" id="{{$equip->id}}" onclick="initializator(this.id)">
                                        <input type="hidden" value="{{$modulecf ? $modulecf : $module}}" id="module{{$equip->id}}">
                                    <h3 class="m-0 p-0"><small>No Interno: {{ $equip->internalN }} </small></h3>
                                    <small class="text-gray">{{ $equip->flota }} |
                                        {{ $equip->marca }}/{{ $equip->modelo }}</small><br>
                                    <small class="text-gray">{{ $equip->cname }} | {{ $equip->pname }}</small>
                                </a>

                            </div>
                            <div class="col-2">
                                <small class="pull-right">
                                    {{ date('d/m/Y', strtotime($equip->created_at)) }}
                                </small><br>
                                <a href="#" data-toggle="modal" data-target="#modal-md"
                                    class="text-success d-block pull-right mr-2">
                                    {{-- {!! QrCode::size(40)->generate(Request::url('equipment.edit', $equip->id)) !!} --}}
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <a href="#" class="card-body" style="border-bottom: 1px solid #ccc">
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <h5 class="text-center text-gray">No se encontrar&oacute;n registros</h5>

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
        <div class="modal py-4 col-8 mx-auto" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <h5 class="text-center" id="exampleModalLabel">Atenci&oacute;n</h5>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="63" height="62" viewBox="0 0 63 62">
                            <defs>
                              <filter id="Polígono_18" x="0" y="0" width="63" height="62" filterUnits="userSpaceOnUse">
                                <feOffset dy="3" input="SourceAlpha"/>
                                <feGaussianBlur stdDeviation="3" result="blur"/>
                                <feFlood flood-opacity="0.161"/>
                                <feComposite operator="in" in2="blur"/>
                                <feComposite in="SourceGraphic"/>
                              </filter>
                            </defs>
                            <g id="Grupo_142" data-name="Grupo 142" transform="translate(-258 -173)">
                              <g transform="matrix(1, 0, 0, 1, 258, 173)" filter="url(#Polígono_18)">
                                <g id="Polígono_18-2" data-name="Polígono 18" transform="translate(9 6)" fill="#f6f61a" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M 41.73094940185547 43.00000381469727 L 3.269049882888794 43.00000381469727 C 2.763159990310669 43.00000381469727 2.503979921340942 42.66563415527344 2.416029930114746 42.52188491821289 C 2.32807993888855 42.37812423706055 2.148380041122437 41.99512481689453 2.378700017929077 41.54471588134766 L 21.60964965820312 3.937525272369385 C 21.7840690612793 3.596445322036743 22.11691093444824 3.392815351486206 22.5 3.392815351486206 C 22.88308906555176 3.392815351486206 23.2159309387207 3.596445322036743 23.39035034179688 3.937525272369385 L 42.62129974365234 41.54471588134766 C 42.85161972045898 41.99512481689453 42.67192077636719 42.37812423706055 42.58396911621094 42.52188491821289 C 42.49602127075195 42.66563415527344 42.23683929443359 43.00000381469727 41.73094940185547 43.00000381469727 Z" stroke="none"/>
                                  <path d="M 22.5 4.392814636230469 L 3.269050598144531 41.99998474121094 C 3.269046783447266 41.9999885559082 3.269046783447266 41.99999237060547 3.269046783447266 41.99999618530273 C 3.269046783447266 41.99999618530273 3.269046783447266 41.99999618530273 3.269050598144531 41.99999618530273 L 41.73094177246094 41.99999618530273 L 22.5 4.392814636230469 M 22.5 2.392807006835938 C 23.20464706420898 2.392807006835938 23.90929412841797 2.755950927734375 24.28068923950195 3.482234954833984 L 43.51163101196289 41.08941650390625 C 44.1921501159668 42.42020416259766 43.22563171386719 43.99999618530273 41.73094940185547 43.99999618530273 L 3.269050598144531 43.99999618530273 C 1.774368286132812 43.99999618530273 0.8078498840332031 42.42020416259766 1.488361358642578 41.08941650390625 L 20.71931076049805 3.482234954833984 C 21.09070587158203 2.755950927734375 21.79535293579102 2.392807006835938 22.5 2.392807006835938 Z" stroke="none" fill="#000"/>
                                </g>
                              </g>
                              <text id="_" data-name="!" transform="translate(284 216)" font-size="30" font-family="Helvetica"><tspan x="0" y="0">!</tspan></text>
                            </g>
                          </svg>
                          
                        <input type="hidden" id="equip_id">
                        <input type="hidden" id="model_id">
                        <div class="container">
                            <div class="" id="contain1">
                                <p class="w-50 mx-auto my-2" style="text-transform:none;">Aseg&uacute;rese de contar con los
                                    EPP adecuados y en buen estado para la ejecuci&oacute;n de cada tarea.</p>
                                <a class="btn btn-success my-2 text-white" id="btn1" onclick="dinamicpopup(this.id)">
                                    <small class="mx-2">
                                        Entendido
                                    </small>
                                </a>
                            </div>
                            <div class="d-none" id="contain2">
                                <p class="w-50 mx-auto my-2" style="text-transform:none;">Aseg&uacute;rese de diligenciar
                                    todos los permisos de trabajo requeridos para la ejecuci&oacute;n de cada tarea.</p>
                                <a class="btn btn-success my-2 text-white" id="btn2" onclick="dinamicpopup(this.id)">
                                    <small class="mx-2">
                                        Entendido
                                    </small>
                                </a>
                            </div>
                            <div class="d-none" id="contain3">
                                <p class="w-50 mx-auto my-2" style="text-transform:none;">Verifique que las &aacute;reas de
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

        <div class="modal fade" id="modal-md">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="padding-5">
                            <div class="row">
                                <div class="my-auto mx-auto px-4 py-2">
                                    {{-- {!! QrCode::size(140)->generate('hola'); !!} --}}
                                    <button class="btn btn-secondary text-white d-block center mt-4" href="#"><i
                                            class="fas fa-print"></i> imprimir QR </button>
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
        function initializator(id){
            var model = $("#moduleid").val();
            document.getElementById("equip_id").value = id;
            document.getElementById("model_id").value = model;

        }
        function dinamicpopup(id){
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
                        var model = $("#model_id").val();
                        window.location = ("/activity/"+equip+"-"+model+"/create";
                        
                    break;
                default:
                    break;
            }
        
        }
        $("#activeResults").click(function() {
            $("#contenendor").removeClass("d-none");
        });
        $("#SearchList").keyup(function(e) {
            var modu = document.getElementById('moduleid').value;
            console.log(modu);
            $.ajax({
                url: '{{route("activity.search")}}',
                method: 'POST',
                data: {
                    value: $('input[name="SearchList"]').val(),
                    _token: "{{ csrf_token() }}",
                }
            }).done(function(res) {
                var arreglo = JSON.parse(res);
                console.log(arreglo);
                $('#contenendor').html('');
                for (let x = 0; x < arreglo.length; x++) {
                    id = arreglo[x].id;
                    internalN = arreglo[x].internalN;
                    flota = arreglo[x].flota;
                    marca = arreglo[x].marca;
                    modelo = arreglo[x].modelo;
                    cname = arreglo[x].cname;
                    pname = arreglo[x].pname;
                    state = arreglo[x].state;
                    state = state ? 'Activo' : 'Inactivo';
                    var todo = '<div class="card-body border bottom col-12" >';
                    todo += '<div class="row">';
                    todo += '<div class="col-12">';
                    todo += '<a data-toggle="modal" data-target="#exampleModal" id="'+id+'" onclick="initializator(this.id)">';
                    todo += '<div class="row">';
                    todo += '<div class="col-10">';
                    todo += '<h3 style="mb-0"><small>No interno: ' + internalN + '</small></h4>';
                    todo += '<small class="text-gray">';
                    todo += flota + " | "+marca+" / "+modelo;
                    todo += '</small><br>';
                    todo += '<small class="text-gray">';
                    todo += cname+' | '+pname;
                    todo += '</small>';
                    todo += '</div>';
                    todo += '<div class="col-2">';
                    todo += '<p class="text-right">';
                    todo += state
                    todo += '</p>';
                    todo += '</div>';
                    todo += '</div>';
                    todo += '</a>';
                    todo += '</div>';
                    todo += '</div>';
                    todo += '</div>';
                    $('#contenendor').append(todo);
        
                }
            });
        })
    </script>

@endsection
