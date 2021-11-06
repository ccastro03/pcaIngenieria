@extends('layouts.mainInicio')

@section('contentInicio')
    <div class="row pt-4 pb-2 text-center">
        <div class="col-lg-12 col-md-12 col-sm-12 pl-1">
            <h4 class="mb-0">Ronda: {{ $ronda[0]->id }}</h4>
            <h4 class="mb-0">Jugador en turno: <span id="turnojuga"></span><span id="porcenjuga"></span></h4>
        </div>
    </div>

    <div class="row pb-2">
        <div class="pt-3 col-lg-9 col-md-12 col-11">
            <div class="row text-center">
                @foreach($numeros->all() as $nm)
                <div class="col-lg-1 col-md-1 col-3 pl-0">
                    <button class="buttonRul" onclick="apostar({{ $nm->id }})" style="background-color: {{ $nm->color }} ;">@if ($nm->numero < 10 ) &nbsp;{{ $nm->numero }}&nbsp; @else {{ $nm->numero }} @endif</button>
                </div>
                @endforeach
            </div>
            <div class="row pb-5">
                <hr class="my-3" style="border-bottom: solid 1px #000000;width: 100%;">
                <div class="col-lg-12 col-md-12 col-12 pl-0">
                    <h4 class="mb-0">Porcentajes de apuesta</h4>
                    <input type="radio" id="11p" name="porapuesta" value="0.11">
                    <label for="11p">11%</label>
                    <input type="radio" id="12p" name="porapuesta" value="0.12">
                    <label for="12p">12%</label>
                    <input type="radio" id="13p" name="porapuesta" value="0.13">
                    <label for="13p">13%</label>
                    <input type="radio" id="14p" name="porapuesta" value="0.14">
                    <label for="14p">14%</label>
                    <input type="radio" id="15p" name="porapuesta" value="0.15">
                    <label for="15p">15%</label>
                    <input type="radio" id="16p" name="porapuesta" value="0.16">
                    <label for="16p">16%</label>
                    <input type="radio" id="17p" name="porapuesta" value="0.17">
                    <label for="17p">17%</label>
                    <input type="radio" id="18p" name="porapuesta" value="0.18">
                    <label for="18p">18%</label>
                    <input type="radio" id="19p" name="porapuesta" value="0.19">
                    <label for="19p">19%</label>
                </div>
                <hr class="my-3" style="border-bottom: solid 1px #000000;width: 100%;">
                <div class="col-lg-12 col-md-12 col-12 pl-0">
                    <h4 class="mb-0">Jugadores</h4>
                    @foreach($jugadores->all() as $jg)
                        <h5 class="mt-2 mb-0">Jugador: {{ $jg->nombre }} - Dinero: <span id="dj{{ $jg->id }}">{{ $jg->dinero }}</span> <button onclick='selJugador({{ $jg->id }},"{{ $jg->nombre }}")'>Sel Turno</button></h5>
                    @endforeach
                </div>                
            </div>            
        </div>
        
        <div class="mt-3 col-lg-3 col-md-12 col-12 ml-auto" style="box-shadow: 0px 0px 2px 1px #000; height: 440px; overflow: auto;">
            @foreach($ronda->all() as $rn)
                <h5 class="mb-0" style="margin-left: -15px;">Ronda: {{ $rn->id }}, Resultado: {{ $rn->resultado }}</h5>
                <hr class="my-2" style="margin-left: -15px;border-bottom: solid 1px #000000;width: 100%;">
                @foreach($rondetalle->all() as $rd)
                    @if( $rn->id == $rd->id_ronda)
                        <h6 class="mb-2" style="margin-left: -15px;">Jugador: {{ $rd->jugador }}, Selección: {{ $rd->numero }} <br> Valor Apuesta: {{ $rd->valor_apuesta }} - "{{ $rd->tipo_resultado }}" - Total: {{ $rd->valor_resultado }}</h6>
                    @endif
                @endforeach
                <hr class="my-2" style="margin-left: -15px;border-bottom: solid 1px #000000;width: 100%;">
            @endforeach
        </div>
    </div>

    <script>
        var codJugador;
        var porcenApuesta;

        function apostar(idnum){
            var ractual = "<?php echo $ronda[0]->id; ?>";

            if(!codJugador){
                alertasCustom(4,'Error','Debes seleccionar un jugador para poder apostar');
            }else{
                var moneyJugador = document.getElementById("dj"+codJugador).innerHTML;

                if( moneyJugador <= 0){
                    alertasCustom(4,'¡Error!','no tienes fondos suficientes');
                }else{
                    if( (moneyJugador - (moneyJugador*porcenApuesta)) < 0){
                        alertasCustom(4,'¡Error!','Debes selecionar otro porcentaje de apuesta ya que el selecionado excede tus fondos');
                    }else{
                        let vlrApuesta;
                        if( moneyJugador <= 1000){
                            vlrApuesta = moneyJugador;
                        }else{
                            vlrApuesta = (moneyJugador*porcenApuesta);
                        }

                        $.ajax({
                            url: "/hacerApuesta",
                            type: 'POST',
                            data: {'ractual':ractual,'numero':idnum,'jugador':codJugador,'vlrApuesta':vlrApuesta},
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            error: function(err) {
                                alertasCustom(4,'¡Error!',err.statusText+" : "+err.responseJSON['message']);
                            },
                            success: function(res) {
                                alertasCustom(1,'¡Exito!',res);
                                result = parseFloat(moneyJugador - parseFloat(vlrApuesta).toFixed(2)).toFixed(2);
                                document.getElementById("dj"+codJugador).innerHTML = result;
                                return false;
                            }
                        });                    
                    }
                }
            }
        };

        function selJugador(idplayer, nomplayer){
            var porapuesta = document.querySelector('input[name="porapuesta"]:checked');
            var moneyJugador = document.getElementById("dj"+idplayer).innerHTML;

            if(moneyJugador <= 0){
                alertasCustom(4,'¡Error!','no tienes fondos suficientes para apostar');
                codJugador = '';
                porcenApuesta = '';
                document.getElementById("turnojuga").innerHTML = "";
            }else{            
                if(!porapuesta) {
                    alertasCustom(4,'Error','Debes seleccionar un porcentaje de apuesta'); // 1: success, 2:info, 3:warning, 4:error
                    hasError = true;
                }else{
                    codJugador = idplayer;
                    porcenApuesta = porapuesta.value;
                    document.getElementById("turnojuga").innerHTML = nomplayer;
                    document.getElementById("porcenjuga").innerHTML = " - Porcentaje de apuesta: "+(porapuesta.value * 100)+"%";
                    alertasCustom(1,'¡Exito!',"Jugador seleccionado correctamente");
                }
            }
        };

        $("input[name='porapuesta']").change(function(){
            porcenApuesta = $(this)[0].value;
            document.getElementById("porcenjuga").innerHTML = " - Porcentaje de apuesta: "+($(this)[0].value * 100)+"%";
        });        
    </script>    
@endsection