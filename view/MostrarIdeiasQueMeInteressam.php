	<?php include('../includes/header.php') ?>
	<?php include('../includes/topo.php') ?>	
	<?php include('../controles/abriusessao.php') ?>

	<div id="localizaoSite">
		<div id="localizaoReduzido">
		    <span class="fontDouradaTahoma">Você está em:</span><span class=""> &nbsp;Ideias que me interessam</span>
		</div>
	</div>

	<br><br>

	<h2>Clique sobre o <span class='fraseDaIdeiaSpan'>nome do usuário autor da ideia</span> para negociar as ideias</h2><br><br>

	<?php 
	    if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)) { 
	        unset($_SESSION['email']); 
	        unset($_SESSION['senha']); 
	        echo '<meta http-equiv="refresh" content="0;URL=../view/login.php" />';
	    } else{

	    	$conexao = Conexao::getInstance();

	    	$email = $_SESSION['email'];
	    	$resultado = $conexao->query("select id,nome from usuario where email = '$email'");

	    	$a = $resultado->fetch();

	    	$idUser = $a[0]; 
	    	$nome = $a[1];

			$resultado = $conexao->query("select * from usuariosinteressados where `nomeusuariointeressado`='$nome'");

			echo"
				<div class='corpoTelas'> 
				<table border='1' style='text-align:center'; padding:10px;>
				<th>ID da idea</th>
				<th>Frase da idea</th>
				<th>Usuário dono da idea</th>
			";

			while($a = $resultado->fetch()){
				$id=$a[1];
				echo "<tr><td>" . $a[1] . "</td>";
				echo "<td>" . $a[3] . "</td>";
				echo "<td><a class='negociacao_ideias' href='negociacao_ideias_respostas.php?id_ideia=$a[1]&usuario_autor=$a[7]'>" . $a[7] . "</a></td>";
			}
	    }
	?>

	</table><br><br>
	<a href='#topo' class='topo'></div>Voltar ao topo</a><br><br><br>
	
	<?php include('../includes/rodape.php') ?>