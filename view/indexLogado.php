<?php include('./includes/header.php') ?>
<?php include('./includes/topo.php') ?>
<?php include('abriusessao.php') ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>
<script src="js/MetroJs.js"></script>
<link href="css/MetroJs.css" rel="stylesheet" type="text/css">

<!-- Autor : Gustavo Riposati & João Paulo -->
<?php
if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)) { 
        unset($_SESSION['email']); 
        unset($_SESSION['senha']); 
        header('refresh:0; url=login.php' );
    } /// Se a sessão não estiver aberta , volta para o login , desnecessário no caso do mindUp
    
?>

<div id="localizaoSite">
    <div id="localizaoReduzido">
        <span id='topo' class="fontDouradaTahoma">Você está em:</span><span class=""> &nbsp;Home</span>
    </div>
</div>
<br><br><br> <!-- GUSTAVO - coloquei espaços aqui pra melhorar a visualização  -->
<!-- COMEÇO DO METRO -->
<h1 class="headerEspecial">Aqui sua ideia é levada a sério.</h1>
<br><br>
<h2 class="headerEspecial">Veja algumas das ideias inovadoras já criadas</h2> <!-- GUSTAVO - A frase que falei pra por, pra indicar pra que é o metro    -->
<br>
<div class="pagina">
    <div id="tiles" class="blue" style='margin-bottom:300px;margin-left:200px'> 
    
     <div class="live-tile" data-stops="100%" data-speed="750" data-delay="3000"> <span class="tile-title">slide tile (figure 2a)</span>
            <div><img src="imagens/GoogleGlass.jpg" alt="1" /></div>
            <div><img src="imagens/logo_empresa.png" alt="2" /></div>
        </div>

    <!-- Red Flip Tile that flips every 4 seconds -->
        <div class="red live-tile" data-mode="flip" data-delay="4000">
            <div> <img src="imagens/logo1.png" alt="3" /> <a class="tile-title" href='#'>Conteúdo Mind aqui</a> </div>
            <div> <img src="imagens/logo_empresa.png" alt="4" /> <a class="tile-title" href='#' >Conteúdo Mind aqui 2</a> </div>
        </div>


    <!-- Sliding Tile that shows 100% of the back tile every 3 seconds -->
        <div class="live-tile" data-stops="100%" data-speed="750" data-delay="3000"> <span class="tile-title">slide tile (figure 2a)</span>
            <div><img src="imagens/logo_empresa.png" alt="1" /></div>
            <div><img src="imagens/logo_empresa.png" alt="2" /></div>
        </div>

    <!-- Red Flip Tile that flips every 4 seconds -->
        <div class="red live-tile" data-mode="flip" data-delay="4000">
            <div> <img src="imagens/logo1.png" alt="3" /> <a class="tile-title" href='#'>Conteúdo Mind aqui</a> </div>
            <div> <img src="imagens/logo_empresa.png" alt="4" /> <a class="tile-title" href='#' >Conteúdo Mind aqui 2</a> </div>
        </div>

         <div class="live-tile" data-stops="100%" data-speed="750" data-delay="3000"> <span class="tile-title">slide tile (figure 2a)</span>
            <div><img src="imagens/logo_empresa.png" alt="1" /></div>
            <div><img src="imagens/logo_empresa.png" alt="2" /></div>
        </div>

    <!-- Red Flip Tile that flips every 4 seconds -->
        <div class="red live-tile" data-mode="flip" data-delay="4000">
            <div> <img src="imagens/logo1.png" alt="3" /> <a class="tile-title" href='#'>Conteúdo Mind aqui</a> </div>
            <div> <img src="imagens/logo_empresa.png" alt="4" /> <a class="tile-title" href='#' >Conteúdo Mind aqui 2</a> </div>
        </div>

         <div class="live-tile" data-stops="100%" data-speed="750" data-delay="3000"> <span class="tile-title">slide tile (figure 2a)</span>
            <div><img src="imagens/logo_empresa.png" alt="1" /></div>
            <div><img src="imagens/logo_empresa.png" alt="2" /></div>
        </div>

    <!-- Red Flip Tile that flips every 4 seconds -->
        <div class="red live-tile" data-mode="flip" data-delay="4000">
            <div> <img src="imagens/logo1.png" alt="3" /> <a class="tile-title" href='#'>Conteúdo Mind aqui</a> </div>
            <div> <img src="imagens/logo_empresa.png" alt="4" /> <a class="tile-title" href='#' >Conteúdo Mind aqui 2</a> </div>
        </div>

         <div class="live-tile" data-stops="100%" data-speed="750" data-delay="3000"> <span class="tile-title">slide tile (figure 2a)</span>
            <div><img src="imagens/logo_empresa.png" alt="1" /></div>
            <div><img src="imagens/logo_empresa.png" alt="2" /></div>
        </div>

    <!-- Red Flip Tile that flips every 4 seconds -->
        <div class="red live-tile" data-mode="flip" data-delay="4000">
            <div> <img src="imagens/logo1.png" alt="3" /> <a class="tile-title" href='#'>Conteúdo Mind aqui</a> </div>
            <div> <img src="imagens/logo_empresa.png" alt="4" /> <a class="tile-title" href='#' >Conteúdo Mind aqui 2</a> </div>
        </div>

         <div class="live-tile" data-stops="100%" data-speed="750" data-delay="3000"> <span class="tile-title">slide tile (figure 2a)</span>
            <div><img src="imagens/logo_empresa.png" alt="1" /></div>
            <div><img src="imagens/logo_empresa.png" alt="2" /></div>
        </div>

    <!-- Red Flip Tile that flips every 4 seconds -->
        <div class="red live-tile" data-mode="flip" data-delay="4000">
            <div> <img src="imagens/logo1.png" alt="3" /> <a class="tile-title" href='#'>Conteúdo Mind aqui</a> </div>
            <div> <img src="imagens/logo_empresa.png" alt="4" /> <a class="tile-title" href='#' >Conteúdo Mind aqui 2</a> </div>
        </div>


</div>
<br><br><br>  <!-- GUSTAVO - coloquei espaços aqui pra melhorar a visualização  -->
<a href='#topo' class='topo'>Voltar ao topo</a><br><br><br>


<!-- Activate live tiles --> 
<script type="text/javascript">
    $(".live-tile, .flip-list").not(".exclude").liveTile();
</script>
<?php include('./includes/rodape.php') ?>