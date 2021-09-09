@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <h4 class="alert-heading">OPS! <label class="text-lowercase">Parece que hubo error...</label> </h4>
    <hr>
    <ul class="list-unstyled">
        @php 
            $cont = 1
        @endphp
        @foreach ($errors->all() as $error)
            <li style="text-transform: none;">{{$cont++.'. R'}}ectifica tu correo y escoge una contraseña mayor a 8 carácteres</li>
        @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif