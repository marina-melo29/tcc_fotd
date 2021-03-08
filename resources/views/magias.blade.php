<script src="{{ asset('site/jquery.js') }}"></script>
<script src="{{ asset('site/popper.js') }}"></script>
<script src="{{ asset('site/bootstrap.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('/site/js/magias.js') }}"></script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Magias - Fear Of The Dice</title>
    
    <link rel="stylesheet" href="site/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('/site/css/magia.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('site/bootstrap.css') }}" rel="stylesheet">
    @extends('\layouts\app')

</head>
<body>

    @section('content')
        <div class="container">
            <h2>MAGIAS</h2>

            {{-- Filtro de Magias--}}
            <nav class="filtro my-3">
                <button type="button" class="accordion filtro-accordion border">Filtros</button>
                    <div class="panel second-panel">
                        <form action="#" method="post">
                            <div class="row">
                                <label for="nivel">Nivel</label>                            
                                <div class="number-input sm-number-input lg-number-input" id="nivel">
                                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                    <input class="quantity" min="0" name="quantity" value="0" type="number">
                                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                </div>

                                <label for="classe">Classe</label>
                                <select name="classe" id="classe"><option value="#">classes</option></select>

                                <label for="ritual">É ritual?</label>
                                <input type="checkbox" name="ritual" id="ritual">
                                
                                <button type="submit" class="btn btn-danger">Buscar</button>
                            </div>
                            
                        </form>
                    </div>                                           
            </nav>

            {{-- Magias--}}
            <nav class="magias">
                <div class="d-felx justify-content-center">

                    {{ $magias->links('pagination::bootstrap-4') }}
        
                </div>
                
                <div class="row">  
                    @foreach($magias as $magia)
                        <div class="col-4 dados-magia my-3"> 
                            <nav id="titulo-magia border"><h3>{{ $magia->nm_magia }}</h3></nav>
                            <nav id="escola-magia"><h6>{{ $magia->nivel_magia }}º nivel de {{ $magia->escola_magia }}</h6></nav>
                            {{-- <nav id="Conjuradores"><h6><b>Conjuradores: 
                                @for($j=0; $j < $magias[$i]['qtd_conjuradores']; $j++)
                                    {{ $magias[$i]['conjuradores'][$j] }},
                                @endfor
                            </b></h6></nav> --}}
                            <nav id="tempo_de_preparo"><h6><b>Tempo de Preparo: </b>{{ $magia->tempo_de_preparo }}</h6></nav>
                            <nav id="distancia"><h6><b>Alcance: </b>{{ $magia->distancia }}</h6></nav>
                            <nav id="componentes"><h6><b>Componentes: </b>{{ $magia->componentes }}</h6></nav>
                            <nav id="duracao"><h6><b>Duração: </b>{{ $magia->duracao }}</h6></nav>
                            <nav id="descricao"><h6>{{ $magia->desc_magia }}</h6></nav>
                        </div>
                    @endforeach
                </div>

                <div class="d-felx justify-content-center">

                    {{ $magias->links('pagination::bootstrap-4') }}
        
                </div>
                
                
            </nav>
            
        </div>
        <script>
            accordion();
        </script>
    @endsection
    
</body>
</html>