 <?php 
 session_start(); 
 if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)) { 
        unset($_SESSION['email']); 
        unset($_SESSION['senha']); 
        echo '<meta http-equiv="refresh" content="0;URL=../view/login.php" />';

    } else{

        function verificaTags($campo){

            $flag=false;

            if (strcmp($campo,"")==0){
                $flag=true;
            }else{

                    if (
                    preg_match("/^[a-zA-Z0-9 !+-çÇáéíóúýÁÉÍÓÚÝàèìòùÀÈÌÒÙãõñäëïöüÿÄËÏÖÜÃÕÑâêîôûÂÊÎÔÛ$?,:.]+$/i", $campo) && 
                    !preg_match('[/{}"<>()]',$campo) &&
                    !preg_match_all("/<a|http:/i", $campo) &&
                    !preg_match("/bcc:|cc:|multipart|\[url|Content-Type:/i",$campo)){

                        //echo "valido = " . $campo . "<br>";
                        $flag = true;
                    }
             }
            return $flag;
        }

    	require_once("../modelo/conexao.php");

        $conexao = Conexao::getInstance();
        
    	$id = $_POST['idusuario'];
        $relato = $_POST['relato'];
        $nome = $_POST['nome'];
        $celular = $_POST['celular'];

        $flag1 = verificaTags($id);
        $flag2 = verificaTags($relato);
        $flag3 = verificaTags($nome);
        //$flag4 = verificaTags($celular);

        if($flag1==true && $flag2==true && $flag3==true){

            /*    Guardar para sabermos porque o usuário desfez sua conta  para podermos melhorar o sistema   */

            $conexao->query("insert into relatoscontasremovidas (relato,nomeusuariorelatou,celular) values('$relato' , '$nome' , '$celular')");

            /*  Deletar as ideias já inseridas por este usuario   */

            $conexao->query("delete from ideiasusuarios where idusuario = $id");

            /*  Deletar as ideiasDosInteresses já inseridas por este usuario   */

            $conexao->query("delete from usuariosinteressados where idusuariointeressado = $id or idusuarioautordaideia = $id ");

        	$conexao->query("delete from usuario where id=$id;");

            $conexao->query("delete from ideias_de_amigos where id_autor_ideia=$id");

        	echo "<script>alert('Conta deletada')</script>";

            unset($_SESSION['email']); 
            unset($_SESSION['senha']); 
            echo '<meta http-equiv="refresh" content="0;URL=../view/index.php" />';

        }else{

            echo'<script>alert("Caracteres invalidos!");</script>';
            echo '<meta http-equiv="refresh" content="0;URL=../view/mostraDeletarConta.php" />';
        }
	}
?>