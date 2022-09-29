<?php

namespace App\Http\Controllers;

use DB;

class ModeloController extends Controller
{
    public function index($id)
    {
        $modelos = DB::table('modelos')
            ->select('nombre', 'id')
            ->where('idMarca', $id)
            ->get();

        return $modelos;
    }

    public static function auto($id)
    {
        $auto = DB::table('modelos')
            ->select('modelos.id as idMo', 'modelos.nombre as nombreMo', 'marcas.id as idMa', 'marcas.nombre as nombreMa')
            ->join('marcas', 'idMarca', '=', 'marcas.id')
            ->where('modelos.id', $id)
            ->get();

        return $auto;
    }
}
