<?php 
	
	class Ideia {

		private $idUsuarioDonoDaIdeia;
		private $idea;
		private $dataDaIdeia;
		private $categoriaIdeia;
		private $fraseIdeia;		
		private $valorIdeia;

		public function __construct(){}

		public function setIdUsuaio($idUsuarioDonoDaIdeia){

			$this->idUsuarioDonoDaIdeia = $idUsuarioDonoDaIdeia;
		}

		public function getIdUsuario(){

			return $this->idUsuarioDonoDaIdeia;
		}

		public function setIdeia($ideia){

			$this->ideia = $ideia;
		}

		public function getIdeia(){

			return $this->ideia;
		}

		public function setDataIdeia($data){

			$this->dataDaIdeia = $data;
		}

		public function getDataIdeia(){

			return $this->dataDaIdeia;
		}

		public function setCategoria($categoriaIdeia){

			$this->categoriaIdeia = $categoriaIdeia;
		}

		public function getCategoria(){

			return $this->categoriaIdeia;
		}

		public function setFraseIdeia($fraseIdeia){

			$this->fraseIdeia = $fraseIdeia;
		}

		public function getFraseIdeia(){

			return $this->fraseIdeia;
		}
		

		public function setValorIdeia($valorIdeia){

			$this->valorIdeia = $valorIdeia;
		}

		public function getValorIdeia(){

			return $this->valorIdeia;
		}

		public function getDetalhesIdeias($idIdeia,$a,$conexao){

				$i=0;

				echo "<h3 class='detalhesIdeia'>id</h3><div class='smallRectangle'>$a[0]</div><br>";
				echo "<h3 class='detalhesIdeia'>Ideia</h3><div class='rectangle' style='overflow: auto;'>$a[2]</div><br>";
				echo "<h3 class='detalhesIdeia'>Categoria</h3><div class='smallRectangle'>$a[4]</div><br>";
 				echo "<h3 class='detalhesIdeia'>Frase</h3><div class='smallRectangle'>$a[5]</div><br>";
				echo "<h3 class='detalhesIdeia'>Valor pedido nesta ideia</h3><div class='smallRectangle'>R$ $a[7]</div><br>";

				echo "<h3 class='detalhesIdeia'>Imagens dessa ideia</h3>";

				$resultado = $conexao->query("select foto from fotos_ideias where id_ideia=$idIdeia limit 4");
			    $valor_linhas_retornadas = $resultado->rowCount();

				if($valor_linhas_retornadas > 0){
					while($a = $resultado->fetch()){

						echo "<img class='fotos_ideias_tamanho_bom' src='../fotosIdeias/$a[0]'>";
						if($i==1) // mostra duas fotos , dá um espaço
						{
							echo"<br>";
						}
						$i++;
					}
				}else{

					echo "<h2>ideia sem fotos cadastradas!</h2>";
				}
		}

	}

?>