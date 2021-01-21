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
                <button class="plus">+</button>Criar Nova Ficha
            </div>

            <div id="characters">

                <div>Nome</div>                                            
                <div>Raça</div>
                <div>Classe</div>
                <div>Nivel</div>
                <div>Ver</div>

            </div>

        </div>

    </div>

    @endsection    
</body>
</html>