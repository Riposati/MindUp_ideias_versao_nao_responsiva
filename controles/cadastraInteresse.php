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
            preg_match("/^[0-9]+$/i", $campo) && 
            !preg_match('[/{}"<>()]',$campo) &&
            !preg_match_all("/<a|http:/i", $campo) &&
            !preg_match("/bcc:|cc:|multipart|\[url|Content-Type:/i",$campo)){

                //echo $campo . "<br>";
                $flag = true;
            }

            return $flag;
        }

        require_once('../modelo/conexao.php');
        require_once('../classes/Cliente.class.php');

        $usuario = new Cliente();

        $conexao = Conexao::getInstance();

        $id = $_POST['id'];

        $flag1 = verificaTags($id);

        if($flag1==true){

            $resultado = $conexao->query("select * from ideiasusuarios");

            $flag = false;

            while ($a = $resultado->fetch()) {

                if (strcmp($a[0], $id) == 0) {
                    $flag = true;
                    break;
                }
            }

            $resultado = $conexao->query("select nome from usuario where id='$a[1]'");

            $n = $resultado->fetch();

            if ($flag == false) {

                echo "<script>alert('ID inexistente');</script>";

                echo '<meta http-equiv="refresh" content="0;URL=../view/investirIdeia.php" />';
            } else {

                $idUsuario = $_POST['idusuario'];
                $nomeusuariointeressado = $_POST['nomeusuario'];

                if (strcmp($nomeusuariointeressado, $n[0]) == 0) {

                    echo "<script>alert('Autor da ideia não pode investir na própria ideia!!!');</script>";

                    echo '<meta http-equiv="refresh" content="0;URL=../view/investirIdeia.php" />';
                } else {

                    $flag = $usuario->verificaSeJaExisteIdeiaComInteressado($conexao,$id,$nomeusuariointeressado);

                    if($flag==true){

                        $resultadoQuery = $conexao->query("insert into usuariosinteressados(idideia,ideia,fraseideia,idusuariointeressado,nomeusuariointeressado,idusuarioautordaideia,nomeusuarioautordaideia) values($id,'$a[2]','$a[5]',$idUsuario,'$nomeusuariointeressado',$a[1],'$n[0]')");

                        echo "<h1>Perfeito Seu interesse nesta ideia foi salvo com sucesso!!!</h1>

            					<a href='../view/investirIdeia.php'>Clique para investir mais </a>
            			";
                }else{

                    echo "<br><script>alert('Já demonstrou interesse nessa ideia!')</script><br>";
                    echo '<meta http-equiv="refresh" content="0;URL=../view/investirIdeia.php" />';
                }

            }

        }
    }else{

            echo'<script>alert("Caracteres invalidos!");</script>';
            echo '<meta http-equiv="refresh" content="0;URL=../view/investirIdeia.php" />';
        }
    }
?>
