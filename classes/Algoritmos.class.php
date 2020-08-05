<?php

	class Algoritmos{

		public function busca_binaria($chave_buscada , $vetor){

			//echo $chave_buscada;

			$ini = 0;
			$fim = count($vetor) - 1 ;

			print_r($vetor);

			$meio = 0;

			while($ini <= $fim){

				$meio = ($ini + $fim) / 2;

				if($chave_buscada==$vetor[$meio]){

					return $meio;
				}

				if($chave_buscada < $vetor[$meio]){

					$fim = $meio - 1;
				}else{

					$ini = $meio + 1;

				}
			}

			return -1;
		}

		public function ordena($vetor){

			sort($vetor);
			return $vetor;
		}
	}

?>