<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Prenda;

class InventarioController extends Controller

{
      
    public function index()
    {
        $prendas = Prenda::all();
        return view('inventario.index', compact('prendas'));
    }
    public function create()
    {
        return view('inventario.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'talla' => 'required|string|max:5',
            'cantidad_inicial' => 'required|integer|min:0',
        ]);

        Prenda::create([
            'nombre' => $data['nombre'],
            'talla' => $data['talla'],
            'cantidad_inicial' => $data['cantidad_inicial'],
            'cantidad_actual' => $data['cantidad_inicial'],
            'ventas_del_dia' => 0,
            'sobrante_del_dia_anterior' => $data['cantidad_inicial'],
        ]);

        return redirect()->route('inventario.index')->with('success', 'Prenda añadida correctamente.');
    }

    public function actualizarInventario(Request $request, $id)
    {
        $prenda = Prenda::findOrFail($id);

        // Validar los datos
        $data = $request->validate([
            'cantidad_a_añadir' => 'nullable|integer|min:0',
      //      'cantidad_a_disminuir' => 'nullable|integer|min:0',
            'ventas_del_dia' => 'required|integer|min:0',
        ]);

        // Actualizar la cantidad inicial según el sobrante del día anterior
        $cantidadInicial = $prenda->sobrante_del_dia_anterior;

        // Restar las ventas diarias
        $prenda->ventas_del_dia = $data['ventas_del_dia'];
        $cantidadActual = $cantidadInicial - $data['ventas_del_dia'];

        // Añadir stock si es necesario
        if ($data['cantidad_a_añadir']) {
            $cantidadActual += $data['cantidad_a_añadir'];
        }

        // Disminuir stock si es necesario
      //  if ($data['cantidad_a_disminuir']) {
      //      $cantidadActual -= $data['cantidad_a_disminuir'];
     //   }

        // Actualizar el modelo
        $prenda->cantidad_inicial = $cantidadInicial;
        $prenda->cantidad_actual = $cantidadActual;
        $prenda->sobrante_del_dia_anterior = $cantidadActual; // Para el día siguiente
        $prenda->save();

        return redirect()->back()->with('success', 'Inventario actualizado correctamente');
    }
    public function eliminarPrenda($id)
{
    $prenda = Prenda::findOrFail($id);
    $prenda->delete();

    return redirect()->back()->with('success', 'Prenda eliminada correctamente');
}

}

