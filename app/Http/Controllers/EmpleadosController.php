<?php

namespace App\Http\Controllers;

use App\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //se crea el array con los empleados y se pagina
        $datos['empleados']=Empleados::paginate(5);//se pagina de 5 registros

        return view('empleados.index',$datos);//enviamos la variable datos a la vista
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //validacion de datos
        $campos=[
            'Nombre' =>'required|string|max:100',
            'ApellidoPaterno' =>'required|string|max:100',
            'ApellidoMaterno' =>'required|string|max:100',
            'Correo' =>'required|email',
            'Foto' =>'required|max:100000|mimes:jpeg,png,jpg'
            
        ];
        $Mensaje=["required"=>':attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);
        //fin validacion

        //$datosEmpleado=request()->all();

        $datosEmpleado=request()->except('_token');
        
        if($request->hasFile('Foto')){

            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Empleados::insert($datosEmpleado);

        return redirect('empleados')->with('Mensaje','Empleado agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado= Empleados::findOrFail($id);
        return view('empleados.edit',compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //validaciones
        $campos=[
            'Nombre' =>'required|string|max:100',
            'ApellidoPaterno' =>'required|string|max:100',
            'ApellidoMaterno' =>'required|string|max:100',
            'Correo' =>'required|email',
            
            
        ];

        if($request->hasFile('Foto')){

            $campos+=['Foto' =>'required|max:100000|mimes:jpeg,png,jpg'];
        }
        
        $Mensaje=["required"=>':attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);
        //fin validaciones
        $datosEmpleado=request()->except(['_token','_method']);

        if($request->hasFile('Foto')){

            $empleado= Empleados::findOrFail($id);//para obtener la info antigua sin editar

            Storage::delete('public/'.$empleado->Foto);//borra la foto anterior

            $datosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');//pone la foto nueva
        }

        Empleados::where('id', '=',$id)->update($datosEmpleado);

        //$empleado= Empleados::findOrFail($id);//para obtener la info actualizada ya editada
         // return view('empleados.edit',compact('empleado'));
         return redirect('empleados')->with('Mensaje','Empleado modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
        $empleado= Empleados::findOrFail($id);//para obtener la info antigua sin editar

        if(Storage::delete('public/'.$empleado->Foto))//borra la foto anterior
        {

            Empleados::destroy($id);//si el borrado de la foto se llevó a cabo, eliminar de la bbdd
        }
  
        return redirect('empleados')->with('Mensaje','Registro Eliminado');
    }
}
