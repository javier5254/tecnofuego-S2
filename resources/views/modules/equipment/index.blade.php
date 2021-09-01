@extends('layouts.admin.app')
@section('title', 'Equipos')
@section('breadcum', 'Equipos')
@section('volver', '')
@section('content')
    <div class="col-lg-10 offset-lg-1 col-md-12">
        <a class="btn btn-success text-white mt-1" href="{{ route('equipment.create') }}"><i class="fas fa-plus"></i>
            Agregar Equipo</a>
        <div class="card mt-4">

            <form action="" method="get" id="form_search">
                <div class="form-group input-group mb-0">
                    @csrf
                    <div class="form-group input-group mb-0">
                        <input id="SearchList" type="text" class="form-control mb-0" name="SearchList"
                            placeholder="Buscar..">
                        <span class="input-group-text"><a href=""><i class="fas fa-search"></i></span>
                    </div>
                </div>
            </form>

            <div class="row col-12 m-0 p-0" id="contenendor">
                @forelse($equips as $equip)
                    <div class="card-body border bottom col-12">
                        <div class="row">
                            <div class="col-sm-8 col-lg-10">
                                <a href="{{ route('equipment.edit', $equip->id) }}">
                                    <h3 class="m-0 p-0"><small>No Interno: {{ $equip->internalN }} </small></h3>
                                    <small class="text-gray">{{ $equip->flota }} |
                                        {{ $equip->marca }}/{{ $equip->modelo }}</small><br>
                                    <small class="text-gray">{{ $equip->cname }} | {{ $equip->pname }}</small>
                                </a>

                            </div>
                            <a href="#" class="col-sm-4 col-lg-2" data-toggle="modal"
                                data-target="#modal-md{{ $equip->id }}" id="{{ $equip->id }}">
                                <h5 class="text-center">
                                    <small>
                                        <small>
                                            {{ date('d/m/Y', strtotime($equip->created_at)) }}
                                        </small>
                                        <div class="mt-1">{!! QrCode::size(30)->generate(Request::url('equipment.edit', $equip->id)) !!}</div>
                                    </small>
                                </h5>
                            </a>
                            <div class="modal fade" id="modal-md{{ $equip->id }}">
                                <div class="modal-dialog modal-md" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="padding-5">
                                                <div class="row">
                                                    <div class="my-auto mx-auto px-4 py-2">

                                                        <div class="d-none row" id="toprint{{ $equip->id }}">
                                                            <div style="width: 5cm;height:2,5cm;">
                                                                {!! QrCode::size(80)->generate(route('equipment.edit', $equip->id)) !!}&nbsp;&nbsp;
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="83" height="83" viewBox="0 0 83 83">
                                                                    <defs>
                                                                      <clipPath id="clip-path">
                                                                        <rect id="Rectángulo_2" data-name="Rectángulo 2" width="83" height="83" transform="translate(455 146)" fill="none" stroke="#707070" stroke-width="1"/>
                                                                      </clipPath>
                                                                    </defs>
                                                                    <g id="Enmascarar_grupo_2" data-name="Enmascarar grupo 2" transform="translate(-455 -146)" clip-path="url(#clip-path)">
                                                                      <image id="TECNO_FUEGO" data-name="TECNO FUEGO" width="95.5" height="66.772" transform="translate(451.5 148)" xlink:href="data:image/jpeg;base64,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"/>
                                                                    </g>
                                                                  </svg>
                                                                <div style="transform: translateX(90px);">
                                                                    <strong style="position:absolute;top:-20px;font-family: Arial, Helvetica, sans-serif;">
                                                                        TECNOFUEGO
                                                                    </strong> 
                                                                </div> 
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  
                                                                <div style="width: 5cm;">
                                                                    <center>
                                                                        <strong class="m-0 p-0" style="transform: translateY(-20px);font-family: Arial, Helvetica, sans-serif;">
                                                                            {{ $equip->internalN }}
                                                                        </strong><br>
                                                                    </center>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {!! QrCode::size(140)->generate(route('equipment.edit', $equip->id)) !!}
                                                        <button class="btn btn-secondary text-white d-block center mt-4"
                                                            href="#" onclick="imprimir({{ $equip->id }})"><i
                                                                class="fas fa-print"></i> imprimir
                                                            QR </button>
                                                    </div>

                                                </div>
                                            </div>
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
                                                {!! QrCode::size(140)->generate(Request::url('equipment.edit', $equip->id)) !!}
                                                <button class="btn btn-secondary text-white d-block center mt-4" href="#"><i
                                                        class="fas fa-print"></i> imprimir QR </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <a href="#" class="card-body" style="border-bottom: 1px solid #ccc">
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <h5 class="text-center text-gray">No se encontrar贸n registros</h5>

                            </div>

                        </div>
                    </a>
                @endforelse
                <div class="card-body" style="overflow: scroll">
                    <div class="mx-auto col-md-10 col-lg-7">
                        {{ $equips->links() }}
                    </div>
                </div>
            </div>

        </div>



    @stop


    @section('script')

        <script>
            function imprimir(id) {
                var ficha = document.getElementById('toprint' + id);
                var ventimp = window.open(' ', 'popimpr');
                ventimp.document.write(ficha.innerHTML);
                ventimp.document.close();
                ventimp.print();
                ventimp.close();
            }
            $("#SearchList").keyup(function(e) {

                $.ajax({
                    url: 'equipment/search',
                    method: 'POST',
                    data: {
                        value: $('input[name="SearchList"]').val(),
                        _token: $('input[name="_token"]').val()
                    }
                }).done(function(res) {
                    var arreglo = JSON.parse(res);
                    $('#contenendor').html('');
                    for (let x = 0; x < arreglo.length; x++) {
                        id = arreglo[x].id;
                        internalN = arreglo[x].internalN;
                        state = arreglo[x].state;
                        flota = arreglo[x].flota;
                        marca = arreglo[x].marca;
                        modelo = arreglo[x].modelo;
                        cname = arreglo[x].cname;
                        pname = arreglo[x].pname;
                        state = arreglo[x].state;
                        created_at = arreglo[x].created_at;
                        state = state ? 'Activo' : 'Inactivo';
                        var todo = '<a href="equipment/' + id +
                            '/edit" class="card-body border bottom col-12 text-capitalize">';
                        todo += '<div class="row">';
                        todo += '<div class="col-10">';
                        todo += '<h5 style="mb-0">No Interno:<small>' + internalN + '</small></h5>';
                        todo += '<small class="mb-0 text-custom"> ' + flota + " | " + marca + " | " + modelo +
                            ' </small><br> ';
                        todo += '<small class="mb-0 text-custom"> ' + cname + " | " + pname + " | " + state +
                            ' </small><br> ';
                        todo += '</div>';
                        todo += '<div class="col-2">';
                        todo += '<p class="float-right">';
                        todo += created_at
                        todo += '</p>';
                        todo += '</div>';
                        todo += '</div>';
                        todo += '</a>';
                        $('#contenendor').append(todo);

                    }
                });
            })
        </script>

    @endsection
