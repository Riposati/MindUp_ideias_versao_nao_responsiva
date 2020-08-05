	<?php
			 class Caminho{

				private $enderecoDoHeader = '../includes/header.php';
				private $enderecoDoTopo = '../includes/topo.php';
				private $enderecoDoRodape = '../includes/rodape.php';
				private $enderecoAbrirSessao = '../controles/abriusessao.php';
				private $enderecoParametros = '../includes/parametros.php';
				private $enderecoConexao = "../modelo/conexao.php";
				private $enderecoFimSessao = '<meta http-equiv="refresh" content="0; url=../view/login.php">';

				public function getCaminhoHeader(){

					return $this->enderecoDoHeader;
				}

				public function getCaminhoTopo(){

					return $this->enderecoDoTopo;
				}

				public function getCaminhoRodape(){

					return $this->enderecoDoRodape;
				}

				public function getCaminhoAbrirSessao(){

					return $this->enderecoAbrirSessao;
				}

				public function getCaminhoParametros(){

					return $this->enderecoParametros;
				}

				public function getCaminhoConexao(){

					return $this->enderecoConexao;
				}

				public function getCaminhoFimSessao(){

					return $this->enderecoFimSessao;
				}

			}
	?>