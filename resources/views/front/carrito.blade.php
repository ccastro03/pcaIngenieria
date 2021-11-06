@extends('layouts.mainInicio')

@section('contentInicio')
    <div class="row pb-3">
        <div class="col-lg-12 col-md-12 col-sm-12">

            @if(Auth::guard('cliente')->check())
                <form id="logout-form" action="{{ url('cliente/logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>            

                <span>Cliente: <strong>{{ Auth::guard('cliente')->User()->nombre }}</strong></span>
                <a href="/detalleCarrito" class="button secondary mx-auto">Carrito</a>
                <a class="button primary mx-auto" onclick="event.preventDefault(); 
                document.getElementById('logout-form').submit();" id="logout"> Salir </a>
            @else
                <a href="/registrar" class="button secondary mx-auto ml-2">Registrarse</a>
                <a href="/ingresar" class="button primary mx-auto">Iniciar Sesión</a>            
            @endif
        </div>
    </div>

    <div class="row">
        @foreach($productos->all() as $pro)
        <div class="col-lg-3 col-md-3 col-sm-3 pb-3">
            <div class="thumbnail">
                <a href="javascript:void(0)"><img src="{{ asset('img/no_image.jpg') }}" alt=""></a>
                <div class="caption cntr">
                    <p>{{ $pro->referencia }}</p>
                    <p>{{ $pro->descripcion }}</p>
                    <p><strong> ${{ $pro->valor_unitario }}</strong></p>
                    <div class="input-group">
                        <div class="input-group-prepend ml-3 mr-2">
                            <button class="button secondary small" type="button" onclick="cantidad('-','{{ $pro->id }}')">-</button>
                        </div>                        
                        <input type="number" id="cantid{{ $pro->id }}" class="text-center" style="height:auto; width:25%;" value="1" min="1" max="20" oninput="limitedigitos(this)">
                        <div class="input-group-append mr-3 ml-2">
                            <button class="button secondary small" type="button" onclick="cantidad('+','{{ $pro->id }}')" >+</button>
                        </div>
                    </div>         
                    <h4><button class="button primary fit small" title="add to cart" onclick="agregar('{{ $pro->id }}')">Añadir</button></h4> 
                </div>                
            </div>
        </div>
        @endforeach
    </div>

    <script>
        function cantidad(signo,id){
            var elemento = document.getElementById('cantid'+id);
            var currentVal = parseInt(elemento.value);
            var newValue = 0;

            if( signo == '+' ){
                newValue = currentVal + 1;
            }else if( signo == '-' ){
                newValue = currentVal - 1;
            }

            if( newValue < 1 ){
                newValue = 1;
            }else if( newValue > 20 ){
                newValue = 20;
            }

            elemento.value = newValue;

        }

        function limitedigitos($this){
            if ($this.value.length > 2) {
                $this.value = $this.value.slice(0,2); 
            }

            if ($this.value > 19) {
                $this.value = 20; 
            }            
        }     

        function agregar(id){
            var login = '<?php echo Auth::guard('cliente')->check(); ?>';

            if(login != 1){
                alertasCustom('warning','¡Cuidado!','Debes iniciar sesión primero'); // 1: success, 2:info, 3:warning, 4:error  
            }else{
                var cantidad = document.getElementById('cantid'+id).value;
                var usuario = JSON.parse('<?php echo Auth::guard('cliente')->user(); ?>');

                $.ajax({
                    url: "/agregarProducto",
                    type: 'post',
                    data: {'usuario':usuario['id'],'producto':id,'cantidad':cantidad},
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function(res) {
                        alertasCustom('success','Exito!',res); // 1: success, 2:info, 3:warning, 4:error
                    }
                });
            }          
        }
    </script>
@endsection