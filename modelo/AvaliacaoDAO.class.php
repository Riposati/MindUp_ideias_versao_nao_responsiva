	<?php

		require_once('../modelo/conexao.php');

		class AvaliacaoDAO{

			public function getConexao(){

				$conexao = Conexao::getInstance();
				return $conexao;
			}

			public function getCamposIdeia($idIdeia){
				$conexao = $this->getConexao();
				$resultado = $conexao->query("select * from ideiasusuarios where idideia = $idIdeia"); // pega todos os campos da ideia selecionada
				return $resultado;
			}

			public function getIdLogado($email){
				$conexao = $this->getConexao();
				$resultado = $conexao->query("select id from usuario where email='$email'");
				return $resultado;
			}

			public function getIdUsuarioTabelaAvaliacao(){
				$conexao = $this->getConexao();
				$resultado = $conexao->query("select idUsuario from avaliacoes");
				return $resultado;
			}

			public function getIdIdeiaTabelaAvaliacao(){
				$conexao = $this->getConexao();
				$resultado = $conexao->query("select idIdeia from avaliacoes");
				return $resultado;
			}

			public function getPermissaoParaAvaliar($conexao,$email,$idIdeia){

					$result = $conexao->query("select id from usuario where email='$email'"); /// aqui é pra verificar se o dono da ideia não está avaliando a mesma o que não pode!
		        	$result2 = $conexao->query("select idusuario from ideiasusuarios where idideia=$idIdeia");

		        	$a = $result->fetch(); // recebe o id da pessoa que abriu a sessão no momento!
		        	$b = $result2->fetch(); // recebe o id da pessoa que esta olhando no momento essa ideia!

		        	if($a[0]!=$b[0]){
		        		return true;
		        	}else{

		        		return false;
		        	}
				}
			}
	?>