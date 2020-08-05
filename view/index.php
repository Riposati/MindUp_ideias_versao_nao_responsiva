
    <?php   
        require('../classes/Caminho.class.php');

        $caminho = new Caminho();

        include($caminho->getCaminhoHeader());
        include($caminho->getCaminhoTopo());
        include($caminho->getCaminhoAbrirSessao());
     ?>

    <script src="../js/jquery.js" type="text/javascript"></script>
    <script src="../js/MetroJs.js"></script>
    <link rel="stylesheet" href="../css/metrojs.css" />

    <div id="localizaoSite">
        <div id="localizaoReduzido">
            <span class="fontDouradaTahoma">Você está em:</span>
            <span>Início</span>
        </div>
    </div>
    <br>
    <h1>Bem vindo ao Mind Up Ideias</h1>
    <br>
        <img id='imagem_tutorial' src='../imagens/tutorial_cor_verde.png'>
        <br><br>
    <hr><br>
    <br>
    <h2 class="headerEspecial">Veja algumas ideias inovadoras</h2>
    <br>
    <div class="pagina">
       
        <div class="container">

            <div class="linha">
                <div class="tile amarelo">
                    <a href='saude.php'><img src="../imagens/saude.png" alt="flag" /><h3 title='Clique para mais'>Saúde</h3></a>
                </div>
                
                <div class="tileEsp">
                     <div class="tiles blue tile-group four-wide">
                         <div class="live-tile" data-speed="750" data-delay="3000" style='margin-top:-20px;margin-bottom:-30px'>
                            <div><img class="full" src="../imagens/groupon.png" alt="1" /></div>
                            <div><h3 class='h3especial2'>Groupon</h3></div>
                        </div>
                    </div>
                </div>

                <div class="tileLargo laranja">
                    <a href='#'><h3 class='h3especial'>Intel Edison</h3></a>
                </div>

                 <div class="tile azul">
                   <a href='#'> <h3 class='h3especial'>Pizzas Dídio</h3></a>
                    
                </div>

                 <div class="tileEsp">
                   <div class="tiles blue tile-group four-wide" style='width:200px'>
                         <div class="live-tile" data-speed="750" data-delay="3000" style='margin-top:-20px;margin-bottom:-30px'>
                            <div><img class="full" src="../imagens/tree2mydoor.jpg" alt="1" /></div>
                            <div><h3 class='h3especial2'>Tree to my Door</h3></div>
                        </div>
                    </div>

                </div>

                <div class="tileLargo amarelo">
                        <h3 class='h3especial'>Pulseira que vira câmera</h3>
                 </div>
            </div> 


            <div class="linha"> 
                <div class="tile azul">
                        <h3 title='Clique aqui para conhecer a ideia' class='h3especial'>Google Glass</h3>
                </div>
                 <div class="tileLargo amarelo">
                     
                       <h3 class='h3especial'>Escorredor de louças retrátil</h3>
                </div>
                <div class="tile verde">
                    <div><a href='computacao.php'><img src="../imagens/pc.png" alt="flag" /><h3 title='Clique para mais'>Computação</h3></div>
                </div>

                <div class="tile laranja">
                   <a href='#'><h3 class='h3especial'>Smart Watch</h3></a>
                    
                </div>

                 <div class="tile verde">
                    <a href='ciencias.php'><img src="../imagens/ciencia.png" alt="flag" /><h3 title='Clique para mais'>Ciências</h3></a>
                </div>

                <div class= "tileLargo azul">
                    <h3 class='h3especial'>GuiMU</h3>                        
                </div>
            </div> 

            <div class="linha"> 
                 <div class="tileLargo laranja">
                    <a href='outros.php'><img src="../imagens/outros.png" alt="flag" /><h3 title='Clique para mais'>Outros tipos de ideias</h3></a>
                </div>

                 <div class="tile amarelo">
                       <h3 class='h3especial'>Ranking políticos</h3>
                </div>

                <div class="tileEsp">
                     <div class="red live-tile" data-mode="flip" data-delay="4000" style='height:100px;margin-top:0px;margin-bottom:-30px'>           
                        <div><img class="full" src="../imagens/timokids.gif" alt="1" /></div>
                            <div><h3  class='h3especial'>TimoKids</h3></a></div>
                    </div>
                </div>

                <div class="tile azul">
                    <a href='educacao.php'><img src="../imagens/educacao.png" alt="flag" /><h3 title='Clique para mais'>Educação</h3></a>
                </div>

                <div class= "tileLargo verde">
                   <h3 class='h3especial' title='clique para mais'>Google Wallet</h3>

                </div>
                <div class="tile azul">
                    <a href='industria.php'><img src="../imagens/industria.png" alt="flag" /><h3 title='Clique para mais'>Indústria</h3>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">/// efeitos javascript no menu metro
        $(".live-tile, .flip-list").not(".exclude").liveTile();
    </script>

    <br><br>

     <?php 
         include($caminho->getCaminhoRodape());
     ?>