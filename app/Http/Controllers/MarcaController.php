<?php

namespace App\Http\Controllers;
use App\Models\Marcas;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index()
    {
        return view('add-user');
    }
    public function list(Request $request)
    {
        $marcas = new Marcas();
        $marcas->nombre = $request->nombre;

        return redirect('add-user')->with('status','Se mandao correctamente');
    }
}
