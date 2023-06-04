<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function productosCompra()
    {
        $productos = Producto::orderByDesc('stock')->paginate(8);

        return view('componentes.compras', compact('productos'));
    }

    public function guardarCompra(Request $request)
    {
        $producto = Producto::find($request->input('producto_id'));

        if ($producto->stock < $request->input('cantidad')) {
            return redirect('compras')->with('error', 'No cuenta con stock suficiente!');
        }

        Venta::create([
            'producto_id' => $request->input('producto_id'),
            'cantidad' => $request->input('cantidad'),
            'precio_unitario' => $producto->precio,
            'total' => $producto->precio * $request->input('cantidad')
        ]);

        $producto->stock = $producto->stock - $request->input('cantidad');
        $producto->save();

        return redirect('compras')->with('success', 'Compra realizada exitosamente');
    }
}
