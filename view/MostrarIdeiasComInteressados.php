	<?php include('../includes/header.php') ?>
	<?php include('../includes/topo.php') ?>	
	<?php include('../controles/abriusessao.php') ?>

	<div id="localizaoSite">
		<div id="localizaoReduzido">
		    <span class="fontDouradaTahoma">Você está em:</span><span class=""> &nbsp;Ideias com interessados</span>
		</div>
		</div>
	<br><br>

	<h2>Clique sobre o <span class='fraseDaIdeiaSpan'>nome do usuário interessado</span> para negociar as ideias</h2><br><br>

	<?php 

	    if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)) { 
	        unset($_SESSION['email']); 
	        unset($_SESSION['senha']);
	        echo '<meta http-equiv="refresh" content="0;URL=../view/login.php" />';
	    } else{

	    	$conexao = Conexao::getInstance();

	    	$email = $_SESSION['email'];
	    	$resultado = $conexao->query("select id,nome from usuario where email = '$email'");

	    	$a = $resultado->fetch();/// no $a[0] tenho o ID que preciso pra inserir a ideia
	    	$idUser = $a[0]; /// agora está nessa variável o id do usuário que abriu a sessão
	    	$nome = $a[1];

			$resultado = $conexao->query("select * from usuariosinteressados where nomeusuarioautordaideia='$nome'");

			echo"
			<div class='corpoTelas'> 
			<table border='1' style='text-align:center;padding:10px;'>
			<th>ID da idea</th>
			<th>Frase da idea</th>
			<th>Usuário interessado na ideia</th>
			";

			while($a = $resultado->fetch()){
				echo "<tr><td>". $a[1] . "</td>";
				echo "<td>" . $a[3] . "</td>";
				echo "<td><a class='negociacao_ideias' href='negociacao_ideias.php?id_ideia=$a[1]&usuario_interessado=$a[5]'>" . $a[5] . "</a></td>";
			}

			echo "</table><br><br><a href='#topo' class='topo'></div>Voltar ao topo</a><br><br><br>";
	    }
	?>

	<?php include('../includes/rodape.php') ?>