<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Directorio;
use App\Models\Contacto;

class ContactoController extends Controller
{

    public function nuevo($codigoEntrada) {
        return view('agregarcontacto', compact('codigoEntrada'));
    }
    
    public function guardar(Request $req) {
        $contacto = new Contacto;

        $contacto->codigoEntrada = $req->input('codigoEntrada');
        $contacto->nombre = $req->input('nombre');
        $contacto->apellido = $req->input('apellido');
        $contacto->telefono = $req->input('telefono');

        $contacto->save();
        return redirect()->route('directorio.index');
    }

    public function eliminar($id) {
        $contacto = Contacto::where('id',$id);
      
        $contacto->delete();

        return redirect()->route('directorio.index');
    }
}
