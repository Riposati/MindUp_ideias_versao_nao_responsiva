	<html>
	<body style='background-color:#c3c3c3'>

	 <?php
	 session_start(); 
	  if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)) { 
	        unset($_SESSION['email']); 
	        unset($_SESSION['senha']); 
	        header('refresh:0; url=login.php' ); /// aqui o que acontece é que se a sessão não estiver 
	        ///validade volta pro login, até o usuário realizar o login corretamente
	    } else{
	    		require_once("../modelo/conexao.php");
	    		$conexao = Conexao::getInstance();

	    		$email = $_SESSION['email'];
	    		$resultado = $conexao->query("select id from usuario where email = '$email'");
		    	$a = $resultado->fetch();/// no $a[0] tenho o ID que preciso pra inserir a ideia
		    	$idUser = $a[0]; /// agora está nessa variável o id do usuário que abriu a sessão

				echo"
				
				<div style='text-align:center;margin-top:300px'>

				<form enctype='multipart/form-data' id='formularioCadastro' method='POST' action='../controles/atualizarFoto.php'>
						<input type='file' id='imagem' name='imagem' style='height:30px;'/><br>
						<input type='hidden' id='id' name='id' value='$idUser' /><br>
						";

				?>
				Caso você não selecionar nenhum arquivo sua nova imagem não será carregada!<br><br>
				<input type='submit' value='Clique para atualizar a foto'>
				</form> 
					<a href='painel.php' style='color:green;'>Clique aqui para retornar ao painel</a>
				</div>
			<?php
			};
	?>

	</body>
	</html>