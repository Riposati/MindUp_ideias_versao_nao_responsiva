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
				<form action='../controles/divulgar_ideia_amigo.php' onsubmit='return valida();' method='POST'>

				<table border='0' style='text-align:justify'>
				<th colspan='2'>Informe o Id da ideia do seu amigo</th>
				<tr><td><input type='text' id='id' name='id' ></td></tr>

				<th colspan='2'>Informe o nome do seu amigo</th>
				<tr><td><input type='text' id='nome_amigo' name='nome_amigo' ></td></tr>

				<tr><td><input type='hidden' id='idusuario' name='idusuario' value='$a[0]'></td></tr>
				<tr><td>
					<input type='submit' value='Divulgar'>
				</td></tr>
				</table>
				</form>
			";

		}	

	?>
