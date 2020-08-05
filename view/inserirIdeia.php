    <link rel="stylesheet" href="../css/site.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script src="../js/jquery.js" type="text/javascript"></script>
    <script src="../js/jquery.maskedinput.js" type="text/javascript"></script>
    <script src="../js/validarInserirIdeia.js"></script>
    <script src="../js/jquery.maskMoney.js" type="text/javascript"></script>

    <script>
            function SomenteNumero(e){
                var tecla=(window.event)?event.keyCode:e.which;   
                if((tecla>47 && tecla<58)) return true;
                else{
                    if (tecla==8 || tecla==0) return true;
                else  return false;
                }
            }
    </script>

    <?php   
        require('../classes/Caminho.class.php');
        
        $caminho = new Caminho();

        include($caminho->getCaminhoTopo());
        include($caminho->getCaminhoConexao());
        include($caminho->getCaminhoParametros());
        include($caminho->getCaminhoAbrirSessao());

        $conexao = Conexao::getInstance();
     ?>

    <?php 
        if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)) { 
            unset($_SESSION['email']); 
            unset($_SESSION['senha']); 
            echo $caminho->getCaminhoFimSessao();
        } else{
        	$email = $_SESSION['email'];
        	$resultado = $conexao->query("select id from usuario where email = '$email'");
        	$a = $resultado->fetch();
        	$id = $a[0];
        }
    ?>

    <div id="localizaoSite">
        <div id="localizaoReduzido">
            <span class="fontDouradaTahoma">Você está em:</span><span class=""> &nbsp;Inserir nova ideia</span>
        </div>
    </div>

    <br>
    <div id='cadastraideia'>
    	<h1 class='headerEspecial'>Inserção de uma nova ideia</h1><br><br>
    	<span><strong>Campos com <span style='color:red;'>*</span> são obrigatórios</span></strong><br><br><br>

        <div id='div_lembrete_pagamento'><h2>Lembre-se de sempre pagar suas ideias querido usuário para elas serem exibidas</h2></div>

    	<form id='formularioinsere' method='POST' action='../controles/crudinserirideia.php' onsubmit='return validar()' enctype="multipart/form-data">

    		<table border='0' style='text-align:justify'>

                <th colspan='2'>Quanto estou pedindo nesta ideia * - <span id='lembrete_pagamento'>Cada ideia inserida tem um custo de R$30,00 ( trinta reais )</span></th>
                <tr><td><input type='text' size='70' maxlength="40" id='real' name='real' onkeypress='return SomenteNumero(event)' placeholder="somente números"></td></tr>

    			<th colspan='2'>Ideia*</th>
    			<tr><td colspan='2' ><textarea id='ideia' name='ideia' maxlength="5000" placeholder='Do que se trata a ideia detalhe bem aqui'></textarea></td></tr>

                <th colspan='2'>Frase da Ideia*</th>
                <tr><td colspan='2'><input type='text' id='frase' name='frase' size='70' maxlength="100"  placeholder='Frase será mostrada para todos , chame a atenção pra sua ideia aqui'> * será mostrada para o usuário clicar</td></tr>

    			<th colspan='2'>Categoria*</th>
                <tr><td>
                    <select id='categoriaSelect' name='categoriaSelect'>
                        <option value='vazio'></option>
                        <option value='ciências'>Ciências</option>
                        <option value='computação'>Computação</option>
                        <option value='indústria'>Indústria</option>
                        <option value='saúde'>Saúde</option>
                        <option value='educação'>Educação</option>
                        <option value='outros'>Outros</option>
                    </select>
                </td></tr>

                <th colspan='2'>Ideia patentiada no Inpi ( Instituto Nacional da Propriedade Intelectual )*</th>
                <tr><td style='background-color:#00A859;color:#FFF;'><input type="radio" name="registroinpi" value="Sim" checked> Minha ideia é patenteada</tr>
                <tr><td style='background-color:#00A859;color:#FFF'><input type="radio" name="registroinpi" value="Não"> Minha ideia não é patenteada</td></tr>

                <tr><td><div class='recebeImagens'>

                    <h2 class='headerEspecial3'>Cadastre imagens para sua alavancar sua ideia</h2><br><br>

                    Imagem 1: <input type="file" id="imagem" name="imagem"/><br><br>

                    Imagem 2: <input type="file" id="imagem2" name="imagem2"/><br><br>

                    Imagem 3 : <input type="file" id="imagem3" name="imagem3"/><br><br>

                    Imagem 4: <input type="file" id="imagem4" name="imagem4"/><br><br>

            </div>
        </tr></td>
    			<?php echo"<input type='hidden' id='id' name='id' value='$id' />" ;?>
    		</table>	
            <input style='width:120px;height:50px' type='submit' value='Criar Ideia'>
    	</form>

        

    </div>
    <a href='#topo' class='topo'>Voltar ao topo</a><br><br><br>

    <?php 
         include($caminho->getCaminhoRodape());
     ?>