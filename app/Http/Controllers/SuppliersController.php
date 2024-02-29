<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('administrador.suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('administrador.suppliers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'companyName' => 'required|string|max:255',
            'contactName' => 'required|string|max:255',
            'contactTitle' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'postalCode' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'fax' => 'nullable|string|max:255',
            'homePage' => 'nullable|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la imagen
        ]);

        $proveedor = new Supplier($request->except('_token')); // Excluye _token aquí
        
        // Guardar la imagen si se proporciona
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $proveedor->image = $imageName;
        }

        $proveedor->save();

        return redirect()->route('suppliers.index')->with('success', 'Proveedor creado exitosamente');
    }

    public function show(Supplier $proveedor)
    {
        return view('suppliers.show', compact('proveedor'));
    }

    public function edit(Supplier $proveedor)
    {
        return view('administrador.suppliers.edit', compact('proveedor'));
    }

    public function update(Request $request, Supplier $proveedor)
    {
        $request->validate([
            'companyName' => 'required|string|max:255',
            'contactName' => 'required|string|max:255',
            'contactTitle' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'region' => 'required|string|max:255',
            'postalCode' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'fax' => 'nullable|string|max:255',
            'homePage' => 'nullable|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la imagen
        ]);

        $proveedor->update($request->except('_token'));

        // Actualizar la imagen si se proporciona
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            // Eliminar la imagen anterior si existe
            if ($proveedor->image) {
                unlink(public_path('images/' . $proveedor->image));
            }

            $proveedor->image = $imageName;
            $proveedor->save();
        }

        return redirect()->route('suppliers.index')->with('success', 'Proveedor actualizado exitosamente');
    }

    public function destroy(Supplier $proveedor)
    {
        // Eliminar la imagen asociada antes de eliminar el proveedor
        if ($proveedor->image) {
            unlink(public_path('images/' . $proveedor->image));
        }

        $proveedor->delete();

        return redirect()->route('suppliers.index')->with('success', 'Proveedor eliminado exitosamente');
    }
}
