@extends('layouts.app')

@section('content')


<div class="container">
        @if(Session::has('Mensaje'))
            <div class="row">
                <div class="alert alert-success" role="alert">
                    {{ Session::get('Mensaje') }}
                </div>
            </div>
        @endif
    <a href="{{ url('empleados/create') }}" class="btn btn-success rounded-lg ">Agregar empleado</a>
    <table class="table table-light table-hover mt-3">
        <thead class="thead-light">
            <tr>
                <th></th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($empleados as $empleado)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                    <img src="{{asset('storage').'/'.$empleado->Foto}}" class="img-thumbnail img-fluid rounded-circle" alt="" width="100px">
                </td>
                <td>{{$empleado->Nombre}} {{$empleado->ApellidoPaterno}} {{$empleado->ApellidoMaterno}}</td>
                <td>{{$empleado->Correo}}</td>
                <td>
                    <div class="d-flex d-inline">
                        <a href="{{url('/empleados/'.$empleado->id.'/edit')}}"class="btn btn-sm btn-warning rounded-lg mr-1">Editar</a>
                     
                        <form action="{{url('/empleados/'.$empleado->id)}}" method="post" >
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" onclick="return confirm('¿Desea eliminar el registro?')"class="btn btn-sm btn-danger rounded-lg">Borrar</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $empleados->links() }}
</div>

@endsection