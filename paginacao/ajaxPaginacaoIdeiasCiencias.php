	 <script src='../js/jRate.js'></script>
	 
	<?php

		require_once('../modelo/PaginacaoDAO.class.php');

		$paginacaoDAO = new PaginacaoDAO();
		$run = $paginacaoDAO->getPaginacaoCiencias("ciências");

		echo'<table border="0" style="text-align:justify">';

			$i = (rand(1,100000000) * 7);

			//echo $i . "<br>";

			while($row = $run->fetch()){
				$ideia = $row[0];
				$recebeValor = $row[6];
			    echo "<tr><td class='arruma0'>$row[0]</a></td>";
			    echo "<td class='arruma2'><a href='../view/detalhesIdeiaCiencias.php?idIdeia=$ideia'>$row[5]</a></td>";
			    $v = date('d/m/Y', strtotime($row[3])); /// data padrão Brasil
			    echo '<td class="arruma3">' . $v .'</td>';
			    echo "<td class='arruma0'><div id='jRate$i' title='pontuação dessa ideia baseada nas avaliações : $recebeValor'></div></a></td>";

			    // esse echo se faz necessário pelo fato do valor vir do banco de dados para o jquery
			    echo "<script>
						$('#jRate$i').jRate({
							shape: 'BULB',
							width: 25,
							height: 25,
							rating: $recebeValor,
							onChange: function(rating) {
								$('#demo-onchange-value').text('Sua avaliação: '+rating);
							},
							readOnly: true
						});
					</script>";
			$i = (rand($i,100000000) * 7);	
			//echo $i . "<br>";		
		}
		echo"</tr></table>";
	?>
