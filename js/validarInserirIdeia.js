 function validar(){

    if($('#real').val()=="R$ 0,00" || $('#real').val()==""){

        alert("Informe um valor pedido ele deve ser maior que zero");
        $('#real').focus();
        return false;
    }else{

        if($('#ideia').val()==""){
            alert("O campo ideia não pode ficar vazio");
            $('#ideia').focus();
            return false;
        }else{
            if($('#categoriaSelect option:selected').text()==''){
                alert("O campo categoria não pode ficar vazio");
                $('select#categoriaSelect').focus();
                return false;
            }else{

                if($("input[name='registroinpi']:checked").val()=="Não"){
                    alert("Essa ideia deve ser patenteada");
                    $("input[name='registroinpi']:checked").focus();
                    return false;
                }else{

                    if($('#frase').val()==""){
                        alert("A frase não pode ficar vazia");
                        $('#frase').focus();
                        return false;
                    }else{
                        return true;
                    }
                }
            }
        }    
    }
}