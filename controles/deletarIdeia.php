    <?php 
         session_start(); 

         if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)) { 

                unset($_SESSION['email']); 
                unset($_SESSION['senha']); 
                echo '<meta http-equiv="refresh" content="0;URL=../view/login.php" />';

            } else{

                require('../modelo/conexao.php');
                $conexao = Conexao::getInstance();

            	$id = $_POST['idideia'];
        	
                $flag=false;

                $res = $conexao->query("select * from usuariosinteressados");

                while($a = $res->fetch()){

                    if(strcmp($id,$a[1])==0){
                        $flag=true;
                        break;
                    }
                }

                if($flag==true){

                    echo "<script>alert('não pode deletar ideia investida!');</script>";
                    echo '<meta http-equiv="refresh" content="0;URL=../view/mostraDeletarIdeia.php" />';

                }else{

                    $conexao->query("delete from ideias_de_amigos where id_ideia=$id");
                	$conexao->query("delete from ideiasusuarios where idideia=$id;");

                	echo "<script>alert('Ideia deletada')</script>";
                    echo '<meta http-equiv="refresh" content="0;URL=../view/mostraDeletarIdeia.php" />';
                }
        	}
    ?>