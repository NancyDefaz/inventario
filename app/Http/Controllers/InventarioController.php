<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Prenda;
use App\Models\Local;

class InventarioController extends Controller

{
    public function dashboard()
    {
        // Obtener todos los locales desde la base de datos
        $locales = Local::all();
    
        // Pasar los locales a la vista
        return view('dashboard', compact('locales'));
    }
    
      
    public function index($localId)
    {
        $local = Local::findOrFail($localId);
        $prendas = $local->prendas;  // Obtener las prendas asociadas a ese local
        return view('inventario.index', compact('prendas', 'local'));
    }
    
    public function create($localId)
    {
        
        $local = Local::findOrFail($localId);
        // Puedes cargar la vista para crear una nueva prenda
        return view('inventario.create', compact('local'));
    }
    

    public function store(Request $request, $localId)
    {
        $local = Local::findOrFail($localId);
    
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'talla' => 'required|string|max:5',
            'cantidad_inicial' => 'required|integer|min:0',
        ]);
    
        $local->prendas()->create([
            'nombre' => $data['nombre'],
            'talla' => $data['talla'],
            'cantidad_inicial' => $data['cantidad_inicial'],
            'cantidad_actual' => $data['cantidad_inicial'],
            'ventas_del_dia' => 0,
            'sobrante_del_dia_anterior' => $data['cantidad_inicial'],
        ]);
    
        return redirect()->route('inventario.index', ['localId' => $localId])->with('success', 'Prenda añadida correctamente.');
    }
    
    public function mostrarLocales()
{
    $locales = Local::all();
    return view('inventario.locales', compact('locales'));
}

public function verInventario($localId)
{
    $local = Local::findOrFail($localId);
    $prendas = Prenda::where('local_id', $localId)->get();
    return view('inventario.index', compact('prendas', 'local'));
}

   public function actualizarInventario(Request $request, $localId, $prendaId)
{
    $prenda = Prenda::where('id', $prendaId)->where('local_id', $localId)->firstOrFail();

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
