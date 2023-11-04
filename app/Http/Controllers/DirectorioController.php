<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Directorio;
use App\Models\Contacto;

class DirectorioController extends Controller
{
    public function index() {
        $directorios = Directorio::all();

        return view('directorio',compact('directorios'));
    }

    public function nuevo() {
        return view('crearEntrada');
    }

    public function guardar(Request $req) {
        $directorio = new Directorio;

        $directorio->codigoEntrada = $req->input('codigoEntrada');
        $directorio->nombre = $req->input('nombre');
        $directorio->apellido = $req->input('apellido');
        $directorio->correo = $req->input('correo');
        $directorio->telefono = $req->input('telefono');

        $directorio->save();
        return redirect()->route('directorio.index');
    }

    public function buscarVista(){
        return view('buscar');

    }

    public function buscar(Request $req) {
        $correo = $req->input('correo');

        return redirect()->route('directorio.ver', ['correo' => $correo]);
        
    }

    public function ver($correo) {
        $directorio = Directorio::where('correo',$correo)->first();
        
        $contactos = Contacto::where('codigoEntrada', $directorio->codigoEntrada)->get();

        return view('vercontactos', compact('directorio', 'contactos'));
    }

    public function eliminar($codigoEntrada) {
        $directorio = Directorio::where('codigoEntrada',$codigoEntrada);
        $contactos = Contacto::where('codigoEntrada', $codigoEntrada)->get();
        
        if($contactos != null){
            foreach ($contactos as $contacto) {
                $contacto->delete();
            }
        }
        $directorio->delete();

        return redirect()->route('directorio.index');
    }
}
