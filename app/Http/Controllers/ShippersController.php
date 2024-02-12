<?php

namespace App\Http\Controllers;

use App\Models\Shippers; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShippersController extends Controller
{
    public function index()
    {
        $shippers = Shippers::all();
        return view('administrador.shippers.index', compact('shippers'));
    }

    public function create()
    {
        return view('administrador.shippers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'companyname' => 'required|string|max:255',
            'phone' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la imagen
        ]);

        $transportista = new Shippers([
            'companyname' => $request->input('companyname'),
            'phone' => $request->input('phone'),
        ]);

        // Procesamiento de la imagen
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $transportista->image = $imageName;
        }

        $transportista->save();

        return redirect()->route('shippers.index')->with('success', 'Transportista creado exitosamente');
    }

    public function show(Shippers $transportista)
    {
        return view('shippers.show', compact('transportista'));
    }

    public function edit(Shippers $transportista)
    {
        return view('administrador.shippers.edit', compact('transportista'));
    }

    public function update(Request $request, Shippers $transportista)
{
    $request->validate([
        'companyname' => 'required|string|max:255',
        'phone' => 'required|string',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Valida que sea una imagen y tenga un tamaño máximo de 2MB
    ]);

    // Actualiza los campos de nombre de la empresa y número de teléfono
    $transportista->companyname = $request->input('companyname');
    $transportista->phone = $request->input('phone');

    // Procesa la imagen si se proporciona un nuevo archivo de imagen
    if ($request->hasFile('image')) {
        // Elimina la imagen anterior si existe
        if ($transportista->image) {
            Storage::delete('images/' . $transportista->image);
        }

        // Almacena el nuevo archivo de imagen
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $transportista->image = $imageName;
        }

        // Actualiza el nombre de la imagen en la base de datos
        $transportista->image = $imageName;
    }

    // Guarda los cambios en la base de datos
    $transportista->save();

    return redirect()->route('shippers.index')->with('success', 'Transportista actualizado exitosamente');
}

    public function destroy(Shippers $transportista)
    {
        if ($transportista->image) {
            unlink(public_path('images/' . $transportista->image));
        }

        $transportista->delete();

        return redirect()->route('shippers.index')->with('success', 'Transportista eliminado exitosamente');
    }
}
