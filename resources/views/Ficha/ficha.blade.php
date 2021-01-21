<script src="{{ asset('site/jquery.js') }}"></script>
<script src="{{ asset('site/popper.js') }}"></script>
<script src="{{ asset('site/bootstrap.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('/site/js/ficha.js') }}"></script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ficha</title>
    @extends('\layouts\app')
    <link rel="stylesheet" href="{{asset('/site/css/ficha.css')}}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('site/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('site/styles.css') }}" rel="stylesheet">

</head>
<body>
        
    @section('content')

        <div class="container border" id="section">
            <div class="container-fluid" id="container-cabecalho">
                {{-- <form action="" method="post"> --}}
                    <div class="row pt-2 mt-3">
                        {{-- Nome do Personagem --}}
                        <nav class= "col-lg-4" id="cabecalho-nome">
                            <figure>
                                <img src="/site/images/ficha/name-character-original.png" alt="nome" height="80" width="330">
                                <figcaption>
                                    <input type="text" name="character-name" class="col-form-input text-md-center" maxlength="20">                                
                                </figcaption>
                            </figure>                        
                        </nav>
                        
                        {{-- Raça --}}
                        <nav class="col-1 mr-5">
                            <h6>Raça</h6>
                                <select name="raca" id="raca" class="selectpicker">
                                    <option value="anao">Anão</option>
                                    <option value="elfo">Elfo</option>
                                    <option value="halfling">Halfling</option>
                                    <option value="humano">Humano</option>
                                    <option value="draconato">Draconato</option>
                                    <option value="gnomo">Gnomo</option>
                                    <option value="meio-elfo">Meio-Elfo</option>
                                    <option value="meio-orc">Meio-Orc</option>
                                    <option value="tiefling">Tiefling</option>
                                </select>
                        </nav>

                        {{-- Classe --}}
                        <nav class="col-1 mr-5 ml-3">
                            <h6>Classe</h6>
                                <select name="classe" id="classe" class="selectpicker">
                                    <option value="barbari">Bárbaro</option>
                                    <option value="bardo">Bardo</option>
                                    <option value="bruxo">Bruxo</option>
                                    <option value="clerigo">Clérigo</option>
                                    <option value="druida">Druida</option>
                                    <option value="feiticeiro">Feiticeiro</option>
                                    <option value="guerreiro">Guerreiro</option>
                                    <option value="ladino">Ladino</option>
                                    <option value="mago">Mago</option>
                                    <option value="monge">Monge</option>
                                    <option value="paladino">Paladino</option>
                                    <option value="patrulheiro">Patrulheiro</option>
                                </select>
                        </nav>

                        {{-- Alinhamento --}}
                        <nav class="col-2 ml-4">
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

                        {{-- Antecedente --}}
                        <nav class="col-1 mr-4">
                            <h6>Antecedente</h6>
                            <Select name="antecedente" class="selectpicker">
                                <option value="Eremita">Eremita</option>
                            </Select>
                        </nav>

                        {{-- PP --}}
                        <nav class="col-2 my-3 ml-4">
                            <h6>Percepção Passiva</h6>
                            <div class="number-input sm-number-input lg-number-input">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                <input class="quantity" min="0" name="quantity" value="0" type="number">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                            </div>
                        </nav>

                        {{-- BP --}}
                        <nav class="col-2">
                            <h6>Bônus de Proficiência</h6>
                            <div class="number-input sm-number-input lg-number-input">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                <input class="quantity" min="2" name="quantity" value="2" type="number">
                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                            </div>
                        </nav>

                        {{-- Nível --}}
                        <nav class="col-2 my-3">
                                <h6>Nível</h6>
                                <div class="number-input sm-number-input lg-number-input">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                    <input class="quantity" min="1" name="quantity" value="1" type="number">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                </div>
                        </nav>
                        
                        
                            
                    </div>

                    <div class="row justify-content-start my-2">
                        {{-- PRIMEIRA COLUNA --}}
                        <nav class="col-1 ml-2 mr-4">
                            {{-- Força --}}
                            <div class="attribute">
                                <h5>Força</h5>
                                <div class="number-input sm-number-input lg-number-input">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus atr_forca"></button>
                                    <input class="quantity" id="quant-forca" min="8" max="20" name="quantity" value="8" type="number" readonly>
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"   class="plus  atr_forca"></button>
                                </div>
                                <div class="square-mod" readonly><p id="result_forca"></p></div>
                            </div>
                            {{-- Const --}}
                            <div class="attribute">
                                <h5>Const</h5>
                                <div class="number-input sm-number-input lg-number-input">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus atr_const"></button>
                                    <input class="quantity" id="quant-const" min="8" max="20" name="quantity" value="8" type="number" readonly>
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"   class="plus  atr_const"></button>
                                </div>
                                <div class="square-mod" readonly><p id="result_const"></p></div>
                            </div>  
                            {{-- Dest --}} 
                            <div class="attribute">
                                <h5>Dest</h5>
                                <div class="number-input sm-number-input lg-number-input">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus atr_dest"></button>
                                    <input class="quantity" id="quant-dest" min="8" max="20" name="quantity" value="8" type="number" readonly>
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"   class="plus  atr_dest"></button>
                                </div>
                                <div class="square-mod" readonly><p id="result_dest"></p></div>
                            </div> 
                            {{-- Int --}} 
                            <div class="attribute">
                                <h5>Int</h5>
                                <div class="number-input sm-number-input lg-number-input">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus atr_int"></button>
                                    <input class="quantity" id="quant-int" min="8" max="20" name="quantity" value="8" type="number" readonly>
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"   class="plus  atr_int"></button>
                                </div>
                                <div class="square-mod" readonly><p id="result_int"></p></div>
                            </div>
                            {{-- Sab --}}
                            <div class="attribute">
                                <h5>Sab</h5>
                                <div class="number-input sm-number-input lg-number-input">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus atr_sab"></button>
                                    <input class="quantity" id="quant-sab" min="8" max="20" name="quantity" value="8" type="number" readonly>
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"   class="plus  atr_sab"></button>
                                </div>
                                <div class="square-mod" readonly><p id="result_sab"></p></div>
                            </div>
                            {{-- Car --}}
                            <div class="attribute">
                                <h5>Car</h5>
                                <div class="number-input sm-number-input lg-number-input">
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus atr_car"></button>
                                    <input class="quantity" id="quant-car" min="8" max="20" name="quantity" value="8" type="number" readonly>
                                    <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"   class="plus  atr_car"></button>
                                </div>
                                <div class="square-mod" readonly><p id="result_car"></p></div>
                            </div>                       
                            
                        </nav>

                        {{-- SEGUNDA COLUNA --}}
                        <nav class="col-4">
                            {{-- Info basic --}}
                            <div class="row">
                                {{-- Vida --}}
                                <nav class="col-4">
                                    <figure class="life basic-info">
                                        <h5>Vida</h5>
                                        <img src="/site/images/ficha/coraca1.png" alt="vida" height="100" width="100">
                                        <figcaption>                                
                                            <div class="number-input sm-number-input lg-number-input">
                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                                <input class="quantity" min="0" name="quantity" value="0" type="number">
                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                            </div>                              
                                        </figcaption>
                                    </figure>
                                </nav>
                                
                                {{-- Vida Atual --}}
                                <nav class="col-4">
                                    <figure class="life current-life basic-info">
                                        <h5>Vida Atual</h5>
                                        <img src="/site/images/ficha/vida-atual.png" alt="vida" height="105" width="90">
                                        <figcaption>                                
                                            <div class="number-input sm-number-input lg-number-input">
                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                                <input class="quantity" min="0" name="quantity" value="0" type="number">
                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                            </div>                              
                                        </figcaption>
                                    </figure>
                                </nav>

                                {{-- Classe de Armadura --}}
                                <nav class="col-4">
                                    <figure class="CA basic-info">
                                        <h5>Classe de Armadura</h5>
                                        <img src="/site/images/ficha/shield1.png" alt="vida" height="80" width="85">
                                        <figcaption>                                
                                            <div class="number-input sm-number-input lg-number-input">
                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                                <input class="quantity" min="10" name="quantity" value="10" type="number">
                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                            </div>                              
                                        </figcaption>
                                    </figure>
                                </nav>

                                {{-- Iniciativa --}}
                                <nav class="col-4">
                                    <div class="init basic-info info-circle">
                                        <h5>Iniciativa</h5>
                                        <div class="circle">
                                            <div class="number-input sm-number-input lg-number-input">
                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                                <input class="quantity" min="0" name="quantity" value="0" type="number">
                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                            </div>
                                        </div> 
                                    </div>                                                                  
                                        
                                </nav>

                                {{-- Deslocamento --}}
                                <nav class="col-4">
                                    <div class="desl basic-info info-circle">
                                        <h5>Deslocamento</h5>
                                        <div class="circle">
                                            <div class="number-input sm-number-input lg-number-input">
                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                                <input class="quantity" min="1" name="quantity" value="9" type="number">
                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                            </div>
                                        </div> 
                                    </div>                                                                                                     
                                </nav>

                                {{-- Inspiração --}}
                                <nav class="col-4">
                                    <div class="insp basic-info info-circle">
                                        <h5>Inspiração</h5>
                                        <div class="circle">
                                            <div class="number-input sm-number-input lg-number-input">
                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                                <input class="quantity" min="0" name="quantity" value="0" type="number">
                                                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                            </div>
                                        </div> 
                                    </div>                                                                                                     
                                </nav>
                                
                            </div>

                            {{-- Perícias --}}
                            <div class="row">
                                <nav class="col-8">                                                           
                                    <div class="pericias">
                                        <h6>Perícias</h6>                                    
                                            <button class="accordion first-accordion">
                                                <p>Força
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                                        <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                                    </svg>
                                                </p>
                                                
                                            </button>
                                            <div class="panel first-panel">
                                                <input type="checkbox"   id="atletismo"       name="atletismo"       value="atletismo">
                                                <label for="atletismo">Atletismo</label>
                                            </div>                                      
                                            <button class="accordion first-accordion">
                                                <p>Destreza
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                                        <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                                    </svg>    
                                                </p>
                                            </button>
                                            <div class="panel first-panel">
                                                <input type="checkbox"   id="acrobacia"       name="acrobacia"       value="acrobacia">
                                                <label for="acrobacia">Acrobacia</label>
                                                <input type="checkbox"   id="furtividade"     name="furtividade"     value="furtividade">
                                                <label for="furtividade">Furtividade</label>
                                                <input type="checkbox"   id="prestidigitacao" name="prestidigitacao" value="prestidigitacao">
                                                <label for="prestidigitacao">Prestidigitação</label>
                                            </div>
                                            
                                            <button class="accordion first-accordion">
                                                <p>Inteligência
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                                        <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                                    </svg>    
                                                </p>
                                            </button> 
                                            <div class="panel first-panel">                                       
                                                <input type="checkbox"   id="arcanismo"       name="arcanismo"       value="arcanismo">
                                                <label for="arcanismo">Arcanismo</label>
                                                <input type="checkbox"   id="historia"        name="historia"        value="historia">
                                                <label for="historia">História</label>
                                                <input type="checkbox"   id="investigação"    name="investigação"    value="investigacao">
                                                <label for="investigação">Investigação</label>
                                                <input type="checkbox"   id="natureza"        name="natureza"        value="natureza">
                                                <label for="natureza">Natureza</label>
                                                <input type="checkbox"   id="religiao"        name="religiao"        value="religiao">
                                                <label for="religiao">Religião</label>
                                            </div> 

                                            <button class="accordion first-accordion">
                                                <p>Sabedoria
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                                        <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                                    </svg>
                                                </p>
                                            </button>
                                            <div class="panel first-panel"> 
                                                <input type="checkbox" id="intuicao"          name="intuicao"        value="intuicao">
                                                <label for="intuicao">Intuição</label>
                                                <input type="checkbox" id="lidaranimais"      name="lidaranimais"    value="lidaranimais">
                                                <label for="lidaranimais">Lidar Com Animais</label>
                                                <input type="checkbox" id="medicina"          name="medicina"        value="medicina">
                                                <label for="medicina">Medicina</label>
                                                <input type="checkbox" id="percepcao"         name="percepcao"       value="percepcao">
                                                <label for="percepcao">Percepcao</label>
                                                <input type="checkbox" id="sobrevivencia"     name="sobrevivencia"   value="sobrevivencia">
                                                <label for="sobrevivencia">Sobrevivência</label>
                                            </div> 

                                            <button class="accordion first-accordion">
                                                <p>Carisma
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                                        <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                                    </svg>
                                                </p>
                                            </button>
                                            <div class="panel first-panel">
                                                <input type="checkbox" id="atuacao"           name="atuacao"         value="atuacao">
                                                <label for="atuacao">Atuacão</label>
                                                <input type="checkbox" id="blefar"            name="blefar"          value="blefar">
                                                <label for="blefar">Blefar</label>
                                                <input type="checkbox" id="intimidacao"       name="intimidacao"     value="intimidacao">
                                                <label for="intimidacao">Intimidacão</label>
                                                <input type="checkbox" id="persuasao"         name="persuasao"       value="persuasao">
                                                <label for="persuasao">Persuasao</label>
                                            </div>                                                                        
                                    </div>
                                </nav>

                                <nav class="col-3">
                                    <div class="moedas">
                                        <h6>PC</h6>
                                        
                                    </div>
                                </nav>
                            </div>                                               
                        </nav>

                        {{-- TERCEIRA COLUNA --}}
                        <nav class="col-3">
                            {{-- img jogador --}}
                            <div class="row mb-4">
                                <nav class="col-12">
                                    <div class="big-circle">

                                    </div>
                                </nav>
                            </div>

                            {{-- Outras Prof. e Idiomas --}}
                            <div class="row">
                                <nav class="col-12">
                                    <div class="others">
                                        <h6>Outras Proficiências e Idiomas</h6>
                                        <textarea name="others" class="notes"></textarea>
                                    </div>
                                </nav>
                            </div>
                        </nav>

                        {{-- QUARTA COLUNA --}}
                        <nav class="col-3">
                            <div class="row">
                                <button class="accordion second-accordion">Outras proficiências e idiomas</button>
                                <div class="panel second-panel">
                                    <textarea name="others" class="notes"></textarea>
                                </div>

                                <button class="accordion second-accordion">Equipamento</button>
                                <div class="panel second-panel">
                                    <textarea name="others" class="notes"></textarea>
                                </div>                       

                                
                            </div>
                        </nav>
                    </div>
                    <input type="submit" value="Salvar" name="save" class="btn btn-danger">
                {{-- </form> --}}
            </div>
        </div>

        <script>
            accordion();
        </script>
        
    @endsection
</body>
</html>