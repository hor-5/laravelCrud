
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                    <h3>Editar empleado</h3>
            </div>
    </div>

        
<div class="row">
    <div class="col-12">
        
        <form action="{{url('/empleados/'.$empleado->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
            
            @csrf
            @method('PATCH')
    
            @include('empleados.form',['Modo'=>'editar'])
    
        </form>
    </div>
</div>
        
    </div>
@endsection
