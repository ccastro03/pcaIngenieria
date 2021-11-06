@extends('layouts.mainInicio')

@section('contentInicio')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="card-title">Potencia</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 form-group">
                            <label for="base" class="">Numero Base</label>
                            <input name="base" id="base" type="text" class="form-control">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 form-group">
                            <label for="potencia" class="">Numero Potencia</label>
                            <input name="potencia" id="potencia" type="text" class="form-control">
                        </div>                        
                    </div>                 
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            Resultado:<br><span id="res"></span>
                        </div>
                    </div>                                  
                </div>
                <div class="card-footer">
                    <button class="button primary ml-auto" onclick='proceso()'>Ejecutar</button>                
                </div>                
            </div>
        </div>
    </div>

    <script>

        function proceso(){
            var base = document.getElementById("base").value;
            var potencia = document.getElementById("potencia").value;

            var res = 1;
            var resultado = 0;

            for(let i = 0; i < potencia; i++){
                for(let x = 0; x < res; x++){
                    resultado += parseInt(base);
                }
                res = resultado;
                resultado = 0;
            }     

            document.getElementById("res").innerHTML = res;       
        };

    </script>
@endsection