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
            !preg_match('[/{}"<>()]',$campo) &&
            !preg_match_all("/<a|http:/i", $campo) &&
            !preg_match("/bcc:|cc:|multipart|\[url|Content-Type:/i",$campo)){

                //echo $campo . "<br>";
                $flag = true;
            }

            return $flag;
        }


        require('../modelo/conexao.php');
        $conexao = Conexao::getInstance();

        $id = $_POST['id'];
        $ideia = $_POST['ideia'];
        $data = $_POST['datepicker'];

        $arrumaData = explode("/", $data);
        $dataParaBancoMysql = $arrumaData[2] . '-' . $arrumaData[1] . '-' . $arrumaData[0];

        $categoria = $_POST['categoriaSelect'];
        $frase = $_POST['frase'];

        $flag1 = verificaTags($id);
        $flag2 = verificaTags($ideia);
        $flag3 = verificaTags($dataParaBancoMysql);
        $flag4 = verificaTags($categoria);
        $flag5 = verificaTags($frase);

        if($flag1==true && $flag2==true && $flag3==true
            && $flag4==true && $flag5==true){

            $resul = $conexao->query("update ideiasusuarios set ideia ='$ideia' , data = '$dataParaBancoMysql' , categoria='$categoria' , frasedaideia='$frase' 
            	where idideia=$id;");

            $resul2 = $conexao->query("update usuariosinteressados set ideia ='$ideia' 
                where idideia=$id;");

            echo "<script>alert('Ideia atualizada')</script>";
            echo '<meta http-equiv="refresh" content="0;URL=../view/mostraideiasparaatualizar.php" />';
        }else{

            echo'<script>alert("Caracteres invalidos!");</script>';
            echo '<meta http-equiv="refresh" content="0;URL=../view/mostraideiasparaatualizar.php" />';
        }
    }
?>