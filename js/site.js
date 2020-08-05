//MASCARA DO SITE 

function validaEmail(email)
{
    return email.search(/(\w[\w\.\+]+)@(.+)\.(\w+)$/) == 0;
}

/*----------------------------------------------------------------------------
 Formatação para qualquer mascara
 -----------------------------------------------------------------------------*/
function validaCPF(cpf)
{
    cpf = cpf.replace(/[^\d]+/g, '');
    var numeros, digitos, soma, i, resultado, digitos_iguais;
    digitos_iguais = 1;
    if (cpf.length < 11)
        return false;
    for (i = 0; i < cpf.length - 1; i++)
        if (cpf.charAt(i) != cpf.charAt(i + 1))
        {
            digitos_iguais = 0;
            break;
        }
    if (!digitos_iguais)
    {
        numeros = cpf.substring(0, 9);
        digitos = cpf.substring(9);
        soma = 0;
        for (i = 10; i > 1; i--)
            soma += numeros.charAt(10 - i) * i;
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0))
            return false;
        numeros = cpf.substring(0, 10);
        soma = 0;
        for (i = 11; i > 1; i--)
            soma += numeros.charAt(11 - i) * i;
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(1))
            return false;
        return true;
    }
    else
        return false;
}



function formatar(src, mask) {
    var i = src.value.length;
    var saida = mask.substring(0, 1);
    var texto = mask.substring(i)
    if (texto.substring(0, 1) != saida)
    {
        src.value += texto.substring(0, 1);
    }
}


// FUNÇÕES PARA MASCARAR CAMPOS:
function mascara(o, f) {
    v_obj = o
    v_fun = f
    setTimeout("execmascara()", 1)
}
function execmascara() {
    v_obj.value = v_fun(v_obj.value)
}

function leech(v) {
    v = v.replace(/o/gi, "0")
    v = v.replace(/i/gi, "1")
    v = v.replace(/z/gi, "2")
    v = v.replace(/e/gi, "3")
    v = v.replace(/a/gi, "4")
    v = v.replace(/s/gi, "5")
    v = v.replace(/t/gi, "7")
    return v
}

function soNumeros(v) {
    return v.replace(/\D/g, "")
}

function mtelefone(v) {
    v = v.replace(/\D/g, "")                 //Remove tudo o que não é dígito
    v = v.replace(/^(\d\d)(\d)/g, "($1) $2") //Coloca parênteses em volta dos dois primeiros dígitos
    v = v.replace(/(\d{4})(\d)/, "$1-$2")    //Coloca hífen entre o quarto e o quinto dígitos

    return v
}
function mtel(v) {
    v = v.replace(/\D/g, "");             //Remove tudo o que não é dígito
    v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v = v.replace(/(\d)(\d{4})$/, "$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}
function id(el) {
    return document.getElementById(el);
}
function mascCPF(v) {
    v = v.replace(/\D/g, "")                    //Remove tudo o que não é dígito
    v = v.replace(/(\d{3})(\d)/, "$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
    v = v.replace(/(\d{3})(\d)/, "$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
    //de novo (para o segundo bloco de números)
    v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2") //Coloca um hífen entre o terceiro e o quarto dígitos
    return v
}





function mtelefone2(v) {
    v = v.replace(/\D/g, "")                 //Remove tudo o que não é dígito
    v = v.replace(/^(\d\d\d)(\d)/g, "($1) $2") //Coloca parênteses em volta dos TRÊS primeiros dígitos
    v = v.replace(/(\d{4})(\d)/, "$1-$2")    //Coloca hífen entre o quarto e o quinto dígitos
    return v
}

function mascCEP(v) {
    v = v.replace(/D/g, "")                //Remove tudo o que não é dígito
    v = v.replace(/^(\d{5})(\d)/, "$1-$2") //Esse é tão fácil que não merece explicações
    return v
}

function mdata(v) {
    v = v.replace(/\D/g, "")                    //Remove tudo o que não é dígito
    v = v.replace(/(\d{2})(\d)/, "$1/$2")       //Coloca uma barra entre o segundo e o terceiro dígitos
    v = v.replace(/(\d{2})(\d)/, "$1/$2")       //Coloca uma barra entre o quarto  e o quinto dígitos
    //de novo (para o segundo bloco de números)
    return v
}

function mascCNPJ(v) {
    v = v.replace(/\D/g, "")                           //Remove tudo o que não é dígito
    v = v.replace(/^(\d{2})(\d)/, "$1.$2")             //Coloca ponto entre o segundo e o terceiro dígitos
    v = v.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3") //Coloca ponto entre o quinto e o sexto dígitos
    v = v.replace(/\.(\d{3})(\d)/, ".$1/$2")           //Coloca uma barra entre o oitavo e o nono dígitos
    v = v.replace(/(\d{4})(\d)/, "$1-$2")              //Coloca um hífen depois do bloco de quatro dígitos
    return v
}

function mascValorPonto(v) {
    v = v.replace(/[^1234567890.,]/g, ""); //somente numeros, ponto e virgula
    v = v.replace(/,/, "."); //se digitar virgula transforma em ponto.
    return v;
}

function validaFormContato()
{
    alert("oiee");
    if ($('#nome').val() == '' || $('#nome').val() == 'nome' || $('#nome').val() == '*Nome') {
        alert('Informe o nome!');
        $('#nome').focus();
        return false;
    } else if (!validaEmail($('#email').val())) {
        alert('E-mail incorreto!');
        $('#email').focus();
        return false;
    } else if ($('#telefone').val() == '' || $('#telefone').val() == 'telefone') {
        alert('Informe o Telefone!');
        $('#telefone').focus();
        return false;
    } else if ($('#mensagem').val() == '') {
        alert('Informe a Mensagem!');
        $('#mensagem').focus();
        return false;
    }

    else
        return true;
}

$(document).ready(function() {
    //Aqui funciona o banner rotativo
    $('#bannerRotativo').cycle({
        fx: 'scrollLeft',
        speed: 'fast',
        timeout: 3000,
        resizeContainer: false,
        slideResize: false,
        next: '#next',
        prev: '#prev'
    });

//   ESSA FUNÇÃO SERVE PARA FAZER O EFEITO DE AUMENTAR A DIV
    $('.tile').mouseover(function() {
        $(this).stop();
        $(this).animate({
            width: 140 + 'px'
        }, 200, function() {
            $(this).animate({
                paddingTop: 15 + 'px',
                paddingBottom: 15 + 'px'
            }, 200);


        });

    });
    //   ESSA FUNÇÃO SERVE PARA FAZER REMOVER O EFEITO DE AUMENTAR A DIV
    $('.tile').mouseout(function() {
        $(this).stop();
        $(this).animate({
            width: 100 + 'px'
        }, 200, function() {
            $(this).animate({
                paddingTop: 0 + 'px',
                paddingBottom: 0 + 'px'
            }, 200);
        });

    });
    //AQUI INICIA ALGO
//    $(function(){
//        var maiorLinha = 0;
//        $('.container .linha').each(function(){
//            var larguraLinha = 0;
//            $(this).children(".tile").each(function(){
//                larguraLinha+=$(this).width();
//                larguraLinha+= 2*parseInt($(this).css("margin-right").toString().replace("px",""));
//                
//            });
//            if(larguraLinha > maiorLinha){
//                maiorLinha = larguraLinha+5;
//                
//            }
//        });
////        $('.container').css("width", maiorLinha.toString() + "px");
//    });//A função de inserir automaticamente o scrrol termina
//    //Aqui vai começar a função para adicionar ou remover a função quando eu passar o mouse
    $('.tile').mouseover(function() {

        $(this).addClass("selecionado");

    });
    $('.tile').mouseout(function() {
        $(this).removeClass("selecionado");

    });
    $('.tile').mouseleave(function() {
        $(this).removeClass("selecionado");

    });

    $("#login").click(function() {
        $('#loginTudo').fadeToggle().css("display", "block");

    });
    //Aqui na tela do login ao clicar no X a area de login some
    $("#fechar").click(function() {
        $("#loginTudo").fadeToggle().css("display", "none");

    });

    //Aqui fecha a tela login quando o esc e pressionado
    $(document).on('keydown', function(e) {
        if (e.keyCode === 27) {
            $("#loginTudo").hide();
        }
    });
    /* Executa a requisição quando o campo CEP perder o foco */

    $('#cep').blur(function() {
        /* Configura a requisição AJAX */
        $.ajax({
            url: '../mindUp/includes/consultarCep.php', /* URL que será chamada */
            type: 'POST', /* Tipo da requisição */
            data: 'cep=' + $('#cep').val(), /* dado que será enviado via POST */
            dataType: 'json', /* Tipo de transmissão */
            success: function(data) {
                if (data.sucesso == 1) {
                    $('#endereco').val(data.endereco);
                    $('#bairro').val(data.bairro);
                    $('#cidade').val(data.cidade);
                    $('#estado').val(data.estado);

                    $('#numero').focus();
                }
            }
        });
        return false;
    })
    $("#menuDuvidas ul li a").click(function() {

        $("#duvidasBoxDireito > div").hide();
        id = $(this).attr("rel");
        $("#" + id).fadeToggle(500);

    });

    $('.fancybox').fancybox();

    /*
     *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
     */
    $('.fancybox-media')
            .attr('rel', 'media-gallery')
            .fancybox({
                openEffect: 'none',
                closeEffect: 'none',
                prevEffect: 'none',
                nextEffect: 'none',
                arrows: false,
                helpers: {
                    media: {},
                    buttons: {}
                }
            });


});//AQUI FECHA O DOCUMENT READY
