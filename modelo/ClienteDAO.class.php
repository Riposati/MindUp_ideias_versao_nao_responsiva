<?php

	class ClienteDAO{

		private $nomeObjetoAtual;
		private $telefoneCelularObjetoAtual;
		private $telefoneFixoObjetoAtual;
		private $emailObjetoAtual;
		private $confirmacaoEmailObjetoAtual;
		private $senhaObjetoAtual;
		private $confirmacaoSenhaObjetoAtual;
		private $dataParaBancoMysql;
		private $nome_atual;
	
		public function __construct(){}

		public function recebeParametrosECadastraUsuario($nomeObjetoAtual,$telefoneCelularObjetoAtual,$telefoneFixoObjetoAtual,
									$emailObjetoAtual,$confirmacaoEmailObjetoAtual,$senhaObjetoAtual,
									$confirmacaoSenhaObjetoAtual,$dataParaBancoMysql,
									$nome_atual){

				$this->nomeObjetoAtual = $nomeObjetoAtual;
				$this->telefoneCelularObjetoAtual = $telefoneCelularObjetoAtual;
				$this->telefoneFixoObjetoAtual = $telefoneFixoObjetoAtual;
				$this->emailObjetoAtual = $emailObjetoAtual;
				$this->confirmacaoEmailObjetoAtual = $confirmacaoEmailObjetoAtual;
				$this->senhaObjetoAtual = $senhaObjetoAtual;
				$this->confirmacaoSenhaObjetoAtual = $confirmacaoSenhaObjetoAtual;
				$this->dataParaBancoMysql = $dataParaBancoMysql;
				$this->nome_atual = $nome_atual;
		}

		public function insereUsuarioBanco(){

			$conexao = Conexao::getInstance();

			$conexao->query("insert into usuario(id,nome,datanascimento,telefonecelular,telefonefixo,
			email,confirmaemail,senha,confirmasenha,imagem)
                         values('', '$this->nomeObjetoAtual' , '$this->dataParaBancoMysql' , '$this->telefoneCelularObjetoAtual' , '$this->telefoneFixoObjetoAtual' , 
                        '$this->emailObjetoAtual' , '$this->confirmacaoEmailObjetoAtual' , '$this->senhaObjetoAtual' , '$this->confirmacaoSenhaObjetoAtual' , '$this->nome_atual' );");
		}

		public function verificaEmailUsuario(){

			require("conexao.php");

			$conexao = Conexao::getInstance();

			$resultadoPegaEmail = $conexao->query("select email from usuario");

    		return $resultadoPegaEmail;
		}

		public function mostrarTodosUsuarios(){

			$conexao = Conexao::getInstance();

			$resultado = $conexao->query("select * from usuario");	

			return $resultado;
		}
	}
?>