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
		             <span class="fontDouradaTahoma">Você está em:</span><span class=""> &nbsp;Mostrar minhas ideias</span>
		          </div>
			</div>
			<br><br>

			<?php
					if($valor_linhas_retornadas > 0){

					echo "
						<h2>Clique sobre a <span class='fraseDaIdeiaSpan'>frase da ideia</span> para ver suas ideias</h2><br>
						<div class='corpoTelas'> 
							<table border='1'>
							<th>Data</th>
							<th>Categoria</th>
							<th>Frase da ideia</th>
					";

					while($a = $resultado->fetch()){
						$idIdeia= $a[0];
						$arrumaData = explode("-",$a[3]);
						$dataParaBancoMysql = $arrumaData[2].'/'.$arrumaData[1].'/'.$arrumaData[0];
						echo "<tr><td>" . $dataParaBancoMysql . "</td>";
						echo "<td>" . $a[4] . "</td>";
						echo "<td><a class='linksPainel' href='../view/mostrarDetalhesDaIdeia.php?idIdeia=$idIdeia'>" . $a[5] . "</a></td></tr>";
					}

				}else{

					echo "<h1 style='margin-bottom:100px;'>Sem ideias para mostrar!</h1>";
				}

					echo "</table><br><br>";
		   		}
			?>

	<a href='#topo' class='topo'></div>Voltar ao topo</a><br><br><br>

	<?php 
         include($caminho->getCaminhoRodape());
     ?>