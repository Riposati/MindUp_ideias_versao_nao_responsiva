<?php

	session_start();

    if ((!isset($_SESSION['email']) == true) and ( !isset($_SESSION['senha']) == true)) {
        
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        echo '<meta http-equiv="refresh" content="0;URL=../view/login.php" />';
        
    } else {
        require_once("../modelo/conexao.php");

        function verificaTags($campo){

            $flag=false;

            if ($campo!="" && 
            preg_match("/^[a-zA-Z0-9 !+-çÇáéíóúýÁÉÍÓÚÝàèìòùÀÈÌÒÙãõñäëïöüÿÄËÏÖÜÃÕÑâêîôûÂÊÎÔÛ$?,:.]+$/i", $campo) && 
            !preg_match('[/{}"<>()/;]',$campo) &&
            !preg_match_all("/<a|http:/i", $campo) &&
            !preg_match("/bcc:|cc:|multipart|\[url|Content-Type:/i",$campo)){

                //echo $campo . "<br>";
                $flag = true;
            }

            return $flag;
        }

        $conexao = Conexao::getInstance();

		if(isset($_POST['resposta'])){
			$resposta = $_POST['resposta'];
			$id_ideia = $_POST['id_ideia'];
			$id_usuario_interessado = $_POST['id_usuario_interessado']; /// erro aqui
			$id_usuario_autor = $_POST['id_usuario_autor'];
			$autor = $_POST['autor'];
			$pergunta = $_POST['pergunta'];

			$flag_1 = verificaTags($resposta);
			$flag_2 = verificaTags($id_ideia);
			$flag_3 = verificaTags($id_usuario_autor);
			$flag_4 = verificaTags($pergunta);
			$flag_5 = verificaTags($id_usuario_interessado);
			$flag_6 = verificaTags($autor);

			if($flag_1==true && $flag_2==true && $flag_3==true
            && $flag_4==true && $flag_5==true && $flag_6==true){

			//echo $pergunta;

			/*echo $id_ideia;
			echo "<br>";
			echo "id usuario interessado = " . $id_usuario_interessado;
			echo "<br>";
			echo "id usuario autor dessa ideia = " . $id_usuario_autor;
			echo "<br>";
			echo $pergunta;*/

			//echo "update perguntas_e_respostas_interessados set resposta='$resposta',data_resposta=now() where id_ideia = $id_ideia and id_interessado = $id_usuario_interessado;";

			$conexao->query("update perguntas_e_respostas_interessados set resposta='$resposta',data_resposta=now() where id_ideia = $id_ideia and id_interessado = $id_usuario_interessado and pergunta='$pergunta'");

				//echo "<script>alert('Resposta enviada com sucesso!')</script>";
	        	echo "<meta http-equiv='refresh' content='0;URL=../view/negociacao_ideias_respostas.php?id_ideia=$id_ideia&usuario_autor=$autor' />";
			}else{

	            echo'<script>alert("Caracteres invalidos!");</script>';
	            echo '<meta http-equiv="refresh" content="0;URL=../view/MostrarIdeiasQueMeInteressam.php" />';
        }

	}

}
?>