<?php /*  Expressamente proibido ver essa página se não estiver logado

    Autor : Gustavo Riposati 

  */ ?>

<?php include('./includes/header.php') ?>
<?php include('./includes/topo.php') ?>

<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="js/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="js/source/jquery.fancybox.css?v=2.1.5" media="screen" />
<script type="text/javascript" src="js/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

        <script type="text/javascript">
                        $(document).ready(function() {

                            $('.fancybox').fancybox();

                            /*
                             *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
                            */
                            $('.fancybox-media')
                                .attr('rel', 'media-gallery')
                                .fancybox({
                                    openEffect : 'none',
                                    closeEffect : 'none',
                                    prevEffect : 'none',
                                    nextEffect : 'none',

                                    arrows : false,
                                    helpers : {
                                        media : {},
                                        buttons : {}
                                    }
                                });


                        });
</script>

<!--  Esse CSS interno foi pelo fato de haver algum problema 
      no css que não deixou carregar os efeitos necessários
      nas divs de menus
 -->

 <!--  Menu das ideias -->
<style>
    .jimgMenu {
    position: relative;
    width: 670px;
    height: 200px;
    overflow: hidden;
    margin: -200px 470px 100px;
    border-radius:10px; 
}

.jimgMenu ul {
    border-radius:10px;
    margin: 0px;
    display: block;
    height: 200px;
    width: 1340px;
    
    }

.jimgMenu ul li {
    float: left;
    border-radius:10px;
}

.jimgMenu ul li a {
    border-radius:10px;
    text-indent: -1000px;
    background:#FFFFFF none repeat scroll 0%;
    border-right: 2px solid #fff;
    cursor:pointer;
    display:block;
    overflow:hidden;
    width:78px;
    height: 200px;
}

.jimgMenu ul li.landscapes a {
    background: url(imagens/inserirideia.png) repeat scroll 0%;
}

.jimgMenu ul li.people a {
    background: url(imagens/mostrarideias.png) repeat scroll 0%;
}

.jimgMenu ul li.nature a {
    background: url(imagens/atualizarideia.png) repeat scroll 0%;
}
.jimgMenu ul li.abstract a {
    background: url(imagens/deletarideia.png) repeat scroll 0%;
}

.jimgMenu ul li.urban a {
    background: url(imagens/investir.png) repeat scroll 0%;
    min-width:310px;
    
}

/* -----------------------------------  */ 

</style>

<!-- Menu de opções do usuário -->

<style>
    .jimgMenu2 {
    border-radius:10px;
    position:relative;
    width: 670px;
    height: 200px;
    overflow: hidden;
    margin:20px 470px 0px;
    margin-bottom:50px; 
}

.jimgMenu2 ul {
    margin: 0px;
    display: block;
    height: 200px;
    width: 1340px;
    border-radius:10px;
    }

.jimgMenu2 ul li {
    border-radius:10px;
    float: left;
}

.jimgMenu2 ul li a {
    border-radius:10px;
    text-indent: -1000px;
    background:#FFFFFF none repeat scroll 0%;
    border-right: 2px solid #fff;
    cursor:pointer;
    display:block;
    overflow:hidden;
    width:78px;
    height: 200px;
}

.jimgMenu2 ul li.landscapes a {
    background: url(imagens/editarperfil.png) repeat scroll 0%;
}


.jimgMenu2 ul li.people a {
     background: url(imagens/sugestoes.png) repeat scroll 0%;
}

.jimgMenu2 ul li.nature a {
    background: url(imagens/visualizarOutroPerfil.png) repeat scroll 0%;
}
.jimgMenu2 ul li.abstract a {
    background: url(imagens/ideiasInvestidas.png) repeat scroll 0%;
}


.jimgMenu2 ul li.urban a {
    background: url(imagens/minhasideiasinvestidas.png) repeat scroll 0%;
    min-width:310px;
    
}

.clear {
    clear: both;
}


/* -----------------------------------  */ 

</style>
<script type="text/javascript" src="js/jquery-easing-1.3.pack.js"></script>
<script type="text/javascript" src="js/jquery-easing-compatibility.1.2.pack.js"></script>
<script type="text/javascript" src="js/menuOpcoesPainelIdeias.js"></script>
<script type="text/javascript" src="js/menuOpcoesPainelIdeias2.js"></script>


<?php
        
        $id = $_GET['id'];

        $query = "select * from usuario where id = '$id'" ;

        $resultado = mysqli_query($conexao,$query);
        
        $nome = mysqli_fetch_row($resultado);
    
?> 
<div id="localizaoSite">
            <div id="localizaoReduzido">
                <span class="fontDouradaTahoma">Você está em:</span><span class=""> &nbsp;Perfil usuário</span>
            </div>
</div>

<?php
    if(isset($nome)){ /// Se o usuário abriu a sessão 
    echo"<div style='background-color:#44619d;width:100%;height:450px'>";

    echo "<br><h1 style='color:#fff'>Bem vindo ao MindUp Ideias</h1><br><br>";


    echo "
    <img src='fotos/".$nome[11]."' id='previsualizar2'></a>
    ";
        /*  Isso vai para o controlador para tirar a lógica da visão   */
        $v = $nome[1];
        $cont=0;
        $prim='';

        while($cont < strlen($v) && $v{$cont}!=' '){ /// pra pegar so o primeiro nome do User
            $prim{$cont} = $v{$cont};
            $cont++;
        }

         $stringArrayF="";
         foreach ($prim as $stringArray)
          {
            $stringArrayF = $stringArrayF.$stringArray;
          }

        /*  está lógica ira para um método do controlador posteriormente  */

         echo " 
                <div style='height:250px;
                margin-left:8px;margin-top:-200px;color:#fff'>
                    <strong>Usuário :</strong> $stringArrayF<br><br> <!-- Só o primeiro nome do User -->
                    <strong>Telefone celular :</strong> $nome[4] <br><br>
                    <strong>Telefone Fixo : </strong>$nome[5] <br><br>
                    <strong>Email : </strong>$nome[6] <br><br>
                    <strong>Posso Investir :</strong> R$$nome[10] <br><br>
               </div>

               <!--<div style='background-color:#FFF;float :right;height:633px;width:300px;
                margin-right:15px;margin-top:-700px;'>
                POSTERIORMENTE AQUI informações sobre as ideias 
               </div>-->
        </div>";
    }


?>

<?php

    $nome=$_GET['pagina']; /// voltar pro lugar certo
    
    echo "<a href='$nome' style='font-size:17px;background-color:orange'>Clique para voltar</a>";

?>
<br><br><br>
<a href='#topo' class='topo'>Voltar ao topo</a><br><br><br>

<?php include('./includes/rodape.php') ?>