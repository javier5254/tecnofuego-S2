@extends('layouts.admin.app')
@section('title','Editar proyecto')
@section('breadcum','Editar proyecto')
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
                <form action="{{ route('project.update',$project->id) }}" method="post" id="formeditproyect">
                    @csrf
                    @method('PUT')
                    @csrf
                    <input type="hidden" id="project_id" name="id" value="{{$project->id}}">
                    <div class="form-group mt-4"> 
                        <div class="row">
                            <div class="col-md-2 offset-md-9">
                                <label for="state" class="float-right">Activo</label>
                            </div>
                            <div class="col-md-1">
                                <div class="toggle-checkbox toggle-success checkbox-inline toggle-sm float-right">
                                    <input type="checkbox" name="state" id="state" {{ $project->state ? 'checked value=1': ''}}>
                                    <label for="state"></label>
                                </div>    
                            </div>    
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Nombre del proyecto</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $project->name }}">
                    </div>

                    
                    <div class="form-group">
                        <label for="phone_person">Cliente</label>
                        <select class="form-control" name="client_id">
                            <option disabled selected >Elije un cliente cara de qk.</option>
                            @forelse ($clients as $client)
                                <option value="{{ $client->id }}" {{ $client->id == $project->client_id ? 'selected' : '' }}>{{ $client->name }}</option>
                            @empty
                                <option disabled>No hay informacion.</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="location_id">Locaciones</label>
                        <div id="contenedor">
                            @foreach ($locacion as $l)
                                <a onclick="remove(this.id)" id="{{ $l->id }}"
                                    class="btn btn-default btn-inverse btn-rounded tags">{{ $l->name }}
                                    &nbsp;&nbsp; <i class="fa fa-close"></i></a>
                                <input type="hidden" class="data" name="data[{{ $l->name }}]" id="data{{ $l->id }}" name="data"
                                    value="{{$l->name}}">
                            @endforeach
                        </div>
                        <input type="text" id="panel" rows="3" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="description">Descripción del proyecto</label>
                        <textarea name="description" id="description" rows="3" class="form-control">{{ $project->description }}</textarea>
                    </div>
                
            </div>
        </div>
        <div class="pull-right">
            <button class="btn btn-success" id="btnsave" type="button">Guardar</button>
            <a class="btn btn-link" href="{{ route('project.index') }}">Cancelar</a>
            
        </div>
    </form>
</div>
@stop

@section('script')
    <script>
        
        $("#btnsave").click(function(){
            $("#formeditproyect").submit();
        });
        $("#panel").keypress(function(e) {
        if (e.which == 13) {
            $("#contenedor").append(
                '<a onclick="removeNew(this.id)" class="btn btn-default btn-inverse btn-rounded tags" id="' +
                $("#panel").val() + '" value="' + $("#panel").val() + '">' + $("#panel").val() +
                '&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-close"></i> </a>');
            $("#contenedor").append('<input type="hidden" class="data" name="data[' +  $("#panel").val()  + ']" id="data' + $("#panel").val() + '" value="' + $("#panel").val() + '">');
            $("#panel").val("");
            return false;
        }
    });
        function removeNew(id) {
            $("#" + id).remove();
            $("#data" + id).remove();
        }
        function remove(id) {
        var data = {
            "id" : id,
            "project_id" : $("#project_id").val()
        }
        // alert(data);
        $.ajax({
            url: "{{ route('project.deletelocations') }}",
            type: 'POST',
            data: {
                "data": data,
                "_token": "{{ csrf_token() }}",
            },
            success: function(res) {
                $("#" + id).remove();
                $("#data" + id).remove();
            }
        });




    }
    
    </script>
@endsection