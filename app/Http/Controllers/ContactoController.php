<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    /**
     * Mostrar la lista de contactos.
     */
    public function index()
    {
        $contactos = Contacto::all(); // Obtiene todos los contactos
        return view('contactos.index', compact('contactos')); // Envía los contactos a la vista
    }

    /**
     * Mostrar el formulario de creación.
     */
    public function create()
    {
        return view('contactos.create'); // Devuelve la vista para crear un contacto
    }

    /**
     * Guardar un contacto en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'telefono' => 'nullable|string|max:15',
        ]);

        Contacto::create($request->all()); // Crea el contacto

        return redirect()->route('contactos.index')->with('success', 'Contacto creado exitosamente.');
    }

    /**
     * Mostrar la página de edición.
     */
    public function edit(Contacto $contacto)
    {
        return view('contactos.edit', compact('contacto')); // Devuelve la vista con el contacto
    }

    /**
     * Actualizar un contacto.
     */
    public function update(Request $request, Contacto $contacto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'telefono' => 'nullable|string|max:15',
        ]);

        $contacto->update($request->all()); // Actualiza los datos del contacto

        return redirect()->route('contactos.index')->with('success', 'Contacto actualizado exitosamente.');
    }

    /**
     * Eliminar un contacto.
     */
    public function destroy(Contacto $contacto)
    {
        $contacto->delete(); // Elimina el contacto

        return redirect()->route('contactos.index')->with('success', 'Contacto eliminado exitosamente.');
    }
}
