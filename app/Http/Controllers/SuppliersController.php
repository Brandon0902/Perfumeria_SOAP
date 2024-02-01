<?php

namespace App\Http\Controllers;

use App\Models\Suppliers; 
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    public function index()
    {
        $suppliers = Suppliers::all();
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers.create');
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
        ]);

        $proveedor = new Suppliers($request->all());
        $proveedor->save();

        return redirect()->route('suppliers.index')->with('success', 'Proveedor creado exitosamente');
    }

    public function show(Suppliers $proveedor)
    {
        return view('suppliers.show', compact('proveedor'));
    }

    public function edit(Suppliers $proveedor)
    {
        return view('suppliers.edit', compact('proveedor'));
    }

    public function update(Request $request, Suppliers $proveedor)
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
        ]);

        $proveedor->update($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Proveedor actualizado exitosamente');
    }

    public function destroy(Suppliers $proveedor)
    {
        $proveedor->delete();

        return redirect()->route('suppliers.index')->with('success', 'Proveedor eliminado exitosamente');
    }
}
