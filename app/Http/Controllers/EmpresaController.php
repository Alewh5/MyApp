<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use Exception;

class EmpresaController extends Controller
{
    public function create()
    {
        return view('empresas.create');
    }

    public function index()
    {
        $empresas = Empresa::with('contactos')->get();
        return view('empresas.index', compact('empresas'));
    }

    public function show($id)
    {
        $empresa = Empresa::with('contactos')->findOrFail($id);
        $confirmingPostDelete = false;
        return view('empresas.show', compact('empresa', 'confirmingPostDelete'));
    }
    

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empresa = new Empresa();
    
        $empresa->nombre = $request->nombre;
        $empresa->direccion = $request->direccion;
        $empresa->telefono = $request->telefono;
        $empresa->sitio_web = $request->sitio_web;
    
        $empresa->save();
    
        return redirect('/')->with('success', 'Empresa guardada exitosamente.');

    }    

    public function edit($id)
    {
        $empresa = Empresa::findOrFail($id);
        return view('empresas.edit', compact('empresa'));
    }


    public function update(Request $request, $id)
{
    $empresa = Empresa::findOrFail($id);

    $empresa->nombre = $request->nombre;
    $empresa->direccion = $request->direccion;
    $empresa->telefono = $request->telefono;
    $empresa->sitio_web = $request->sitio_web;
    
    $empresa->save();
    
    return redirect('/')->with('success', 'Empresa actualizada exitosamente.');
}

    public function destroy($id)
    {
        try {
            $empresa = Empresa::findOrFail($id);
            $empresa->delete();

            return response()->json(['message' => 'Eliminación exitosa.'], 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al eliminar el elemento.', 'error' => $e->getMessage()], 500);
        }
    }
    

}
