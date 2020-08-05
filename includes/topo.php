<link href="../imagens/logo_empresa.ico" rel="icon" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>
    <div id="loginTudo">
        <div class="areaLoginTotal">
            <div class="areaLoginInterno">
                <div id="fechar"><h1>X</h1></div>
                <div class="logoEmpresa"></div>
                <div id="formularioInterno">
                </div>
            </div>
        </div>
    </div>
    <header>
        <?php
        session_start();
        if ((!isset($_SESSION['email']) == true) and ( !isset($_SESSION['senha']) == true)) { /// não tá logado mostra aqui 
     
            echo '
                        <div id="topoReduzido">
                        <a rel="home" href="index.php" id="logoSite"></a>
                        <nav id="topoNavMenu">

                            <ul id="topo">
                                <li><a class="bt_menu_opcoes" href="index.php">Início</a></li>
                                <li><a class="bt_menu_opcoes" href="duvidas.php">Dúvidas</a></li>
                                <li><a class="bt_menu_opcoes" href="contato.php">Fale Conosco</a></li>
                                <li><a class="bt_menu_opcoes" href="sobre.php" >Sobre</a></li>
                                <li><a class="bt_login" href="cadastro.php">Cadastrar</a></li>
                                <li><a class="bt_login" id="login" href="login.php">Login</a></li>
                            </ul>
                        </nav>
                          <nav id="topoMenuInferior">
                            <ul>
                            

                        '
            ;

        } else { /// está logado entra aqui
            echo '
                        <div id="topoReduzido">
                        <a rel="home"  href="index.php" id="logoSite"></a>
                        <nav id="topoNavMenu">
                            <ul id="topo">
                                <li><a class="bt_menu_opcoes" href="index.php" >Início</a></li>
                                <li><a class="bt_menu_opcoes" href="duvidas.php">Dúvidas</a></li>
                                <li><a class="bt_menu_opcoes" href="contato.php">Fale Conosco</a></li>
                                <li><a class="bt_menu_opcoes" href="sobre.php" >Sobre</a></li>
                            </ul>
                        </nav>
                          <nav id="topoMenuInferior">
                            <ul>    
                        '
            ;
        }
        ?>
            <li><a href="ciencias.php" class="fontMediumVerde18">Ciências</a></li>
            <li><a href="computacao.php" class="fontMediumVerde18">Computação</a></li>
            <li><a href="industria.php" class="fontMediumVerde18">Indústria</a></li>
            <li><a href="saude.php" class="fontMediumVerde18">Saúde</a></li>
            <li><a href="educacao.php" class="fontMediumVerde18">Educação</a></li>
            <li><a href="outros.php" class="fontMediumVerde18">Outros</a></li>
    </ul>
</nav>

</div>
</header>
