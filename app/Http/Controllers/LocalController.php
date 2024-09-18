<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Local;

class LocalController extends Controller
{
    
    public function index()
    {
        $locales = Local::all();
        return view('locales.index', compact('locales'));
    }

    public function create()
    {
        return view('locales.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
        ]);

        Local::create($data);
        return redirect()->route('locales.index')->with('success', 'Local creado correctamente.');
    }

    public function edit($id)
    {
        $local = Local::findOrFail($id);
        return view('locales.edit', compact('local'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
        ]);

        $local = Local::findOrFail($id);
        $local->update($data);
        return redirect()->route('locales.index')->with('success', 'Local actualizado correctamente.');
    }

    public function destroy($id)
    {
        $local = Local::findOrFail($id);
        $local->delete();
        return redirect()->route('locales.index')->with('success', 'Local eliminado correctamente.');
    }
}

