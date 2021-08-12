

<div class="row">    
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label" for="Nombre"> {{'Nombre'}} </label>
            <input class="form-control {{$errors->has('Nombre')? 'is-invalid':''}}" type="text" name="Nombre" id="Nombre" value="{{ isset($empleado->Nombre)? $empleado->Nombre:old('Nombre') }}">
            {!! $errors->first('Nombre', '<div class="invalid-feedback"> :message </div>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label" for="ApellidoPaterno"> {{'Apellido Paterno'}} </label>
            <input class="form-control {{$errors->has('ApellidoPaterno')? 'is-invalid':''}}" type="text" name="ApellidoPaterno" id="ApellidoPaterno" value="{{ isset($empleado->ApellidoPaterno)? $empleado->ApellidoPaterno:old('ApellidoPaterno') }}">
            {!! $errors->first('ApellidoPaterno', '<div class="invalid-feedback"> :message </div>') !!}
        </div>
    </div>      
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label" for="ApellidoMaterno">{{'Apellido Materno'}} </label>
            <input class="form-control {{$errors->has('ApellidoMaterno')? 'is-invalid':''}}" type="text" name="ApellidoMaterno" id="ApellidoMaterno" value="{{ isset($empleado->ApellidoMaterno)? $empleado->ApellidoMaterno:old('ApellidoMaterno') }}">
            {!! $errors->first('ApellidoMaterno', '<div class="invalid-feedback"> :message </div>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label" for="Correo"> {{'Correo'}} </label>
            <input class="form-control {{$errors->has('Correo')? 'is-invalid':''}}" type="email" name="Correo" id="Correo" value="{{ isset($empleado->Correo)? $empleado->Correo:old('Correo') }}">
            {!! $errors->first('Correo', '<div class="invalid-feedback"> :message </div>') !!}
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <label class="control-label ml-3" for="Foto"> {{'Foto'}} </label>
    </div>
    <div class="row">
        
        <div class="col-md-6 ">
            @if(isset($empleado->Foto))
    
            <img class="img-fluid border border-secondary rounded" src="{{asset('storage').'/'.$empleado->Foto}}" alt="" width="200px">
            @endif
        
            <input class="form-control {{$errors->has('Foto')? 'is-invalid':''}}" type="file" name="Foto" id="Foto" value="">
            {!! $errors->first('Foto', '<div class="invalid-feedback"> :message </div>') !!}
        </div>
    
    </div>
</div>


<div class="row">
    <input class="btn btn-primary rounded-lg mt-1 mr-2" type="submit" value="{{$Modo=='crear'? 'Agregar ':'Modificar'}}">
    <a class="btn btn-dark rounded-lg" href="{{ url('empleados') }}">Regresar</a>
</div>