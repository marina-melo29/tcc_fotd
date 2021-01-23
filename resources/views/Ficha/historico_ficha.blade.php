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
                <input type="button" value="+" class="plus" href="{{ route('nova-ficha') }}">Criar Nova Ficha
            </div>
            
            @for($i = 0; $i < count($personagens); $i++)
                <div id="characters">                          
                    <div>Nome: {{ $personagens[$i]["nome"] }}</div>                                            
                    <div>Raça: {{ $personagens[$i]["raca"]->nm_raca }}</div>
                    <div>Classe: {{ $personagens[$i]["classe"]->nm_classe }}</div>
                    <div>Nivel: {{ $personagens[$i]["nivel"] }}</div>

                    <form action="{{ route('user.ficha', $personagens[$i]['id']) }}" method="post">
                        @csrf
                        <div><input type="submit" value="Ver" class="btn btn-danger btn-go"></div>
                    </form>                   
                
                </div>
            @endfor

        </div>

    </div>

    @endsection    
</body>
</html>