<?php
	
	require_once('../modelo/conexao.php');

	class IdeiaDAO{

		public function __construct(){}	

		public function inserir($idUser,$ideiaUser,$dataParaBancoMysql, $categoria,$fraseIdeia , 
			$valorIdeia){

			$conexao = Conexao::getInstance();

			$conexao->query("insert into ideiasusuarios (idusuario,ideia,data,categoria,frasedaideia,valor,ideia_paga)values($idUser
	    				,'$ideiaUser' , '$dataParaBancoMysql', '$categoria' , '$fraseIdeia','$valorIdeia',0);");

			$idIdeia = $conexao->query("select * from ideiasusuarios order by idideia desc limit 1");

			$resposta = $idIdeia->fetch();

			return $resposta[0];
		}

		public function trazTodaIdeiasBanco($conexao){

			$resultado = $conexao->query("select * from ideiasusuarios");
			return $resultado;
		}

		public function obtemIdNomeAmigo($conexao,$nome_amigo){

			$resultado = $conexao->query("select id from usuario where nome='$nome_amigo'");
			return $resultado;
		}

		public function obtemNomeUsuarioAmigo($conexao,$id_nome_informado){

			$resultado = $conexao->query("select idideia from ideiasusuarios where idusuario=$id_nome_informado");
			return $resultado;
		}

		public function obtemIdUsuarioAmigo($conexao,$nome_amigo){

			$resultado = $conexao->query("select id from usuario where nome='$nome_amigo'");
			return $resultado;
		}

		public function obtemIdIdeia($conexao){

			$resultado = $conexao->query("select id_ideia from ideias_de_amigos");
			return $resultado;
		}

		public function obtemIdAutorIdeia($conexao){

			$resultado = $conexao->query("select id_autor_ideia from ideias_de_amigos");
			return $resultado;
		}

		public function obtemIdUsuario($conexao){

			$resultado = $conexao->query("select id_amigo from ideias_de_amigos");
			return $resultado;
		}
			
		public function insereDivulgacaoIdeiasAmigo($conexao,$id,$idUsuario,$id_amigo){

			$resultado = $conexao->query("insert into ideias_de_amigos(id_ideia,id_amigo,id_autor_ideia) values($id,$idUsuario,$id_amigo)");
			return $resultado;
		}

	}
	
?>