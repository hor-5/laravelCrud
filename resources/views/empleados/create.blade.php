@extends('layouts.app')

@section('content')
<div class="container">
      {{--  @if(count($errors)>0) 
        <div class="row">
                <div class="alert alert-danger" role="alert">
                        <ul>
                                @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                @endforeach
                        </ul>
                </div>
        </div>
        @endif --}}
        
        <div class="row">
                <div class="col-12">
                        <h3>Agregar empleado</h3>
                </div>
        </div>
        <div class="row">
                <div class="col-12">

                        <form action="{{url('/empleados')}}" method="post" enctype="multipart/form-data" >

                                @csrf
                                @include('empleados.form',['Modo'=>'crear'])
                        
                        </form>
                </div>
        </div>
</div>
@endsection 