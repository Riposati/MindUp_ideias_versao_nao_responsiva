   <?php   
        require('../classes/Caminho.class.php');

        $caminho = new Caminho();

        include($caminho->getCaminhoHeader());
        include($caminho->getCaminhoTopo());
     ?>

    <script src="../js/jquery.js"></script>
    <script src="../js/jquery.maskedinput.js"></script>
    <script src="../js/valida_email_e_campos_cadastro.js"></script>

    <body>
        <div id="localizaoSite">
            <div id="localizaoReduzido">
                <span class="fontDouradaTahoma">Você está em:</span><span class=""> &nbsp;Cadastro</span>
            </div>
        </div>
        <div id='cadastro'>
            <br><h2 class='fontTitulo20Preta'>Cadastre-se no Mind Up e mude o mundo!</h2><br>
            <span><strong>Campos com <span style='color:red;'>*</span> são obrigatórios</span></strong><br><br>

        <fieldset>
            <table border='0' id='diferente'>
                <form enctype="multipart/form-data" id='formularioCadastro' method='POST' onsubmit="return validaCampos()" action='../controles/efetuaCadastro.php'>
                    <tr><td>Imagem:</td><td><input type="file" id="imagem" name="imagem" style='height:30px;'/></td></tr>
                    <tr><td>Nome Completo*:</td><td><input type='text' id='nome' name='nome' size='40' maxlength='50'/></td></tr>
                    <tr><td>Nascimento *:</td><td><input type='text' id='datanascimento' name='datanascimento'  size='40'/><br></td></tr>
                    <tr><td>Tefelone Celular *:</td><td><input type='text' id='celular' name='celular'  size='40'/></td></tr>
                    <tr><td>Telefone Fixo :</td><td><input type='text' id='telfixo' name='telfixo'  size='40'/></td></tr>
                    <tr><td>Email *:</td><td><input type='text' id='email' name='email'  size='40'/></td></tr>
                    <tr><td>Confirma Email *:</td><td><input type='text' id='confirmaemail' name='confirmaemail'  size='40'/></td></tr>
                    <tr><td>Senha *:</td><td><input type='password' id='senha' name='senha'  size='40' maxlength='50'/></td></tr>
                    <tr><td>Confirma Senha *:</td><td><input type='password' id='confirmasenha' name='confirmasenha' size='40' maxlength='50'/></td></tr>
                    <tr><td colspan="2"><input type='submit' id='botaocadastra' name='botaocadastra' value='Cadastrar'/></td></tr>
                </form>
            </table>
            <br>
        </fieldset>
    </div>
    <br><br><br>
    </body>

    <a href='#topo' class='topo'>Voltar ao topo</a><br><br><br>

    <?php 
         include($caminho->getCaminhoRodape());
     ?>