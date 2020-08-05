<?php

	session_start();

    if ((!isset($_SESSION['email']) == true) and ( !isset($_SESSION['senha']) == true)) {
        
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        echo '<meta http-equiv="refresh" content="0;URL=../view/login.php" />';
        
    } else {

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

        require_once("../modelo/conexao.php");

        $conexao = Conexao::getInstance();

		if(isset($_POST['pergunta'])){

			$id_ideia = $_POST['id_ideia'];
			$id_usuario_interessado = $_POST['id_usuario_interessado']; /// erro aqui
			$id_usuario_autor = $_POST['id_usuario_autor'];
			$pergunta = $_POST['pergunta'];
			$interessado = $_POST['interessado'];

			$flag_1 = verificaTags($id_ideia);
			$flag_2 = verificaTags($id_usuario_interessado);
			$flag_3 = verificaTags($id_usuario_autor);
			$flag_4 = verificaTags($pergunta);
			$flag_5 = verificaTags($interessado);

			if($flag_1==true && $flag_2==true && $flag_3==true
            && $flag_4==true && $flag_5==true){

			/*echo $id_ideia;
			echo "<br>";
			echo "id usuario interessado = " . $id_usuario_interessado;
			echo "<br>";
			echo "id usuario autor dessa ideia = " . $id_usuario_autor;
			echo "<br>";
			echo $pergunta;*/

			$conexao->query("insert into perguntas_e_respostas_interessados values('',$id_ideia,$id_usuario_interessado,$id_usuario_autor,
				'$pergunta','',now(),'');");

				//echo "<script>alert('Pergunta enviada com sucesso!')</script>";
	        	echo "<meta http-equiv='refresh' content='0;URL=../view/negociacao_ideias.php?id_ideia=$id_ideia&usuario_interessado=$interessado' />";
			}else{

	            echo'<script>alert("Caracteres invalidos!");</script>';
	            echo '<meta http-equiv="refresh" content="0;URL=../view/MostrarIdeiasComInteressados.php" />';
        }

	}

}
?>