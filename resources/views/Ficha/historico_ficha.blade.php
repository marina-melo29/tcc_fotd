<script src="{{ asset('site/jquery.js') }}"></script>
<script src="{{ asset('site/popper.js') }}"></script>
<script src="{{ asset('site/bootstrap.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('site/js/ficha.js') }}"></script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Histórico de Personagens</title>
    @extends('\layouts\app')
    <link rel="stylesheet" href="{{asset('site/css/historico.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('site/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('site/styles.css') }}" rel="stylesheet">
</head>
<body>
    @section('content')
    <div class="container border mt-4" id="historic">

        <h3 class="my-4">HISTÓRICO DE PERSONAGENS</h3>

        <div class="container-fluid my-3" id="container-header-historic">
            <div class="create-character">
                <form action="{{ route('ficha.new') }}" method="post">
                    @csrf
                    <input type="submit" value="+" class="plus">Criar Nova Ficha
                </form>
            </div>
            
            @for($i = 0; $i < count($personagens); $i++)
                <div id="characters">     
                    <div class="row">
                        <div class='mx-4 col-2'>Nome:   {{ $personagens[$i]["nome"] }}</div>                                            
                        <div class='mx-4 col-2'>Raça:   {{ $personagens[$i]["raca"]['nm_raca'] }}</div>
                        <div class='mx-4 col-2'>Classe: {{ $personagens[$i]["classe"]['nm_classe'] }}</div>
                        <div class='mx-4 col-2'>Nivel:  {{ $personagens[$i]["nivel"] }}</div>
    
                        <form action="{{ route('user.ficha', $personagens[$i]['id']) }}" method="post">
                            @csrf
                            <div><input type="submit" value="Ver" class="btn btn-danger btn-go"></div>
                        </form>  
    
                        <form action="{{ route('ficha.delete', $personagens[$i]['id']) }}" method="post">
                            @csrf
                            <div>
                                <button type="submit" class="btn btn-danger btn-go">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="23" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </button>
                            </div>
                        </form>                        
                    </div>              
                               
                
                </div>
            @endfor

        </div>

    </div>

    @endsection    
</body>
</html>