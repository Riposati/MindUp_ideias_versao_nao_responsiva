<?php
        require('../classes/Caminho.class.php');

        $caminho = new Caminho();

        include($caminho->getCaminhoHeader());
        include($caminho->getCaminhoTopo());
        include($caminho->getCaminhoAbrirSessao());

        // TODO ao subir pro servidor arrumar envio de emails
?>
<?php

$captcha_message = "*Todos os campos são de preenchimento obrigatório.";
$style = "";
$envio = false;
$nome 				= "";
$email	 			= "";
$telefone           = "";
$assunto            = "";
$mensagem 			= "";

if (isset($_POST['btEnviar']))
{

    $nome 					= $_POST['nome'];
    $email 					= $_POST['email'];
    $telefone 				= $_POST['telefone'];
    $assunto				= $_POST['assunto'];
    $mensagem	 			= $_POST['mensagem'];

    if (isset($_POST['nome']))
    {

        //ENVIA E-MAIL
        $to = _EMAIL_RECEBE_MENSAGENS;

        $subject = "Contato - Site | "._NOME_EMPRESA;

        $message = "
		<html>
		<head>
		 <title>:: Contato - Site | "._NOME_EMPRESA." ::</title>
		</head>
		<body bgcolor='#FFFFFF'>
		<center><img src='"._CAMINHO_IMG."fale_conosco.png' border='0' alt='"._NOME_EMPRESA." | Contato - Site '></center>
		<br>
		<table width='500' border='0' align='center' cellpadding='5' cellspacing='5'>
			<tr>
				<td valign='top' colspan='2' align='justify'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><strong>Nome:</strong>
				".nl2br($nome)."
				</font></td>
			</tr>
			<tr>
				<td><p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><strong>E-mail:</strong></font></p></td>
				<td><font face='Verdana, Arial, Helvetica, sans-serif' size='2'>$email</font></td>
			</tr>
            <tr>
				<td><p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><strong>Assunto:</strong></font></p></td>
				<td><font face='Verdana, Arial, Helvetica, sans-serif' size='2'>$assunto</font></td>
			</tr>
			<tr>
				<td><p align='right'><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><strong>Mensagem:</strong></font></p></td>
				<td><font face='Verdana, Arial, Helvetica, sans-serif' size='2'>$mensagem</font></td>
			</tr>
		</table>
		<br>
		</body>
		</html>";

        if (strtoupper(substr(PHP_OS,0,3)=='WIN')) {
            $eol="\r\n";
        } elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) {
            $eol="\r";
        } else {
            $eol="\n";
        }

        $headers  = "MIME-Version: 1.1". $eol;
        $headers .= "Content-type: text/html; charset=iso-8859-1". $eol;
        $headers .= "From: Contato <"._EMAIL_ENVIA_MENSAGENS.">". $eol;
        $headers .= "Reply-To: $email". $eol;

        if(!mail($to, $subject, $message, $headers ,"-r"._EMAIL_ENVIA_MENSAGENS."")){ // Se for Postfix
            $headers .= "Return-Path: "._EMAIL_ENVIA_MENSAGENS."" . $eol; // Se "não for Postfix"
            mail($to, $subject, $message, $headers);

        }
        $envio = true;

        if($envio){
            echo "<script>alert('O Mind Up Ideias agradece o seu contato!');</script>";

        }else{
            echo "<script>alert('Opa houve um erro. Por favor tente novamente mais tarde.');</script>";
        }
        $captcha_message = "A "._NOME_EMPRESA." agradece o seu contato!";
        $nome 				= "";
        $email	 			= "";
        $telefone           = "";
        $assunto            = "";
        $mensagem 			= "";
    }
}
?>
    <div id="localizaoSite">
                <div id="localizaoReduzido">
                    <span class="fontDouradaTahoma">Você está em:</span><span class=""> &nbsp;Fale conosco</span>
                </div>
    </div>
    <br><br>
    <h2 class='fontTitulo20Preta'>Fale com nossa equipe, será um prazer ajuda-lo</h2>
    <br><br>
    <div class="corRodape corBordaContato">
        <fieldset>
            <img src="../imagens/enviar_email.png">
            <div class="contatoBoxDireito">
                <form id="formularioContato" action="contato.php" method="post"  onsubmit = "return validaFormContato();">
                    <label>

                        NOME<span class = "obrigatorio">*</span><br />
                        <input type = "text" name="nome" id ="nome" />
                    </label>
                    <label>

                        EMAIL<span class = "obrigatorio">*</span><br />
                        <input type = "text" name="email" id = "email" required="required" />
                    </label>
                    <label class = "diminuirTamanho">
                        TELEFONE<span class = "obrigatorio">*</span><br />
                        <input onkeypress = "mascara(this, mtel)" maxlength = "15" type = "text" name= "telefone" id = "telefone" />
                    </label>
                    <label>

                        ASSUNTO:<br />
                        <input class = "aumentarTamanhoInput" type = "text" name="assunto" id="assunto" />
                    </label>
                    <label>

                        MENSAGEM<span class = "obrigatorio">*</span><br />
                        <textarea type = "text" name="mensagem" id="mensagem"></textarea>
                    </label>
                    <input type="submit" name="btEnviar" value="ENVIAR" id="btEnviar" class="btEnviar" />
                </form>
                <br>

            </div>
            <div class = "clear"></div>
            </fieldset>
    </div>
    <div class = "clear"></div>
    <br>

    <a href='#topo' class='topo'>Voltar ao topo</a><br><br><br>
    
    <?php 
         include($caminho->getCaminhoRodape());
    ?>
