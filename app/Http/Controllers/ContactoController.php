<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;
use App\Models\Empresa;

class ContactoController extends Controller
{
    // Mostrar todos los contactos
    public function index()
    {
        $contactos = Contacto::all();
        return view('contactos.index', compact('contactos'));
    }

    public function create($empresa_id)
    {        
        $empresa = Empresa::findOrFail($empresa_id);

        $empresa_id = $empresa->first()->id;

        return view('contactos.create', compact('empresa'));
    }
    

    // Guardar un nuevo contacto
    public function store(Request $request)
    {
        Contacto::create([
            'empresa_id' => $request->empresa_id,
            'nombre' => $request->nombre,
            'celular' => $request->celular,
            'email' => $request->email,
            'email_2' => $request->email_2,
            // Otros campos del contacto
        ]);
    
        return redirect()->route('empresas.show', ['id' => $request->empresa_id])
                         ->with('success', 'Contacto creado exitosamente.');
    }
    

    // Mostrar un contacto específico
    public function show(Contacto $contacto)
    {
        return view('contactos.show', compact('contacto'));
    }

    // Mostrar el formulario para editar un contacto
    public function edit($empresa_id, $id)
    {
        $empresa = Empresa::findOrFail($empresa_id);
        $contacto = Contacto::findOrFail($id);
    
        return view('contactos.edit', [
            'empresa' => $empresa,
            'contacto' => $contacto,
            'contacto_id' => $id,
        ]);
    }
    
    
    

    // Actualizar un contacto
    public function update(Request $request, Contacto $contacto)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            // Otros campos requeridos
        ]);

        $contacto->update($request->all());

        return redirect()->route('contactos.index')
                         ->with('success', 'Contacto actualizado exitosamente.');
    }

    // Eliminar un contacto
    public function destroy(Contacto $contacto)
    {
        $contacto->delete();

        return redirect()->route('contactos.index')
                         ->with('success', 'Contacto eliminado exitosamente.');
    }
}
