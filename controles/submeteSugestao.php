<?php

	require_once("../modelo/conexao.php");

	$conexao = Conexao::getInstance();

	$sugestao = $_POST['sugestao'];

	function verificaTags($campo){

            $flag=false;

            if ($campo!="" && 
            preg_match("/^[a-zA-Z0-9 !+-çÇáéíóúýÁÉÍÓÚÝàèìòùÀÈÌÒÙãõñäëïöüÿÄËÏÖÜÃÕÑâêîôûÂÊÎÔÛ$?,:.]+$/i", $campo) && 
            !preg_match('[/{}"<>()]',$campo) &&
            !preg_match_all("/<a|http:/i", $campo) &&
            !preg_match("/bcc:|cc:|multipart|\[url|Content-Type:/i",$campo)){

                //echo $campo . "<br>";
                $flag = true;
            }

            return $flag;
        }

    $flag = verificaTags($sugestao);

    if($flag==true){

		$conexao->query("insert into sugestoes (sugestao) values ('$sugestao')");

		echo "<script>alert('Sugestão enviada com sucesso!')</script>";

		echo '<meta http-equiv="refresh" content="0;URL=../view/painel.php" />';

	}else{

		echo'<script>alert("Caracteres invalidos!");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=../view/enviaSugestao.php" />';
	}

?>
