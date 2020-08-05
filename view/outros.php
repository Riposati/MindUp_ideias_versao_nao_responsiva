	<?php   
        require('../classes/Caminho.class.php');

        $caminho = new Caminho();

        include($caminho->getCaminhoHeader());
        include($caminho->getCaminhoTopo());
        include($caminho->getCaminhoAbrirSessao());
     ?>

	<script src="../js/PaginacaoIdeiasOutros.js" type="text/javascript"></script>
	<script src="../js/scriptQueTrazAPaginacao.js"></script>
	
		<div id="localizaoSite">
	    	<div id="localizaoReduzido">	
	    		<span class="fontDouradaTahoma">Você está em:</span>
	        	<span>Outros tipos de ideias</span>
	    	</div>
		</div>
		<div id='computacao'>
		<br>
		<h2 class='headerEspecial'>Clique sobre a <span class='fraseDaIdeiaSpan'>frase da ideia</span> que lhe interessar para mais informações</h2>
			<br><br>	
			<table border='0' id='tabelapaginacaocomputacao'>
				<tr>
					<th class='arrumaTh0'>ID da Ideia</th>
					<th class='arrumaTh2'>Frase da Ideia</th>
					<th class='arrumaTh3'>Data de inserção</th>
					<th class='arrumaTh3'>Avaliações</th>
				</tr>
			</table>
			<div id="content">

			</div>
			<br><br><br>
	</div>
	<a href='#topo' class='topo'>Voltar ao topo</a><br><br><br>

	<?php 
         include($caminho->getCaminhoRodape());
     ?>