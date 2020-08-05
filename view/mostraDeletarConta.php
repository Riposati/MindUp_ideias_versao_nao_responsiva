	<?php include('../includes/header.php') ?>
	<?php include('../includes/topo.php') ?>	
	<?php include('../controles/abriusessao.php') ?>

	<script>
		function pergunta(){
			if (confirm('Tem certeza que deseja remover conta?')){
				document.deletarConta.submit();
			}
		} 
	</script>

	<?php 

	    if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)) { 
	        unset($_SESSION['email']); 
	        unset($_SESSION['senha']); 
	        header('refresh:0; url=login.php' );
	    } else{
	    	
		    	$conexao = Conexao::getInstance();

		    	$email = $_SESSION['email'];
		    	$resultado = $conexao->query("select id,nome,telefoneCelular from usuario where email = '$email'");
		    	$a = $resultado->fetch();

		    	$idUser = $a[0]; 
		    	$nome = $a[1];
		    	$celular = $a[2];
	?>

	<div id="localizaoSite">
		<div id="localizaoReduzido">
		    <span class="fontDouradaTahoma">Você está em:</span><span class=""> &nbsp;Remover conta Usuário</span>
		</div>
	</div>
	<br><br>

	<?php
		echo "
			<div class='corpoTelas'>
					<h2>É uma pena você ter que nos deixar , diga por favor porque sair do Mind Up Ideias</h2><br><br>
					<form id='deletarConta' name='deletarConta' action='../controles/deletarConta.php' method='POST'>
						<textarea id='relato' name='relato' class='textAreas'></textarea><br>
						<input type='hidden'  id='idusuario' name='idusuario' value='$idUser'/>
						<input type='hidden'  id='nome' name='nome' value='$nome'/>
						<input type='hidden'  id='celular' name='celular' value='$celular'/>
						<input type='button' value='Deletar Conta' style='width:130px;height:30px;margin:10px;' 
						onclick='pergunta()'/>
					</form>
				<br><br><a href='#topo' class='topo'></div>Voltar ao topo</a><br><br><br>
		";

		}
 	?>

	<?php include('../includes/rodape.php') ?>