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

                $nome_dono_perfil = $_GET['nome_usuario'];

                $resultado = $conexao->query("select * from usuario where nome = '$nome_dono_perfil'");

                $nome = $resultado->fetch();

                $_SESSION['time'] = time();

               echo"<div class='div_logout'>
                        <br>
                        <a href='../view/painel.php' class='logado'>Painel de ideias</a>
                        <a href='../controles/logout.php' class='logado'>Sair</a><br><br>
                    </div>
                ";

            echo '
            <div id="localizaoSite">
                <div id="localizaoReduzido">
                    <span class="fontDouradaTahoma">Você está em:</span><span class=""> &nbsp;Perfil do Usuário</span>
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
                echo"<div id='areaPerfil'>";
                echo "<div class='conteudoInternas'>";
                echo "
                <br><br>
                <div id='informacoesUsuario_ver_perfil'>
                <img src='../fotosUsuarios/" . $nome[10] . "' id='previsualizar'>
                </div>
                </div>
                ";

                echo "
                <div id='quadro_ideias'>
                    <h2>Ideias cadastradas por esse usuário</h2>
                            <table border='1' id='tabela_mostra_perfil'>
                            <th>ID da ideia</th>
                            <th>Categoria da ideia</th>
                            <th>Frase da ideia</th>
                            <tr>
                 ";

                $resultado = $conexao->query("select idideia,categoria,fraseDaIdeia from ideiasusuarios where idusuario=$nome[0]");

                 while($ideias_inseridas_pelo_usuario = $resultado->fetch()){
                        echo "<td style='width:20px;'>" . $ideias_inseridas_pelo_usuario[0] . "</td>";
                        echo "<td style='width:20px;'>" . $ideias_inseridas_pelo_usuario[1] . "</td>";
                        echo "<td style='width:20px;'>" . $ideias_inseridas_pelo_usuario[2] . "</td></tr>";
                    }

                 echo"

                 </table><br><br>
                 </div>
                 <div id='quadro_ideias_dos_amigos'>

                    <h2>Ideias de amigos que gostei</h2>
                    <table border='1' id='tabela_mostra_perfil'>
                            <th>ID da Ideia</th>
                            <th>Categoria da ideia</th>
                            <th>Frase da ideia</th>
                            <th>Autor dessa ideia</th>
                            <tr>
                    ";

                $resultado3 = $conexao->query("select id_ideia from ideias_de_amigos where id_amigo=$nome[0]");

                $i=0;
                $recebe_valores = array();

                while($c = $resultado3->fetch()){
                    $recebe_valores[$i] = $c[0];
                    $i++;
                }

                for($i=0;$i<count($recebe_valores);$i++){

                    $recebe = $recebe_valores[$i];
                    $res = $conexao->query("select idideia,idusuario,fraseDaIdeia,idideia,categoria from ideiasusuarios where idideia = $recebe");
                    $mostra = $res->fetch();
                    $res2 = $conexao->query("select nome from usuario where id='$mostra[1]'");
                    $mostra2 = $res2->fetch();

                    echo "<tr><td style='width:20px;'>" . $mostra[0] . "</td>";
                    echo "<td style='width:20px;'>" . $mostra[4] . "</td>";
                    echo "<td style='width:20px;'>" . $mostra[2] . "</td>";
                    echo "<td style='width:20px;'>" . $mostra2[0] . "</td></tr>";
                }

                echo"
                </table><br><br>
                 </div>
                ";

             }
        }
        ?>
               
     <br> <br>
    </div>

    <br>
    <a href='#topo' class='topo'>Voltar ao topo</a><br><br><br>

    <?php 
         include($caminho->getCaminhoRodape());
     ?>