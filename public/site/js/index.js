$(document).ready(function(){
    $('.vote label i.fa').on('click',function(){
                // remove classe ativa de todas as estrelas
                $('.vote label i.fa').removeClass('active');
                // pegar o valor do input da estrela clicada
                var val = $(this).prev('input').val();
                //percorrer todas as estrelas
                $('.vote label i.fa').each(function(){
                    /* checar de o valor clicado é menor ou igual do input atual
                    *  se sim, adicionar classe active
                    */
                    var $input = $(this).prev('input');
                    if($input.val() <= val){
                        $(this).addClass('active');
                    }
                });
                enviaAvaliacao(val);
    });

            //Ao sair da div vote
    $('.vote').mouseleave(function(){
                //pegar o valor clicado
                var val = $(this).find('input:checked').val();
                //se nenhum foi clicado remover classe de todos
                if(val == undefined ){
                    $('.vote label i.fa').removeClass('active');
                } else { 
                    //percorrer todas as estrelas
                    $('.vote label i.fa').each(function(){
                        /* Testar o input atual do laço com o valor clicado
                        *  se maior, remover classe, senão adicionar classe
                        */
                        var $input = $(this).prev('input');
                        if($input.val() > val){
                            $(this).removeClass('active');
                        } else {
                            $(this).addClass('active');
                        }
                    });
                }
                
    });        
});

function enviaAvaliacao(val){
    console.log(val);
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
}
function accordion(){
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {        
        this.classList.toggle("active");
        var panel = this.previousElementSibling;
        if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
        } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
        }

        if ($('#p_featurette_seeMore').hasClass("active")) 
        {
            $('#p_featurette_seeMore.active').text("« Ver Menos");
        }else{
            $('#p_featurette_seeMore').text("Ver Mais »");
        }
    });
    }
    
    
}

