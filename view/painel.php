    <?php   
        require('../classes/Caminho.class.php');

        $caminho = new Caminho();
        include($caminho->getCaminhoHeader());
        include($caminho->getCaminhoTopo());
        $conexao = Conexao::getInstance();
     ?>

    <?php

        if ((!isset($_SESSION['email']) == true) and ( !isset($_SESSION['senha']) == true)) {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
           
            echo '<meta http-equiv="refresh" content="0;URL=../view/login.php" />';
        } else {

                $logado = $_SESSION['email'];

                $resultado = $conexao->query("select * from usuario where email = '$logado'");

                $nome = $resultado->fetch();

                $_SESSION['time'] = time();

               echo"<div class='div_logout'>
                        <br>
                        <a href='../controles/logout.php' class='logado'>Sair</a><br><br>
                    </div>
                ";

            echo '
            <div id="localizaoSite">
                <div id="localizaoReduzido">
                    <span class="fontDouradaTahoma">Você está em:</span><span class=""> &nbsp;Painel de ideias</span>
                </div>
            </div>
            ';

            /*  Isso vai para o controlador para tirar a lógica da visão   */
                $v = $nome[1];
                $cont = 0;
                $prim = '';

                while ($cont < strlen($v) && $v{$cont} != ' ') { /// pra pegar so o primeiro nome do User
                    $prim{$cont} = $v{$cont};
                    $cont++;
                }

            $stringArrayF = "";

            foreach ($prim as $stringArray) {
                    $stringArrayF = $stringArrayF . $stringArray;
                }

            if (isset($nome)) { /// Se o usuário abriu a sessão 
                echo"<div id='areaPainelTotal'>";
                echo "<div class='conteudoInternas'>";
                echo "<br><h1 id='frase_bem_do_painel'>Bem vindo ao seu Painel de ideias</h1><br><br>";

                echo "
                <div id='informacoesUsuario'>
                <a id='imagem' name='imagem' href='editarImagem.php'><img src='../fotosUsuarios/" . $nome[10] . "' id='previsualizar' title='clique para atualizar'></a>
                    <div class='infoPainel'>
                                <strong>Usuário :</strong> $stringArrayF<br><br> <!-- Só o primeiro nome do User -->
                                <strong>Telefone celular :</strong> $nome[3] <br><br>
                                <strong>Telefone Fixo : </strong>$nome[4] <br><br>
                                <strong>Email : </strong>$nome[5] <br><br>
                    
                           </div>
                            <div id='sugestoes'>
                    <div id='box-newsletter'>
                        <a href='enviaSugestao.php' class='fancybox fancybox.iframe'><h3 style='font-size:13px'>Não encontrou o que buscava? Sugira-nos</h3></a>
                        <script>parent.$.fancybox.close();</script>
                    </div>
                </div>
            </div>

                ";

             }

        }

        ?>
                <div class='jimgMenu'>
                  <ul>  
                    <li class='landscapes'><a href='inserirIdeia.php'>Inserir nova Ideia</a></li>
                    <li class='people'><a href='mostrarideiainseridas.php'>Mostrar Minhas ideias</a></li>
                    <li class='nature'><a href='mostraideiasparaatualizar.php'>Atualizar minhas Ideias</a></li>
                    <li class='abstract'><a href='mostraDeletarIdeia.php'>Deletar alguma ideia</a></li>
                    <div id='box-newsletter'>
                    <li class='urban'><a href='../view/investirIdeia.php' class='fancybox fancybox.iframe'>
                    <script>parent.$.fancybox.close();</script>
                   </a></li>
                    <li class='divulgue_ideias_amigos'><a href='divulgar_ideia_amigo.php' class='fancybox fancybox.iframe'></a></li>
                    <script>parent.$.fancybox.close();</script>
                  </ul>
                </div>

                <div class='jimgMenu2'>
                  <ul>
                    <li class='landscapes'><a href='editarPerfil.php'></a></li>
                    <li class='people'><a href='mostraDeletarConta.php'></a></li>
                    <li class='nature'><a href='MostrarUsuarioscadastrados.php'></a></li>
                    <li class='abstract'><a href='MostrarIdeiasQueMeInteressam.php'></a></li>
                    <li class='urban'><a href='MostrarIdeiasComInteressados.php'></a></li>
                    <li class='duvidas_registro_ideias'><a href='registro_ideias.php'></a></li>
                    <li class='pagar_ideias'><a href='pagarideias.php'></a></li>
                  </ul>
                </div>
                <br></div>

    <br>
    <a href='#topo' class='topo'>Voltar ao topo</a><br><br><br>

    <?php 
         include($caminho->getCaminhoRodape());
     ?>