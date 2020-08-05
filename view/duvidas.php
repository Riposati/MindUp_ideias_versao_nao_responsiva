    <?php   
          require('../classes/Caminho.class.php');
          $caminho = new Caminho();
          include($caminho->getCaminhoHeader());
          include($caminho->getCaminhoTopo());
          include($caminho->getCaminhoAbrirSessao());
       ?>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>

    <script>
      $(function() {
        $( "#accordion" ).accordion({
          collapsible: true
        });
      });
    </script>

    <div id="localizaoSite">
        <div id="localizaoReduzido">
            <span class="fontDouradaTahoma">Você está em:</span><span class="">Dúvidas</span>
        </div>
    </div>

    <br>
    <h2>Clique sobre a dúvida para ver a resposta</h2><br>
    <div class="conteudoDuvidas">
        <div class="tituloMaior">
            <h2 class="fontTitulo20Preta">Dúvidas?</h2>
            <span>PERGUNTAS / RESPOSTAS</span>
            
            <div id="accordion">

           <h3>Como usar o Mind Up Ideias?</h3>
          <div>

            <p>
               Você ao acessar a primeira vez o Mind Up verá na página inicial algumas ideias
               já desenvolvidas por empresas ou que já foram cadastradas no sistema. Terá as opções de logar-se, de 
               cadastrar-se, ou ver algumas ideias já cadastradas por outros usuários. Após se cadastrar
               você verá opções exclusivas que possibilitarão cadastrar ideias e buscar por investidores,interessados,sócios,etc.
               Logo apos, você, poderá demonstrar interesse na ideia de outro usuário e será iniciada
               a negociação entre autor e interessado.
            </p>
             
          </div>

          <h3>Como investir/demostrar interesse em alguma ideia ?</h3>
          <div>
            <p>
               Primeiro, você deve possuir uma conta em nosso sistema, depois estar logado, feito isso vá até seu painel de ideias
               e clique/toque na opção investir em alguma ideia, feito isso você informa qual ID do projeto que lhe interessa, só isso, 
               viu como é fácil?
            </p>
          </div>

          <h3>Sobre o que se trata o sistema  ?</h3>
          <div>
            <p>
               Um projeto que foi concebido apartir do estudante de analise de sistemas Gustavo que conta com a ajuda de seu sócio João Paulo, que são apaixonados por desenvolvimento de software e por coisas inovadoras que em um dia qualquer tiveram vontade de criar um sistema para que usuários cadastrassem suas ideias e as divulgasse para buscar interessados, investidores, sócios, etc.
            </p>
          </div>
          <h3>Minha Ideia estará segura ?</h3>
          <div>
            <p>
                Sim. Sua ideia estará segura desde que ela seja patenteada, registrada, o Mind Up Ideias não se responsabiliza por roubos de ideias entre usuários,
                por esse motivo ao cadastrar suas ideias existe uma opção lembrando você que é mais seguro cadastrar projetos com patente, porém você pode cadastrar também projetos sem patente, caso concorde com isso.
            </p>
          </div>
          <h3>É preciso pagar ?</h3>
          <div id="div_fim_duvidas_pagina_duvidas">
            <p>
              Para usar o sistema não, porém, para cadastrar ideias e elas serem mostradas no sistema para outros usuários sim, você irá cadastrar
              quanto está pedindo na sua ideia e o será preciso pagar 5 % desse valor para nos do Mind. 
            </p>
          </div>
        </div>
            </div>
        </div>


        <br><br><br><br><br><br><br>

         <a href='#topo' class='topo'>Voltar ao topo</a><br><br><br>

        <?php 
           include($caminho->getCaminhoRodape());
        ?>