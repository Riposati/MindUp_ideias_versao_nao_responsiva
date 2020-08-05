<?php
    session_start();
    if ((!isset($_SESSION['email']) == true) and ( !isset($_SESSION['senha']) == true)) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        echo '<meta http-equiv="refresh" content="0;url=../view/login.php">';
        
    } else {

        function verificaTags($campo){

            $flag=false;

            if ($campo!="" && 
            preg_match("/^[a-zA-Z0-9 !+-çÇáéíóúýÁÉÍÓÚÝàèìòùÀÈÌÒÙãõñäëïöüÿÄËÏÖÜÃÕÑâêîôûÂÊÎÔÛ$?,:.]+$/i", $campo) && 
            !preg_match('[/{}"<>()]',$campo) &&
            !preg_match_all("/<a|http:/i", $campo) &&
            !preg_match("/bcc:|cc:|multipart|\[url|Content-Type:/i",$campo)){

                //echo "valido = " . $campo . "<br>";
                $flag = true;
            }
            //echo "invalido = " . $campo . "<br>";
            return $flag;
        }

        require_once('../modelo/conexao.php');
        $conexao = Conexao::getInstance();

        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $data = $_POST['dataNascimento'];
        $celular = $_POST['celular'];
        $telFixo = $_POST['telFixo'];
        $email = $_POST['email'];

        $arrumaData = explode("/", $data);
        $dataParaBancoMysql = $arrumaData[2] . '-' . $arrumaData[1] . '-' . $arrumaData[0];

        $flag1 = verificaTags($id);
        $flag2 = verificaTags($nome);
        $flag3 = verificaTags($email);

        if($flag1==true && $flag2==true && $flag3==true){

            if(strcmp($_POST['senha'],"")==0){
                $resul = $conexao->query("update usuario set nome ='$nome' , datanascimento = '$dataParaBancoMysql' , telefonecelular='$celular' , 
                    telefonefixo = '$telFixo' , email = '$email'
                    where id=$id;");

                }else{
                    $senha = md5($_POST['senha']);
                    $resul = $conexao->query("update usuario set nome ='$nome' , datanascimento = '$dataParaBancoMysql' , telefonecelular='$celular' , 
                    telefonefixo = '$telFixo' , email = '$email' , senha = '$senha', confirmaSenha = '$senha'
                    where id=$id;");
                }

            echo "<script>alert('Perfil atualizado')</script>";
            echo '<meta http-equiv="refresh" content="0;URL=../view/painel.php" />';
        }else{

            echo'<script>alert("Caracteres invalidos!");</script>';
            echo '<meta http-equiv="refresh" content="0;URL=../view/editarperfil.php" />';
        }

    }


?>