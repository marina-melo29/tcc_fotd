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
    <title>Ficha - Fear Of The Dice</title>
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
                <form name="form-ficha" method="POST" class="form-ficha" autocomplete="off">  
                    @csrf
                    <div class="row pt-2 mt-3">
                        {{-- Nome do Personagem --}}
                        <nav class= "col-lg-4" id="cabecalho-nome">
                            <figure>
                                <img src="{{ asset('site/images/ficha/name-character-original.png')}}" height="80" width="330">
                                <figcaption>
                                    <input type="text" name="nome_personagem" class="col-form-input text-md-center" maxlength="20" value="{{ $personagem['nome'] }}">                                
                                </figcaption>
                            </figure>                        
                        </nav>
                        
                        {{-- Raça --}}
                        <nav class="col-1 mr-5">
                            <h6>Raça</h6>
                                <select name="raca" id="raca" class="selectpicker">
                                    @for($i = 0; $i < count($racas); $i++)
                                        @if ($personagem['raca']['nm_raca'] != null)
                                            @if ($racas[$i]->nm_raca == $personagem['raca']['nm_raca'])
                                                <option value={{ $racas[$i]->id_raca }} selected>{{ $racas[$i]->nm_raca }}</option>
                                            @else
                                                <option value={{ $racas[$i]->id_raca }}>{{ $racas[$i]->nm_raca }}</option>
                                            @endif
                                        @else
                                            <option value={{ $racas[$i]->id_raca }}>{{ $racas[$i]->nm_raca }}</option>
                                        @endif                                 
                                                                                
                                    @endfor
                                </select>
                        </nav>

                        {{-- Classe --}}
                        <nav class="col-1 mr-5 ml-3">
                            <h6>Classe</h6>
                                <select name="classe" id="classe" class="selectpicker">
                                    @for($i = 0; $i < count($classes); $i++)
                                        @if ($personagem['classe']['nm_classe'] != null)
                                            @if ($classes[$i]->nm_classe == $personagem['classe']->nm_classe)
                                                <option value="{{ $classes[$i]->id_classe }}" selected>{{ $classes[$i]->nm_classe }}</option>
                                            @else
                                                <option value="{{ $classes[$i]->id_classe }}">{{ $classes[$i]->nm_classe }}</option>
                                            @endif
                                        @else
                                            <option value="{{ $classes[$i]->id_classe }}">{{ $classes[$i]->nm_classe }}</option>
                                        @endif                                                                        
                                    @endfor
                                </select>
                        </nav>

                        {{-- Alinhamento --}}
                        <nav class="col-2 ml-4">
                            <h6>Alinhamento</h6>
                                <select name="alinhamento" id="alinhamento" class="selectpicker">
                                    @for($i = 0; $i < count($alinhamento); $i++)

                                        @if ($personagem['alinhamento'] != null)
                                            @if ($alinhamento[$i]->nm_alinhamento == $personagem['alinhamento']->nm_alinhamento)
                                                <option value="{{ $alinhamento[$i]->id_alinhamento }}" selected>{{ $alinhamento[$i]->nm_alinhamento }}</option>
                                            @else
                                                <option value="{{ $alinhamento[$i]->id_alinhamento }}">{{ $alinhamento[$i]->nm_alinhamento }}</option>
                                            @endif
                                        @else
                                            <option value="{{ $alinhamento[$i]->id_alinhamento }}">{{ $alinhamento[$i]->nm_alinhamento }}</option>
                                        @endif
                                                                                
                                    @endfor
                                </select>
                        </nav>

                        {{-- Antecedente TO DO --}}
                        <nav class="col-2 mr-4">
                            {{-- <h6>Antecedente</h6>
                            <Select name="antecedente" class="selectpicker">
                                <option value="Eremita">Eremita</option>
                            </Select> --}}
                            <input type="submit" value="Salvar" name="save" id="submit" class="btn btn-danger">
                        </nav>

                        {{-- PP --}}
                        <nav class="col-2 my-3 ml-4">
                            <h6>Percepção Passiva</h6>
                            <div class="number-input sm-number-input lg-number-input">
                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                <input class="quantity" min="0" name="pp" value="{{ $personagem['pp'] }}" type="number">
                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                            </div>
                        </nav>

                        {{-- BP --}}
                        <nav class="col-2">
                            <h6>Bônus de Proficiência</h6>
                            <div class="number-input sm-number-input lg-number-input">
                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                <input class="quantity" min="2" name="bp" value="{{ $personagem['bp'] }}" type="number">
                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                            </div>
                        </nav>

                        {{-- Nível --}}
                        <nav class="col-2 my-3">
                                <h6>Nível</h6>
                                <div class="number-input sm-number-input lg-number-input">
                                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                    <input class="quantity" min="1" name="nivel" value="{{ $personagem['nivel'] }}" type="number">
                                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                </div>
                        </nav>
                        
                        
                            
                    </div>

                    <div class="row justify-content-start my-2">
                        {{-- PRIMEIRA COLUNA - Atributos--}}
                        <nav class="col-1 ml-2 mr-4">
                            {{-- Força --}}
                            <div class="attribute">
                                <h5>Força</h5>
                                <div class="number-input sm-number-input lg-number-input">
                                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus atr_forca"></button>
                                    <input class="quantity" id="quant-forca" min="8" max="20" name="forca" value="{{ ($personagem['atributos']['forca'] !=null) ? $personagem['atributos']['forca'] : 8 }}" type="number" readonly>
                                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"   class="plus  atr_forca"></button>
                                </div>
                                <div class="square-mod" readonly><p id="result_forca"></p></div>
                            </div>
                            {{-- Const --}}
                            <div class="attribute">
                                <h5>Const</h5>
                                <div class="number-input sm-number-input lg-number-input">
                                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus atr_const"></button>
                                    <input class="quantity" id="quant-const" min="8" max="20" name="const" value="{{ ($personagem['atributos']['constituicao'] !=null) ? $personagem['atributos']['constituicao'] : 8 }}" type="number" readonly>
                                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"   class="plus  atr_const"></button>
                                </div>
                                <div class="square-mod" readonly><p id="result_const"></p></div>
                            </div>  
                            {{-- Dest --}} 
                            <div class="attribute">
                                <h5>Dest</h5>
                                <div class="number-input sm-number-input lg-number-input">
                                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus atr_dest"></button>
                                    <input class="quantity" id="quant-dest" min="8" max="20" name="dest" value="{{ ($personagem['atributos']['destreza'] !=null) ? $personagem['atributos']['destreza'] : 8 }}" type="number" readonly>
                                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"   class="plus  atr_dest"></button>
                                </div>
                                <div class="square-mod" readonly><p id="result_dest"></p></div>
                            </div> 
                            {{-- Int --}} 
                            <div class="attribute">
                                <h5>Int</h5>
                                <div class="number-input sm-number-input lg-number-input">
                                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus atr_int"></button>
                                    <input class="quantity" id="quant-int" min="8" max="20" name="int" value="{{ ($personagem['atributos']['inteligencia'] !=null) ? $personagem['atributos']['inteligencia'] : 8 }}" type="number" readonly>
                                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"   class="plus  atr_int"></button>
                                </div>
                                <div class="square-mod" readonly><p id="result_int"></p></div>
                            </div>
                            {{-- Sab --}}
                            <div class="attribute">
                                <h5>Sab</h5>
                                <div class="number-input sm-number-input lg-number-input">
                                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus atr_sab"></button>
                                    <input class="quantity" id="quant-sab" min="8" max="20" name="sab" value="{{ ($personagem['atributos']['sabedoria'] !=null) ? $personagem['atributos']['sabedoria'] : 8 }}" type="number" readonly>
                                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"   class="plus  atr_sab"></button>
                                </div>
                                <div class="square-mod" readonly><p id="result_sab"></p></div>
                            </div>
                            {{-- Car --}}
                            <div class="attribute">
                                <h5>Car</h5>
                                <div class="number-input sm-number-input lg-number-input">
                                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus atr_car"></button>
                                    <input class="quantity" id="quant-car" min="8" max="20" name="car" value="{{ ($personagem['atributos']['carisma'] !=null) ? $personagem['atributos']['carisma'] : 8 }}" type="number" readonly>
                                    <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()"   class="plus  atr_car"></button>
                                </div>
                                <div class="square-mod" readonly><p id="result_car"></p></div>
                            </div>                       
                            
                        </nav>

                        {{-- SEGUNDA COLUNA --}}
                        <nav class="col-4 mr-3">
                            {{-- Info basic --}}
                            <div class="row">
                                {{-- Vida --}}
                                <nav class="col-4">
                                    <figure class="life basic-info">
                                        <h5>Vida</h5>
                                        <img src="{{ asset('site/images/ficha/coraca1.png')}}" alt="vida" height="100" width="100">
                                        <figcaption>                                
                                            <div class="number-input sm-number-input lg-number-input">
                                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                                <input class="quantity" min="0" name="vida" value="{{ $personagem['pv'] }}" type="number">
                                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                            </div>                              
                                        </figcaption>
                                    </figure>
                                </nav>
                                
                                {{-- Vida Atual --}}
                                <nav class="col-4">
                                    <figure class="life current-life basic-info">
                                        <h5>Vida Atual</h5>
                                        <img src="{{ asset('site/images/ficha/vida-atual.png')}}" alt="vida" height="105" width="90">
                                        <figcaption>                                
                                            <div class="number-input sm-number-input lg-number-input">
                                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                                <input class="quantity" min="0" name="vida_atual" value="{{ $personagem['pv_atual'] }}" type="number">
                                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                            </div>                              
                                        </figcaption>
                                    </figure>
                                </nav>

                                {{-- Classe de Armadura --}}
                                <nav class="col-4">
                                    <figure class="CA basic-info">
                                        <h5>Classe de Armadura</h5>
                                        <img src="{{ asset('site/images/ficha/shield1.png')}}" alt="vida" height="80" width="85">
                                        <figcaption>                                
                                            <div class="number-input sm-number-input lg-number-input">
                                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                                <input class="quantity" min="10" name="ca" value="{{ $personagem['ca'] }}" type="number">
                                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
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
                                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                                <input class="quantity" min="0" name="iniciativa" value="{{ $personagem['iniciativa'] }}" type="number">
                                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
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
                                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                                <input class="quantity" min="1" name="deslocamento" value="{{ $personagem['deslocamento'] }}" type="number">
                                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
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
                                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                                <input class="quantity" min="0" name="insp" value="{{ $personagem['inspiracao'] }}" type="number">
                                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                            </div>
                                        </div> 
                                    </div>                                                                                                     
                                </nav>
                                
                            </div>

                            {{-- Perícias e Outros--}}
                            <div class="row">
                                <nav class="col-7">                                                           
                                    <div class="pericias">
                                        <h6>Perícias</h6> 
                                            @for ($i = 0; $i < count($pericias); $i++)                
                                                <button type="button" class="accordion first-accordion">
                                                            
                                                    <p> {{ $titulo_pericias[$i]->atributo_equivalente }}
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                                            <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                                        </svg>
                                                    </p>                                                   
                                                                                                    
                                                </button>                   
                                                <div class="panel first-panel">
                                                    
                                                        @for ($j = 0; $j < count($pericias[$i]); $j++)
                                                            @if ($pericias[$i][$j]['checked'])

                                                                <input type="checkbox" checked  id="{{ $pericias[$i][$j]['nm_pericia'] }}" name="pericias[]"      value={{ $pericias[$i][$j]["id_pericia"] }}>
                                                                <label for="{{ $pericias[$i][$j]['nm_pericia'] }}">{{ $pericias[$i][$j]['nm_pericia'] }}</label>
                                                            
                                                            @else

                                                                <input type="checkbox"   id="{{ $pericias[$i][$j]['nm_pericia'] }}"       name="pericias[]"       value={{ $pericias[$i][$j]["id_pericia"] }}>
                                                                <label for="{{ $pericias[$i][$j]['nm_pericia'] }}">{{ $pericias[$i][$j]['nm_pericia'] }}</label>
                                                            
                                                            @endif
                                                            
                                                            
                                                        @endfor                                                
                                                        
                                                </div>     
                                            @endfor                                                                                                                                            
                                    </div>
                                </nav>

                                
                                {{-- <nav class="col-3">
                                    <div class="moedas">
                                        <h6></h6>
                                        
                                    </div>
                                </nav> --}}
                            </div>                                               
                        </nav>
                        

                        {{-- TERCEIRA COLUNA --}}
                        <nav class="col-3">
                            {{-- img jogador --}}
                            {{-- <div class="row mb-4">
                                <nav class="col-12">
                                    <div class="big-circle">
                                        
                                    </div>
                                </nav>
                            </div> --}}

                            {{-- Outras Prof. e Idiomas --}}
                            <div class="row">
                                <nav class="col-12">
                                    <div class="others">
                                        <h6>Outras Proficiências e Idiomas</h6>
                                        <textarea name="outras_prof" class="notes" maxlength="300">{{ $personagem['outras_prof'] }}</textarea>
                                    </div>
                                </nav>
                            </div>
                        </nav>

                        {{-- QUARTA COLUNA --}}
                        {{-- TO do --}}
                        <nav class="col-3">
                            {{-- TO DO --}}
                            <div class="row">
                                <button type="button" class="accordion second-accordion">Outras Características e Talentos</button>
                                <div class="panel second-panel">
                                    <textarea name="caract_e_talentos" class="notes" maxlength="300">{{ $personagem['caract_e_talentos'] }}</textarea>
                                </div>

                                <button type="button" class="accordion second-accordion" maxlength="300">Equipamento</button>
                                <div class="panel second-panel">
                                    <textarea name="notes" class="notes"></textarea>
                                    {{-- @for($i = 0; $i < count($racas); $i++)
                                        @if ($armadura[$i]->tipo_armadura == $personagem['armadura']->tipo_armadura)
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="armadura" id="armor" value="option1" checked>
                                                <label class="form-check-label" for="armor">
                                                    valor
                                                </label>
                                            </div>
                                        @else
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="armadura" id="armor" value="option1">
                                                <label class="form-check-label" for="armor">
                                                    valor
                                                </label>
                                            </div>
                                        @endif                                        
                                    @endfor --}}                                    
                                    
                                </div>                    
                               
                            </div>
                        </nav>
                       
                    </div>
                    
                </form>  
            </div>
        </div>

        <script>
            accordion();
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

        <script>
            $(function(){
                $('form[name="form-ficha"]').submit(function(event){
                    event.preventDefault();   
                     
                    $.ajax({
                        url: "{{ route('ficha.response', $personagem['id']) }}",
                        type: 'post',
                        data: $(this).serialize(),
                        dataType: 'json',
                        success: function(response){
                            if(response.success === true){ 
                                document.getElementById("submit").style.backgroundColor = "grey";
                                document.getElementById("submit").style.borderColor     = "grey"; 
                                document.getElementById("submit").style.color           = "#f8fafc";                              
                                //console.log(response);                                
                            }else{
                                console.log("erro");
                            }
                        }
                    });
                });

                $('form[name="form-ficha"]').on('change',function(){
                    document.getElementById("submit").style.backgroundColor = "#b22222e3";
                    document.getElementById("submit").style.borderColor     = "#b22222e3";
                });
            });

        </script>
        
    @endsection
</body>
</html>