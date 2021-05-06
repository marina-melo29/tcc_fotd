<script src="{{ asset('site/jquery.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="{{ asset('site/popper.js') }}"></script>
<script src="{{ asset('site/bootstrap.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('/site/js/index.js') }}"></script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fear Of The Dice</title>
    <link rel="stylesheet" href="site/bootstrap.css">
    @extends('\layouts\app')
</head>
<body>
    <link rel="stylesheet" href="{{asset('/site/css/index.css')}}">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="{{ asset('site/jquery.js') }}"></script>
    <script src="{{ asset('site/bootstrap.js') }}"></script>
    
    @section('content')
        <nav class = "slider mb-4">                        
            <header>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <!-- Slide One - Set the background image for this slide in the line below -->
                    <div class="carousel-item active" style="background-image: url('{{ asset('site/images/index/dados_roxos.jpg') }}')">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-4"></h2>
                        <p class="lead"></p>
                    </div>
                    </div>
                    <!-- Slide Two - Set the background image for this slide in the line below -->
                    <div class="carousel-item" style="background-image: url('{{ asset('site/images/index/witch.jpeg') }}')">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-4"></h2>
                        <p class="lead"></p>
                    </div>
                    </div>
                    <!-- Slide Three - Set the background image for this slide in the line below -->
                    <div class="carousel-item" style="background-image: url('{{ asset('site/images/index/conjunto_vermelho.jpg') }}')">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-4"></h2>
                        <p class="lead"></p>
                    </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Próximo</span>
                    </a>
                </div>
            </header>
            
            <!-- Page Content -->
            <section class="py-5">
                <div class="container">
                <h1 class="display-4">FEAR OF THE DICE</h1>
                <p class="lead">
                    "25 pega?", "Nesse caso é vantagem?", "Todo mundo rola teste de destreza aí...". <br>
                    Seja muito bem vindo(a) (a não ser que você seja Strahd von Zarovich)!
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dice-6" viewBox="0 0 16 16">
                        <path d="M13 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h10zM3 0a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V3a3 3 0 0 0-3-3H3z"/>
                        <path d="M5.5 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm8 0a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-8 4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-4a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                    </svg>
                </p>
                </div>
            </section>
               {{--  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
        
                        <div class="carousel-item active">
                            <nav class="d-block w-100">
                                <h1>This is the title</h1>
                                <p>This is the paragraph</p>
                            </nav>                        
                        </div>
                        <div class="carousel-item">
                            <nav class="d-block w-100">
                                <h1>This is the second title</h1>
                                <p>This is the second paragraph</p>
                            </nav>                        
                        </div>
                        <div class="carousel-item">
                            <nav class="d-block w-100">
                                <h1>This is the third title</h1>
                                <p>This is the third paragraph</p>
                            </nav>                        
                        </div>
        
        
                    </div>
        
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Próximo</span>
                    </a>
                </div> --}}
        </nav>
   
        
        <div class="container marketing">
               
            <!-- FEATURETTES -->
    
            <hr class="featurette-divider">
            
            <!-- Caminho para um bom RPG -->
            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">O CAMINHO PARA UM BOM RPG <span class="text-muted">It'll blow your mind.</span></h2>
                    <h5>Participe Ativamente</h5>
                    <p class="lead p-featurette">Mostre como seu personagem é, interaja com os NPC's, com os outros jogadores e com o cenário a sua volta.<br>
                        Se você for um jogador muito passivo e não participar das decisões do grupo ou esperar sempre que os outros ajam primeiro
                        (jogador "segue-fluxo"), a aventura poderá ir perdendo a graça para você (e até mesmo para seus companheiros), sem contar que 
                        em pouco tempo você já enjoará de seu personagem. 
                    </p>
                    
                    <!-- VER MAIS -->
                    <div class="panel second-panel">
                        <h5>Não poupe detalhes</h5>
                        <p class="lead p-featurette">
                            Descrever bem suas ações, fazer gestos com as mãos, imitar a postura do seu personagem
                            e entre outros, são todas ótimas formas de ter uma melhor imersão na história. <br>
                            Há pessoas que gostam de criar as vozes, cacoetes e manias para seus personagens e 
                            assim interpretá-los na hora do jogo.
                            É claro que você não é obrigado a fazer nada disto, ainda mais se é algo que te traz 
                            desconforto. <br>
                            Lembre-se sempre: Um bom RPG não depende apenas no mestre, mas também dos jogadores.                            


                        </p>
                        <h5>Não tente dar uma Deus Supremo</h5>
                        <p class="lead p-featurette">
                            Todos já conhecemos um jogador que tentava fazer de seu personagem o "deus das galáxias",
                            ou que inventava regras/desculpas para obter sucesso em suas jogadas, ou sempre era autoritário em tudo.
                            <br>A dica é simples; NÃO SEJA ESTE CARA!
                            Criar um personagem assim só vai te afastar dos outros jogadores. 
                        </p>
                    </div> 
                    <button type="button" class="btn btn-secondary accordion second-accordion" id="p_featurette_seeMore">Ver Mais &raquo;</button>

                </div>
              <div class="col-md-5">
                <img class="featurette-image img-fluid mx-auto" src="{{ asset('site/images/index/miniatura_dragao.jpeg') }}" alt="miniatura">
              </div>
            </div>
    
            <hr class="featurette-divider">
    
            <div class="row featurette">
              <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Os Três Pilares da Aventura<span class="text-muted">See for yourself.</span></h2>
                
                <h5>Exploração</h5>

                <p class="lead p-featurette">
                    Inclui os movimentos dos aventureiros através do mundo, interações com objetos e situações que exijam atenção.                    
                </p>

                <h5>Interação Social</h5>

                <p class="lead p-featurette">
                    Envolve os aventureiros conversando com alguém (ou algo). Isto pode significar convencer um NPC capturado a 
                    revelar a entrada secreta de um covil, ou até mesmo clamar por misericórdia a um orc chefe.                    
                </p>

                <h5>Combate</h5>

                <p class="lead p-featurette">
                    Envolve os personagens e outras criaturas brandindo armas ou conjurando magias, movimentando-se táticamente e 
                    assim por diante. <br>
                    O combate é o elemento mais estruturado de uma sessão de D&D.                
                </p>

              </div>
              <div class="col-md-5 order-md-1">
                <img class="featurette-image img-fluid mx-auto" src="{{ asset('site/images/index/miniatura_orc.jpeg') }}" alt="miniatura">
              </div>
            </div>
    
            <hr class="featurette-divider">
            
            <!-- PLANOS DE EXISTÊNCIA -->
            <div class="row featurette">

                <div class="col-md-7">

                    <h2 class="featurette-heading">Planos de Existência<span class="text-muted">Muahuauaha</span></h2>
                    
                    <p class="lead p-featurette">
                        Os Planos de Existência nada mais são do que inúmeras dimensões alternativas da realidade, que abrangem cada mundo no qual
                        os DMs conduzem suas aventuras, todas dentro de um reino relativamente mundano.
                    </p>

                    <h5>Plano Material</h5>

                    <p class="lead p-featurette">
                        É onde a maioria das aventuras se passam, onde há a existência da vida mortal e da matéria comum.
                        Só o Plano Material já possui uma infinidade de mundos que podem ser exploradas conforme a sua imaginação (e a do DM).
                    </p>

                    <h5>Ecos Materiais</h5>

                    <p class="lead p-featurette">
                        Ecos Materiais ou Planos Espelhados, são dimensões que basicamente refletem o Plano Material, porém de uma forma diferente...
                        Os Ecos Materiais são:                                        
                    </p>

                    <h6>Faéria, O Plano das Fadas</h6>

                    <p class="lead p-featurette">
                        É uma terra de luzes suaves e maravilhamento, uma região de pessoas pequenas com grandes
                        desejos, um lugar de música e morte. Alí, o sol nunca se põe ou nasce de verdade; ele permanece parado, próximo ao horizonte.
                        Criaturas feéricas, como aquelas trazidas ao mundo quando se usa "invocar seres da floresta" ou magias semelhantes, habitam o plano das fadas.
                    </p>  
                    
                    <h6>Sombral, O Plano das Sombras</h6>

                    <p class="lead p-featurette">
                        É uma dimensão de iluminação escura, um mundo de preto e branco onde a cor foi sugada de tudo.
                        Lá é uma região macabra, cuja escuridão tóxica odeia a luz e o céu é uma abóbada negra, sem sol e nem estrelas.
                    </p> 

                </div>

                <div class="col-md-5">

                    <img class="featurette-image img-fluid mx-auto" src="{{ asset('site/images/index/grande_roda.jpg') }}" alt="Generic placeholder image">
              
                </div>
            </div>
    
            <hr class="featurette-divider">
    
            <!-- Fim FEATURETTES -->

            <!-- BY -->
            <div class="row">              
                <div class="col align-self-center">
                  <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="" width="140" height="140">
                  <h2>Criado por Marina S. Melo</h2>
                  <p>Olá grande aventureiro! Me chamo Marina e desde muito tempo sou apaixonada por D&D. Sempre
                      que possível, estarei trabalhando em novidades para a plataforma. Fique a vontade para avaliar!
                  </p>
                  {{-- <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p> --}}
                </div>
            </div>

            <!-- Avaliação -->
            
            
            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
            
            @if($lggd == "true")
                <form name="form-avaliacao" method="POST" class="form-ficha" autocomplete="off">
                    <div class="vote">
                        <label>
                            <input type="radio" name="fb" value="1" />
                            <i class="fa"></i>
                        </label>
                        <label>
                            <input type="radio" name="fb" value="2" />
                            <i class="fa"></i>
                        </label>
                        <label>
                            <input type="radio" name="fb" value="3" />
                            <i class="fa"></i>
                        </label>
                        <label>
                            <input type="radio" name="fb" value="4" />
                            <i class="fa"></i>
                        </label>
                        <label>
                            <input type="radio" name="fb" value="5" />
                            <i class="fa"></i>
                        </label>
                    </div>
                </form>
            @endif
        </div>

        <script>
            accordion();            
        </script>
    @endsection

    
</body>
</html>