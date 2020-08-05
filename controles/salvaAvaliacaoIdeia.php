<?php

	require('../modelo/conexao.php');
	require('../classes/RetornoCertoAposAvaliacao.class.php');

	$retorno = new RetornoCertoAposAvaliacao();

	$id = $_POST['id'];
	$idUsuario = $_POST['idUsuario'];
	$valorQueUsuarioAvaliou = $_POST['valorDaDiv'];

	$conexao = Conexao::getInstance();

	$avaliacaoAtual = $conexao->query("select avaliacao from ideiasusuarios where idIdeia = $id");

	$categoria = $conexao->query("select categoria from ideiasusuarios where idIdeia = $id"); // pra retornar para a paginação certa
	$cate = $categoria->fetch();

	$valor = $avaliacaoAtual->fetch();

	$v = $valor[0];

	$total = $valorQueUsuarioAvaliou + $v;
 
	$conexao->query("update ideiasusuarios set avaliacao = $total where 
		idIdeia = $id");

	$conexao->query("insert into avaliacoes values($idUsuario,$id)");

	echo "<script>alert('Avaliação salva com sucesso!')</script>";

	if(strcmp($cate[0],"ciências")==0){
		echo $retorno->getCaminhoCertoAposAvaliacao("ciências");
		return;
	}

	if(strcmp($cate[0],"computação")==0){
		echo $retorno->getCaminhoCertoAposAvaliacao("computação");
		return;
	}

	if(strcmp($cate[0],"indústria")==0){
		echo $retorno->getCaminhoCertoAposAvaliacao("indústria");
		return;
	}

	if(strcmp($cate[0],"saúde")==0){
		echo $retorno->getCaminhoCertoAposAvaliacao("saúde");
		return;
	}

	if(strcmp($cate[0],"educação")==0){
		echo $retorno->getCaminhoCertoAposAvaliacao("educação");
		return;
	}

	if(strcmp($cate[0],"outros")==0){
		echo $retorno->getCaminhoCertoAposAvaliacao("outros");
		return;
	}

?>