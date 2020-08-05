	<script src="../js/scriptValidaInsercaoIdeias.js"></script>
	<?php
		  session_start();
		  if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)) { 
	        unset($_SESSION['email']); 
	        unset($_SESSION['senha']); 
	        header('refresh:0; url=../view/login.php' );  
	       
	    } else{

	    	require_once('../modelo/conexao.php');
		  	$conexao = Conexao::getInstance();

	    	$email = $_SESSION['email'];
	    	$res = $conexao->query("select id,nome from usuario where email = '$email'");

	    	$a = $res->fetch();

			echo "
				<img src='../imagens/logo_empresa.png'><br><br>	
				<form action='../controles/cadastraInteresse.php' onsubmit='return valida();' method='POST'>

				<table style='text-align:justify'>
				<th colspan='2'>Informe o Id da ideia que você está interessado</th>
				<tr><td><input type='text' id='id' name='id' ></td></tr>
				<tr><td><input type='hidden' id='idusuario' name='idusuario' value='$a[0]'></td></tr>
				<tr><td><input type='hidden' id='nomeusuario' name='nomeusuario' value='$a[1]'></td></tr>
				<tr><td>
					<input type='submit' value='Investir na Ideia'>
				</td></tr>
				</table>
				</form>
			";

		}	

	?>
