	<?php
	
		class RetornoCertoAposAvaliacao{

			public function getCaminhoCertoAposAvaliacao($paginaQueDevoVoltar){

				if(strcmp($paginaQueDevoVoltar, "ciências")==0){

					$retornoPara = '<meta http-equiv="refresh" content="0;URL=../view/ciencias.php" />';
					return $retornoPara;

				}

				if(strcmp($paginaQueDevoVoltar, "computação")==0){

					$retornoPara = '<meta http-equiv="refresh" content="0;URL=../view/computacao.php" />';
					return $retornoPara;
					
				}

				if(strcmp($paginaQueDevoVoltar, "indústria")==0){

					$retornoPara = '<meta http-equiv="refresh" content="0;URL=../view/industria.php" />';
					return $retornoPara;
					
				}

				if(strcmp($paginaQueDevoVoltar, "saúde")==0){

					$retornoPara = '<meta http-equiv="refresh" content="0;URL=../view/saude.php" />';
					return $retornoPara;
					
				}

				if(strcmp($paginaQueDevoVoltar, "educação")==0){

					$retornoPara = '<meta http-equiv="refresh" content="0;URL=../view/educacao.php" />';
					return $retornoPara;
					
				}

				if(strcmp($paginaQueDevoVoltar, "outros")==0){

					$retornoPara = '<meta http-equiv="refresh" content="0;URL=../view/outros.php" />';
					return $retornoPara;
					
				}

				if(strcmp($paginaQueDevoVoltar, "")==0){

					$retornoPara = '<meta http-equiv="refresh" content="0;URL=../view/index.php" />';
					return $retornoPara;
				}

			}
		}
	?>