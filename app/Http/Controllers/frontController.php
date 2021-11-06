<?php

namespace App\Http\Controllers;

use App\compras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class frontController extends Controller
{
    public function agregarProducto(Request $request)
    {
        $compra = new compras();
        $compra->cliente_id = $request['usuario'];
        $compra->producto_id =  $request['producto'];
        $compra->cantidad_producto = $request['cantidad'];
        $compra->compra_fecha =  now();
        $compra->compra_estado = '0';        
        $compra->save();
        
        return 'Producto Agregado Correctamente' ;
    }

    public function limpiarCarrito(Request $request)
    {
        $usuario = Auth::guard('cliente')->user()->id;

        $compra = DB::table('compras')->where('cliente_id', $usuario)->where('compra_estado', '0')->delete();
        
        return 'Carrito Vacio' ;
    }

    public function terminarCompra(Request $request)
    {
        $usuario = Auth::guard('cliente')->user()->id;

        $compra = DB::table('compras')->where('cliente_id', $usuario)->where('compra_estado', '0')
        ->update(['compra_estado' => 1]);

        return 'Compra Terminada' ;
    }   
    
    public function eliminarProducto(Request $request)
    {
        $usuario = Auth::guard('cliente')->user()->id;

        $compra = DB::table('compras')->where('cliente_id', $usuario)->where('compra_estado', '0')
        ->where('producto_id', $request['productoId'])->delete();

        return 'Producto Eliminado Correctamente' ;
    }     
}
