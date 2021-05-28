// function setEquipment(){

//     if($("#plus_equip")){
//         $("#plus_equip").remove();
//     }

//     var content = "<input id='new_equip' list='equipments_list'/><datalist id='equipments_list'><option value='chrome'></datalist>";
//     $("#equipamentos").append(content+"<div id='plus_equip'>+</div>");
// }

function checkAttributes(){
    var attr_sab = $("#quant-sab").val();
    var bp = parseInt($("#bp").val()); 
    var pp = 10;
    var mod_sab = parseInt(Modifier_Calc($("#quant-sab").val()));
   
    if (document.getElementById("Percepção").checked) {
        pp += bp;
    }

    pp += mod_sab;

    document.getElementById("pp").value = pp;
    
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

    
    //Quando aumentar ou diminuir a sabedoria ou o BP ou mexer na perícia percepção, altera a PP
    $("#plus_atr_sab, #minus_atr_sab, #plus_bp, #minus_bp, #Percepção").click(function(){
        checkAttributes();
    });

    //Adição de equipamentos
    // $("#equipamentos").ready(function(){
    //     setEquipment();
    // }).click(function(){
    //     setEquipment();
    // });    

});

function dice_rolls(){
    function singleRoll(dice, bonus) 
    {
        let result = Math.floor(Math.random() * dice) + 1;
        addBonus(bonus, result);
        totalResult(bonus, result);
        return result;
    }

    function multiRoll(dice, n, bonus) {
        var arr = [];
        for (var i = 0; i < n; i++) {
            arr.push(singleRoll(dice));
        }
        let result = arr;
        addBonus(bonus, result.join("⦁"));
        let sumResult = result.reduce((acc, curr) => acc + curr);
        totalResult(bonus, sumResult);
        return result;
    }

function advRoll(bonus, advantage, disadvantage) {
    let result = multiRoll(20, 2, bonus);
    
    if (advantage) {
        result = Math.max(result[0], result[1]);
    } else if (disadvantage) {
        result = Math.min(result[0], result[1]);
    }
    
    totalResult(bonus, result);
}

function addBonus(bonus, result) {
    if (bonus < 1) {
        $("#resultBox").html(result);
    } else {
        $("#resultBox").html(`${result} (+${bonus})`);
    }
}

function totalResult(bonus, result) {
    let total = result + bonus;
    setTimeout(()=>$("#totalBox").html(total), 200);
}

function roller() {
    var n = Number($("#quant").val());
    var dice = Number($("#faces").val());
    var bonus = Number($("#bonus").val());
    var adv = $("#advantage:checked").val();
    var disadv = $("#disadvantage:checked").val();
    
    //jogada com vantagem/disvantagem
    if (adv || disadv) {
        advRoll(bonus, adv, disadv);
        //jogando apenas 1 dado
    } else if (n < 2) {
        singleRoll(dice, bonus);
        //jogando 2 ou mais dados
    } else {
        multiRoll(dice, n, bonus);
    }
}

    $("#advantage").on("click", function() {
        $(".quant").toggle("slow");
        $(".faces").toggle("slow");
        $("#disadvantage").toggle();
    });

    $("#disadvantage").on("click", function() {
        $(".quant").toggle("slow");
        $(".faces").toggle("slow");
        $("#advantage").toggle();
    });

    $("#button").mouseover(function (){
        $(".fa-refresh").addClass("fa-spin");
    });
    $("#button").mouseout(function (){
        $(".fa-refresh").removeClass("fa-spin");
    });

    $("#button").on("click", function() {
        roller();
    });


}



