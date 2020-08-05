<?php
	
	require("../modelo/conexao.php");

	$conexao = Conexao::getInstance();

	$id = $_GET['id_ideia'];

	$conexao->query("delete from usuariosinteressados where idideia = $id");

	echo "<script>alert('Interesse removido!');</script>";

    echo '<meta http-equiv="refresh" content="0;URL=../view/MostrarIdeiasQueMeInteressam.php" />';
?>