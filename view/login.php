    <?php   
        require('../classes/Caminho.class.php');

        $caminho = new Caminho();

        include($caminho->getCaminhoHeader());
        include($caminho->getCaminhoTopo());

        /* TODO ESQUECEU SUA SENHA ? 
         E ENVIAR UM EMAIL PRO O 
         USUÁRIO REDEFINIR SUA SENHA
        */
     ?>

    <div id="localizaoSite">
        <div id="localizaoReduzido">
            <span class="fontDouradaTahoma">Você está em:</span><span class=""> &nbsp;Login</span>
        </div>
    </div>

    <div class="conteudoLogin">
        <div class="tituloMaior">
            <h2 class="fontTitulo20Preta">Identifique-se</h2>
            <span>Para poder acessar o conteúdo interno de nosso site, é necessário ter um cadastro.</span>
        </div>
        <div class="areaLogin">
            <h2 class="fontTitulo20Preta marginTopTitulo">Você ainda não cadastrou?</h2>
            <div class="bordaRedonda btTotal ajusteMarginTopBtTotal"><a href="cadastro.php" rel="login">Cadastrar</a></div>
        </div>
        <div class="areaLogin floatRight">
            <h2 class="fontTitulo20Preta marginTopTitulo">Já Cadastrou?</h2>
            <span>Identifique-se</span>
            <form method="post" action="../controles/ope.php" id="formlogin" name="formlogin" > 
                <div class="areaInput">
                    <span class="fontTahomaRegularCinza14">Email: </span>
                    <input type="text" name="login" id="identificacaoEmail" />
                </div>
                <div class='areaInput'>
                    <div class="fontTahomaRegularCinza14"><span style="right: 7px;">Senha: </span>
                        <input style='width:215px;margin-left: 5px;' type="password" name="senha" id="indentificacaoSenha" />
                        <button class="bordaRedonda" type="submit">OK</button> 
                    </div>
            </form>
        </div>  

    </div>

    </div>
    <br clear="all"/>

    <?php 
         include($caminho->getCaminhoRodape());
     ?>