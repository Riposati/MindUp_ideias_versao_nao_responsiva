	<script src="js/jquery.js" type="text/javascript"></script>

	<?php   
	        require('../classes/Caminho.class.php');

	        $caminho = new Caminho();

	        include($caminho->getCaminhoHeader());
	        include($caminho->getCaminhoTopo());
	        include($caminho->getCaminhoAbrirSessao());
	        $conexao = Conexao::getInstance();
	?>

	<?php 
	    if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)) { 
	        unset($_SESSION['email']); 
	        unset($_SESSION['senha']); 
	       	echo $caminho->getCaminhoFimSessao(); // retorna para o login 
	    } else{

	    	$email = $_SESSION['email'];
	    	$resultado = $conexao->query("select id from usuario where email = '$email'");
	    	$a = $resultado->fetch();

	    	$idUser = $a[0];

			$resultado = $conexao->query("select * from ideiasusuarios where idusuario=$idUser");
			$valor_linhas_retornadas = $resultado->rowCount();
				
			echo'

				<div id="localizaoSite">
		            <div id="localizaoReduzido">
		                <span class="fontDouradaTahoma">Você está em:</span><span class=""> &nbsp;Atualizar minhas ideias</span>
		            </div>
					</div>
				<br><br>
			';

			if($valor_linhas_retornadas > 0){

			echo"
			<div class='corpoTelas'>
			<table border='1'>
			<th>Data</th>
			<th>Categoria</th>
			<th>Frase</th>
			<th>Modificações</th>
			";

			while($a = $resultado->fetch()){
				$arrumaData = explode("-",$a[3]);
				$dataParaBancoMysql = $arrumaData[2].'/'.$arrumaData[1].'/'.$arrumaData[0];
				echo "<tr><td>" . $dataParaBancoMysql . "</td>";
				echo "<td>" . $a[4] . "</td>";
				echo "<td>" . $a[5] . "</td>";

				$id = $a[0];
				$ideia = $a[2];
				$data = $a[3];
				$categoria = $a[4];
				$frase = $a[5];

				echo "<td>

					<form id='atualizar' name='atualizar' action='atualizarIdeia.php' method='POST'>

						<input type='hidden'  id='idideia' name='idideia' value='$id'/>
						<input type='hidden'  id='ideia' name='ideia' value='$ideia'/>
						<input type='hidden'  id='data' name='data' value='$data'/>
						<input type='hidden'  id='categoria' name='categoria' value='$categoria'/>
						<input type='hidden'  id='frase' name='frase' value='$frase'/>
						<input type='submit' value='Atualizar' style='width:130px;height:40px;margin:10px;'/>

					</form>

				</td></tr>";
			}

		}else{


			echo "<h1 style='margin-bottom:100px;'>Sem ideias para mostrar!</h1>";
		}

			echo "</table><br></div>";
	    }
	?>

	<a href='#topo' class='topo'>Voltar ao topo</a><br><br><br>

	<?php 
         include($caminho->getCaminhoRodape());
    ?>