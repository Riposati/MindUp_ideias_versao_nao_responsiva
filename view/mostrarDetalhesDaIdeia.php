	<?php 
	    require('../classes/Caminho.class.php');
	    require('../modelo/AvaliacaoDAO.class.php');
	    require("../classes/Ideia.class.php");

		    $caminho = new Caminho();
		    include($caminho->getCaminhoHeader());
		   	include($caminho->getCaminhoTopo());
		    include($caminho->getCaminhoAbrirSessao());

		    $conexao = Conexao::getInstance();
	    ?>

	    <div id="localizaoSite">
			<div id="localizaoReduzido">
			  <span id="topo" class="fontDouradaTahoma">Você está em:</span><span class=""> &nbsp;Detalhes</span>
			</div>
		</div>
		<br><br>

		<h1>Abaixo segue mais informações sobre a ideia escolhida</h1><br><br>

	    <?php

	    	if(isset($_GET['idIdeia'])){
				$idIdeia = $_GET['idIdeia'];

				$avaliacaoDAO = new AvaliacaoDAO();

				$resultado = $avaliacaoDAO->getCamposIdeia($idIdeia);

				$resultado = $conexao->query("select * from ideiasusuarios where idideia = $idIdeia and ideia_paga=1");

				$a = $resultado->fetch();

				if($resultado->rowCount()> 0){

					$conexao = $avaliacaoDAO->getConexao();

					$objeto_ideia = new Ideia($idIdeia,$a,$conexao);

					$arrumaData = explode("-",$a[3]);
					$dataParaBancoMysql = $arrumaData[2].'/'.$arrumaData[1].'/'.$arrumaData[0];
					echo "<h3 class='detalhesIdeia'>Data de inserção</h3><div class='smallRectangle'>$dataParaBancoMysql</div><br>";

					$objeto_ideia->getDetalhesIdeias($idIdeia,$a,$conexao);
				}else{

					echo "<h2>Primeiramente pague sua ideia</h2>";
				}
			}
		?>

		<br><br>

		<hr><br>

		<a href='#topo' class='topo'>Voltar ao topo</a><br><br><br>

		<?php 
		    include($caminho->getCaminhoRodape());
		?>