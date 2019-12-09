<?php

namespace App\Http\Controllers;

use App\User;
use App\Direccion;
use Illuminate\Http\Request;
use App;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = App\User::paginate(4);    //se crea una nueva variable llamada usuario, despues se ingresa a la carpeta app y modelo user
        //intancia de direcciones
        $direcciones = App\Direccion::paginate(4);
        return view('inicio', compact('usuarios','direcciones')); //la función compact es para que muestre todos los registros
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuarioAgregar = new User;
        $direccionAgregar = new Direccion;
        
        //instancia del modelo usuario
        $usuarioAgregar->nombre = $request-> nombre;
        $usuarioAgregar->ape_paterno = $request-> ape_paterno;
        $usuarioAgregar->ape_materno = $request-> ape_materno;
        $usuarioAgregar->edad = $request-> edad;
        $usuarioAgregar->save();
        /**Datos de dirección */
        $direccionAgregar->calle = $request-> calle;
        $direccionAgregar->colonia = $request-> colonia;
        $direccionAgregar->delegacion = $request-> delegacion;
        $direccionAgregar->numero = $request-> numero;
        $direccionAgregar->usuario_id = $usuarioAgregar -> id;
        $direccionAgregar->save();
        return back()->with('agregar', 'Los datos se guardaron correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarioActualizar = App\User::findOrFail($id);
        return view('editar', compact('usuarioActualizar'));
        /////////////nuevas agregadas
        $direccionActualizar = App\Direccion::findOrFail($usuario_id);
        return view('editar', compact('direccionActualizar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuarioUpdate=App\User::findOrFail($id);
        $usuarioUpdate->nombre=$request->nombre;
        $usuarioUpdate->ape_paterno=$request->ape_paterno;
        $usuarioUpdate->ape_materno=$request->ape_materno;
        $usuarioUpdate->edad=$request->edad;
        $usuarioUpdate->save();
        //cambio de las variables
        $direccionUpdate=App\Direccion::findOrFail($id);
        $direccionUpdate->calle=$request->calle;
        $direccionUpdate->colonia=$request->colonia;
        $direccionUpdate->delegacion=$request->delegacion;
        $direccionUpdate->numero=$request->numero;
        $direccionUpdate->save();
        return back()->with('update','Los cambios fueron guardados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //tabla padre
        $usuarioEliminar = App\User::findOrFail($id);
        //borrar el hijo
        $direccionEliminar = App\Direccion::findOrFail($id);
        $direccionEliminar->delete();        
        //borrar el padre
        $usuarioEliminar->delete();
        return back()->with('eliminar','El usuario ha sido eliminado');
    }
}
