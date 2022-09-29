<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TableController extends Controller
{
    public function index()
    {
        $usuarios = DB::table('usuarios')
            ->select('usuarios.*', 'marcas.nombre as marca', 'modelos.nombre as modelo')
            ->join('modelos', 'usuarios.modelo', '=', 'modelos.id')
            ->join('marcas', 'modelos.idMarca', '=', 'marcas.id')
            ->get();

        return view('list-users', $usuarios)->with('usuarios', $usuarios);
    }
}
