<?php

namespace App\Http\Controllers;

use App\Models\Shippers; 
use Illuminate\Http\Request;

class ShippersController extends Controller
{
    public function index()
    {
        $shippers = Shippers::all();
        return view('shippers.index', compact('shippers'));
    }

    public function create()
    {
        return view('shippers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'companyname' => 'required|string|max:255',
            'phone' => 'required|string',
        ]);

        $transportista = new Shippers([
            'id' => $request->input('id'),
            'companyname' => $request->input('companyname'),
            'phone' => $request->input('phone'),
        ]);

        $transportista->save();

        return redirect()->route('shippers.index')->with('success', 'Transportista creado exitosamente');
    }

    public function show(Shippers $transportista)
    {
        return view('shippers.show', compact('transportista'));
    }

    public function edit(Shippers $transportista)
    {
        return view('shippers.edit', compact('transportista'));
    }

    public function update(Request $request, Shippers $transportista)
    {
        $request->validate([
            'id' => 'required|integer',
            'companyname' => 'required|string|max:255',
            'phone' => 'required|string',
        ]);

        $transportista->update([
            'id' => $request->input('id'),
            'companyname' => $request->input('companyname'),
            'phone' => $request->input('phone'),
        ]);

        return redirect()->route('shippers.index')->with('success', 'Transportista actualizado exitosamente');
    }

    public function destroy(Shippers $transportista)
    {
        $transportista->delete();

        return redirect()->route('shippers.index')->with('success', 'Transportista eliminado exitosamente');
    }
}
