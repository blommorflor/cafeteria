<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Venta;

class ReporteController extends Controller
{
    public function index()
    {
        $mayorVentas = $this->productoMasVendido();
        $mayorStock = $this->productoMasStock();

        return view('componentes.reportes', compact('mayorVentas', 'mayorStock'));
    }

    private function productoMasVendido(){

        $productos = Venta::join('productos as p', 'ventas.producto_id', '=', 'p.id')
        ->select('p.id as productoId', 'p.nombre as producto', 'p.referencia')
        ->selectRaw('SUM(ventas.cantidad) as cantidad, SUM(ventas.total) as ganancias')
        ->groupBy('p.id')
        ->orderByDesc('cantidad')
        ->orderByDesc('ganancias')
        ->paginate(5);

        return $productos;
    }

    private function productoMasStock(){
        $productos = Producto::select('id as productoId', 'nombre', 'stock', 'referencia')
                  ->whereNull('deleted_at')
                  ->orderByDesc('stock')
                  ->paginate(5);

        return $productos;
    }
}
