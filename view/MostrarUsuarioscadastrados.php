<?php include('../includes/header.php') ?>
<?php include('../includes/topo.php') ?>	
<?php include('../controles/abriusessao.php') ?>
<?php require('../modelo/ClienteDAO.class.php') ?>

<?php 
    if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)) { 
       
        unset($_SESSION['email']); 
        unset($_SESSION['senha']); 
       	echo '<meta http-equiv="refresh" content="0;URL=login.php" />'; 
    } else{
		
    	$email = $_SESSION['email'];
    	
    	$clienteDAO = new ClienteDAO(); // objeto que manipula a query necessária

		?>

		<div id="localizaoSite">
	        <div id="localizaoReduzido">
	            <span class="fontDouradaTahoma">Você está em:</span><span class=""> &nbsp;Mostrar Usuários cadastrados</span>
	        </div>
		</div>
		<br><br>

		<h2>Clique sobre o nome do usuário para ver o perfil dele</h2><br>

		<div class='corpoTelas'> 
		<table border='1' style='text-align:CENTER;padding:10px;'>
		<th>Usuários cadastrados</th>

		<?php

			$resultado = $clienteDAO->mostrarTodosUsuarios();

			while($a = $resultado->fetch()){

				echo "<tr><td><a id='link_que_mostra_usuarios_cadastrados' href='perfil_usuario.php?nome_usuario=$a[1]'>" . $a[1] . "</a></td></tr>";
			}
	    }
	?>

	</table><br><br><a href='#topo' class='topo'></div>Voltar ao topo</a><br><br><br>

<?php include('../includes/rodape.php') ?>