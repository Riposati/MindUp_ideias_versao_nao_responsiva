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
			?>
			<div id="localizaoSite">
		      <div id="localizaoReduzido">
		        <span class="fontDouradaTahoma">Você está em:</span><span class=""> &nbsp;Deletar minhas ideias</span>
		      </div>
			</div>
			<br><br>
			
			<?php

				if($valor_linhas_retornadas > 0){

				echo"
					<div class='corpoTelas'>
					<table border='1'>
					<th>Data</th>
					<th>Categoria</th>
					<th>Frase de ideia</th>
					<th>Modificações</th>
				";

				while($a = $resultado->fetch()){
					echo "<tr>";
					$arrumaData = explode("-",$a[3]);
					$dataParaBancoMysql = $arrumaData[2].'/'.$arrumaData[1].'/'.$arrumaData[0];
					echo "<td>" . $dataParaBancoMysql . "</td>";
					echo "<td>" . $a[4] . "</td>";
					echo "<td>" . $a[5] . "</td>";

					$id = $a[0];
					
					echo "<td>

						<form id='deletar' name='deletar' action='../controles/deletarIdeia.php' method='POST'>
							<input type='hidden'  id='idideia' name='idideia' value='$id'/>
							<input type='submit' value='Deletar' style='width:130px;height:40px;margin:10px;'/>
						</form>

					</td></tr>";
				}

			}else{

				echo "<h1 style='margin-bottom:100px;'>Sem ideias para mostrar!</h1>";
			}

				echo "</table></div><br><br>";
		    }
		?>

		<a href='#topo' class='topo'>Voltar ao topo</a><br><br><br>

	<?php 
         include($caminho->getCaminhoRodape());
    ?>