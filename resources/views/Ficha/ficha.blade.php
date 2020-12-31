<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ficha</title>
    @extends('\layouts\app')
    <link rel="stylesheet" href="/site/css/ficha.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/bootstrap/scss">
</head>
<body>
    @section('content')

        <div class="container border" id="section">
            <div class="container-fluid border-primary" id="container-cabecalho">
                <div class="row">
                    <nav class= "col-sm-4 my-4 border-dark" id="cabecalho-nome">
                        <figure>
                            <img src="/site/images/ficha/name-character-original.png" alt="nome" height="80" width="330">
                            <figcaption>
                                <input type="text" name="character-name" class="col-form-input text-md-center" maxlength="19">                                
                            </figcaption>
                        </figure>                        
                    </nav>
                           
                    {{-- Alinhamento --}}
                    <nav class="col-sm-2 my-4">
                        <h6>Alinhamento</h6>
                            <select name="alinhamento" id="alinhamento" class="selectpicker">
                                <option value="lb">Leal-Bom</option>
                                <option value="ln">Leal-Neutro</option>
                                <option value="lm">Leal-Mau</option>
                                <option value="nb">Neutro-bom</option>
                                <option value="nn">Neutro</option>
                                <option value="nm">Neutro-mau</option>
                                <option value="cb">Caótico-bom</option>
                                <option value="cn">Caótico-neutro</option>
                                <option value="cm">Caótico-mau</option>
                            </select>
                    </nav>

                    {{-- Nível --}}
                    <nav class="col-sm-2 my-4">
                            <h6>Nível</h6>
                            <div class="number-input sm-number-input">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                <input class="quantity" min="0" name="quantity" value="1" type="number">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                            </div>
                    </nav>                           
                        
                </div>
            </div>
        </div>
        
    @endsection

    <script src="{{ asset('site/jquery.js') }}"></script>
    <script src="{{ asset('site/bootstrap.js') }}"></script>
</body>
</html>