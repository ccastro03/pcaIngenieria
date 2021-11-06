@extends('layouts.mainInicio')

@section('contentInicio')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="card-title">VECTORES</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            Resultado:
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <span id="res"></span>
                        </div>
                    </div>                                   
                </div>
                <div class="card-footer">
                    <button class="button primary ml-auto" onclick='proceso()'>Procesar</button>
                </div>                
            </div>
        </div>
    </div>

    <script>

        function proceso(){
            var arrayNumeros = new Array();
            let i = 0;
            let number = 0;

            while (i < 100) {
                i++;
                number = Math.floor(Math.random()*100000)+1;
                arrayNumeros.push(number);
            };

            arrayNumeros.sort(function(a,b){return b - a;});

            var lista = document.getElementById("res"); 
            lista.innerHTML = "";

            arrayNumeros.forEach(function(data,index){
                var linew = document.createElement("span");
                var contenido = document.createTextNode(data+', ');
                lista.appendChild(linew);
                linew.appendChild(contenido);

            })            
        };

    </script>
@endsection