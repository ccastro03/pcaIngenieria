@extends('layouts.mainInicio')

@section('contentInicio')
    <div class="row pt-4 pb-2 text-center">
        <div class="col-lg-12 col-md-12 col-sm-12 pl-1">
            <h4 class="mb-0">Ronda: 0</h4>
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
                <div class="col-lg-8 col-md-8 col-12 pl-0">
                    @foreach($jugadores->all() as $jg)
                        <h4 class="mb-0">Jugador: {{ $jg->nombre }} - Dinero: {{ $jg->dinero }}</h4>
                    @endforeach
                </div>
                <div class="col-lg-4 col-md-4 col-12 pl-0">
                    @foreach($jugadores->all() as $jg)
                        <h4 class="mb-0">Jugador: {{ $jg->nombre }} - Dinero: {{ $jg->dinero }}</h4>
                    @endforeach
                </div>                
            </div>            
        </div>
        <div class="mt-3 col-lg-3 col-md-12 col-12 ml-auto" style="box-shadow: 0px 0px 2px 1px #000; height: 440px; overflow: auto;">
            <h5 class="mb-0" style="margin-left: -15px;">Ronda: 0</h5>
        </div>
    </div>

    <script>
        function apostar(num){
            alert(num);
        };
    </script>    
@endsection