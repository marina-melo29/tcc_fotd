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
                        <form method="post" name="form-magia" autocomplete="off" action="{{ route('magia.get') }}">
                            @csrf
                            <div class="row">
                                <div class="pesquisa col-12 my-1">
                                    <input type="search" placeholder="Digite aqui o nome da magia" name="pesquisa_magia" id="pesquisa-magia">
                                </div>

                                <div class="nivel col-4 my-1">
                                    <label for="nivel">Nivel</label>                                                                
                                    <select name="nivel" id="nivel" class="selectpicker">
                                        <option value="%all_items%">Todos</option>
                                        @for ($i = 1; $i < 10; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                                                
                                <div class="classe col-5 my-1">   
                                    <label for="classe">Classe</label>                                 
                                    <select name="classe" id="classe" class="selectpicker">
                                        <option value="%all_items%">Todas</option>
                                        @for($i = 0; $i < count($classes); $i++)                                                                                        
                                            <option value="{{ $classes[$i]->id_classe }}">{{ $classes[$i]->nm_classe }}</option>                                                                                                                  
                                        @endfor
                                    </select>
                                </div>
                                
                                {{-- <div class="ritual col-4 my-1">
                                    <label for="ritual">É ritual?</label>
                                    <input type="checkbox" name="ritual" id="ritual">
                                </div> --}}
                                
                                <div class="col-6 my-1">
                                    <button type="submit" class="btn btn-danger">Buscar</button>
                                </div>
                                
                            </div>
                            
                        </form>
                    </div>                                           
            </nav>

            {{-- Magias--}}
            <nav class="magias">
                <div class="d-felx justify-content-center">

                    {{ $magias->links('pagination::bootstrap-4') }}
        
                </div>

                <ul class="list-group" id="lista-magia">
                    <div class="row">  
                            @foreach($magias as $magia)
                                <div class="col-4 dados-magia my-3"> 
                                    <li class="list-group-item">
                                        <nav id="titulo-magia border"><h3>{{ $magia->nm_magia }}</h3></nav>
                                        <nav id="escola-magia"><h6>{{ $magia->nivel_magia }}º nivel de {{ $magia->escola_magia }}</h6></nav>
                                        <nav id="Conjuradores"><h6><b>Conjuradores:     
                                            {{ $conjuradores[$magia->id_magia]}}
                                        </b></h6></nav>
                                        <nav id="tempo_de_preparo"><h6><b>Tempo de Preparo: </b>{{ $magia->tempo_de_preparo }}</h6></nav>
                                        <nav id="distancia"><h6><b>Alcance: </b>{{ $magia->distancia }}</h6></nav>
                                        <nav id="componentes"><h6><b>Componentes: </b>{{ $magia->componentes }}</h6></nav>
                                        <nav id="duracao"><h6><b>Duração: </b>{{ $magia->duracao }}</h6></nav>
                                        <nav id="descricao"><h6>{{ $magia->desc_magia }}</h6></nav>
                                    </li>                            
                                </div>
                            @endforeach
                    </div>
                </ul>

                <div class="d-felx justify-content-center">

                    {{ $magias->links('pagination::bootstrap-4') }}
        
                </div>
                
                
            </nav>
            
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
        <script>
            accordion();
           
        </script>
    @endsection
    
</body>
</html>