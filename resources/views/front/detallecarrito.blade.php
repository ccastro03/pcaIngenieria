@extends('layouts.mainInicio')

@section('contentInicio')
    <div class="row pb-3">
        <div class="col-lg-12 col-md-12 col-sm-12">

            @if(Auth::guard('cliente')->check())
                <form id="logout-form" action="{{ url('cliente/logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>            

                <span>Cliente: <strong>{{ Auth::guard('cliente')->User()->nombre }}</strong></span>
                <a href="/detalleCarrito" class="button primary mx-auto">Carrito</a>
                <a href="/carrito" class="button secondary mx-auto">Continuar Comprando</a>                
                <a class="button primary mx-auto" onclick="event.preventDefault(); 
                document.getElementById('logout-form').submit();" id="logout"> Salir </a>
            @else
                <a href="/registrar" class="button secondary mx-auto ml-2">Registrarse</a>
                <a href="/ingresar" class="button primary mx-auto">Iniciar Sesión</a>            
            @endif
        </div>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Valor Unitario</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($compras->all() as $com)
                <tr>
                    <td>{{ $com->referencia }}</td>
                    <td>{{ $com->cantidad_producto }}</td>
                    <td>${{ $com->valor_unitario }}</td>
                    <td>${{ ( $com->cantidad_producto * $com->valor_unitario) }}</td>
                    <td><button class="button secondary" onclick="eliminarProducto('{{ $com->producto_id }}')"><i class="fa fa-trash"></i></button></td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <td>Neto: ${{ $neto[0]->neto }}</td>
                </tr>               
            </tfoot>            
        </table>
    </div>

    <div class="row pb-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <button class="button secondary" onclick="limpiarCarrito()">Limpiar Carrito</button>
            <button class="button primary" onclick="terminarCompra()">Terminar Compra</button>
        </div>
    </div>            

    <script>

        function limpiarCarrito(){
            $.ajax({
                url: "/limpiarCarrito",
                type: 'post',
                data: {},
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function(res) {
                    alertasCustom('success','Exito!',res); // 1: success, 2:info, 3:warning, 4:error                          
                    location.reload();
                }
            });   
        }

        function terminarCompra(){
            $.ajax({
                url: "/terminarCompra",
                type: 'post',
                data: {},
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function(res) {
                    alertasCustom('success','Exito!',res); // 1: success, 2:info, 3:warning, 4:error
                    location.href = '/carrito';
                }
            });   
        }     

        function eliminarProducto(id){            
            $.ajax({
                url: "/eliminarProducto",
                type: 'post',
                data: {'productoId':id},
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function(res) {
                    alertasCustom('success','Exito!',res); // 1: success, 2:info, 3:warning, 4:error   
                    location.reload();
                }
            });   
        }             
    </script>
@endsection