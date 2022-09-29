<?php

namespace App\Http\Controllers;

use App\Models\Marcas;
use App\Models\Modelos;
use App\Models\Usuario;
use Illuminate\Http\Request;
use DB;

class FormController extends Controller
{
    public function index()
    {
        $modelos = Modelos::all();
        $marcas = Marcas::all();
        $usuario = new Usuario;
        return view('add-user', compact('usuario','marcas', 'modelos'));
    }
    public function information(Request $request)
    {
        $usuario = new Usuario();

        $usuario->nombre = $request->nombre;
        $usuario->edad = $request->edad;
        $usuario->telefono = $request->telefono;
        $usuario->correo = $request->correo;
        $usuario->modelo = $request->modelo;

        if(!Usuario::find($request->id)){
            $usuario->save();
            return redirect('add-user')->with('status','Se mando correctamente');
        }else{
            DB::table('usuarios')
                ->where('id', $request->id)
                ->update([
                    'nombre' => $request->nombre,
                    'edad' => $request->edad,
                    'telefono' => $request->telefono,
                    'correo' => $request->correo,
                    'modelo' => $request->modelo,
                    ]);
            return redirect('list-users')->with('status','Se mando correctamente');
        }

    }

    public function update($id)
    {
        $usuario = Usuario::find($id);
        $auto = ModeloController::auto($usuario->modelo);
        $modelos = Modelos::all();
        $marcas = Marcas::all();

        return view('add-user', compact( 'marcas', 'modelos'))-> with('usuario', $usuario)->with('auto', $auto);
    }

    public function delete($id)
    {
        Usuario::find($id)->delete();

        return redirect()->back()->with('status','Usuario eliminado Correctament');
    }
}
