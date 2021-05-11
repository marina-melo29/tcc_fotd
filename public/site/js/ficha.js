function checkAttributes(){
    var attr_sab = $("#quant-sab").val();
    var mod_sab = Modifier_Calc__int(attr_sab);
    var bp = $("#bp").val(); 
    var pp = 0;
   
    if (document.getElementById("Percepção").checked) {
        pp += bp;
        console.log(pp);
    }else{
        console.log("n");
    }
}

/*function checkChanges()
{
    $('form[name="form-ficha"]').on('change',function(){
        $("#submit").attr("disabled", false);
        document.getElementById("submit").style.backgroundColor = "#b22222e3";
        document.getElementById("submit").style.borderColor     = "#b22222e3";                    
    });

    $('button[type=button]').on('click',function(){
        $("#submit").attr("disabled", false);
        document.getElementById("submit").style.backgroundColor = "#b22222e3";
        document.getElementById("submit").style.borderColor     = "#b22222e3";                    
    }); 
                               
}*/

function saveChanges()
{

}

function Modifier_Calc__int(attr)
{
    if(attr == 8 || attr == 9)
    {
        return -1;
    }
    else if(attr == 10 || attr == 11)
    {
        return 0;
    }
    else if(attr == 12 || attr == 13)
    {
        return 1;
    }
    else if(attr == 14 || attr == 15)
    {
        return 2;
    }
    else if(attr == 16 || attr == 17)
    {
        return 3;
    }
    else if(attr == 18 || attr == 19)
    {
        return 4;
    }
    else if(attr == 20)
    {
        return 5;
    }

}

function Modifier_Calc(attr)
{
    if(attr == 8 || attr == 9)
    {
        return "-1";
    }
    else if(attr == 10 || attr == 11)
    {
        return "+0";
    }
    else if(attr == 12 || attr == 13)
    {
        return "+1";
    }
    else if(attr == 14 || attr == 15)
    {
        return "+2";
    }
    else if(attr == 16 || attr == 17)
    {
        return "+3";
    }
    else if(attr == 18 || attr == 19)
    {
        return "+4";
    }
    else if(attr == 20)
    {
        return "+5";
    }

}

function accordion(){
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
        } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
        } 
    });
    }
    
    
}
    


$(document).ready(function(){
    
    $(".atr_forca").ready(function(){        
        var attr = $("#quant-forca").val();
        var mod_result = Modifier_Calc(attr);
        $("#result_forca").text(mod_result);
    }).click(function(){        
        var attr = $("#quant-forca").val();
        var mod_result = Modifier_Calc(attr);
        $("#result_forca").text(mod_result);
    });

    $(".atr_const").ready(function(){
        var attr = $("#quant-const").val();
        var mod_result = Modifier_Calc(attr);
        $("#result_const").text(mod_result);
    }).click(function(){
        var attr = $("#quant-const").val();
        var mod_result = Modifier_Calc(attr);
        $("#result_const").text(mod_result);
    });

    $(".atr_dest").ready(function(){
        var attr = $("#quant-dest").val();
        var mod_result = Modifier_Calc(attr);
        $("#result_dest").text(mod_result);
    }).click(function(){
        var attr = $("#quant-dest").val();
        var mod_result = Modifier_Calc(attr);
        $("#result_dest").text(mod_result);
    });

    $(".atr_int").ready(function(){
        var attr = $("#quant-int").val();
        var mod_result = Modifier_Calc(attr);
        $("#result_int").text(mod_result);
    }).click(function(){
        var attr = $("#quant-int").val();
        var mod_result = Modifier_Calc(attr);
        $("#result_int").text(mod_result);
    });

    $(".atr_sab").ready(function(){
        var attr = $("#quant-sab").val();
        var mod_result = Modifier_Calc(attr);
        $("#result_sab").text(mod_result);
    }).click(function(){
        var attr = $("#quant-sab").val();
        var mod_result = Modifier_Calc(attr);
        $("#result_sab").text(mod_result);
    });

    $(".atr_car").ready(function(){
        var attr = $("#quant-car").val();
        var mod_result = Modifier_Calc(attr);
        $("#result_car").text(mod_result);
    }).click(function(){
        var attr = $("#quant-car").val();
        var mod_result = Modifier_Calc(attr);
        $("#result_car").text(mod_result);
    });

    
    
});




