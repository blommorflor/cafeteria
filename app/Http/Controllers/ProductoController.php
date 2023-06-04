<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductoController extends Controller
{
    
    public function index()
    {
        $productos = Producto::orderByDesc('created_at')->paginate(10);
        $categorias = Categoria::all();

        return view('componentes.productos', compact('categorias', 'productos'));
    }


    public function store(Request $request)
    {

        $productoExist = $this->verificarExistencia($request->input('referencia'));

        if ($productoExist) {
            return redirect('productos')->with('error', 'Ya hay un producto con esa referencia!');
        }

        Producto::create([
            'nombre' => $request->input('nombre'),
            'referencia' => $request->input('referencia'),
            'categoria_id' => $request->input('categoria_id'),
            'precio' => $request->input('precio'),
            'peso' => $request->input('peso'),
            'stock' => $request->input('stock'),
        ]);

        return redirect('productos')->with('success', 'Creado con exito!');
    }

    public function update(Request $request)
    {
        $datos = $request->only([
            'nombre', 
            'precio',
            'peso',
            'referencia', 
            'categoria_id',
            'stock'
        ]);
        
        $productoExist = $this->verificarExistencia($request->input('referencia'));

        if ($productoExist && $productoExist->id != $request->input('id')) {
            return redirect('productos')->with('error', 'Ya hay un producto con esa referencia!');
        }

        $producto = Producto::find($request->input('id'));
        $producto->update($datos);

        return redirect('productos')->with('success', 'Actualizado con exito!');
    }

    public function delete(Request $request)
    {
        $producto = Producto::find($request->input('id'));
        $producto->delete();

        return redirect('productos');
    }

    private function verificarExistencia($referencia){
        $productoExist = Producto::where('referencia', $referencia)->first();

        if (!is_null($productoExist)) {
            return $productoExist;
        }

        return null;
    }
}
