<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Models\Nota;

class PagesController extends Controller
{
    public function inicio(){
    	$notas = Nota::paginate(5);
        return view('welcome', compact('notas'));
    }

    public function fotos(){
    	return view('fotos');
    }

    public function nosotros($nombre = null){
    	$equipo = ['yelsin','daniela','erick'];
		//return view('nosotros',['equipo'=> $equipo]);
		return view('nosotros',compact('equipo','nombre'));
    }

    public function noticias(){
    	return view('blog');
    }

    public function detalle($id){
        //Aqui valida si existe sino redirije al 404
        $nota = Nota::findOrFail($id);
        return view('notas.detalle', compact('nota'));
    }

    public function insertar(Request $request){
        //return $request->all(); //retorna todo del formulario
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        $notaNueva = new Nota;
        $notaNueva->nombre= $request->nombre;
        $notaNueva->descripcion= $request->descripcion;
        $notaNueva->save();
        return back()->with('mensaje','Nota agregada'); //with para enviar mensaje
    }

    public function editar($id){
        //Aqui valida si existe sino redirije al 404
        $nota = Nota::findOrFail($id);
        return view('notas.editar', compact('nota'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);
        
        $notaUpdate = Nota::findOrFail($id);
        $notaUpdate->nombre = $request->nombre;
        $notaUpdate->descripcion = $request->descripcion;
        $notaUpdate->save();
        return back()->with('mensaje','Nota Modificada'); //with para enviar mensaje

    }

    public function eliminar($id){
        $notaEliminar = Nota::findOrFail($id);
        $notaEliminar->delete();
        return back()->with('mensaje','Se elimino con exito');
    }
}
