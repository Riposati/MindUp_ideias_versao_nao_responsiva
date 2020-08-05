<?php

    session_start();

    if ((!isset($_SESSION['email']) == true) and ( !isset($_SESSION['senha']) == true)) {
       
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        echo '<meta http-equiv="refresh" content="0;URL=../view/login.php" />'; 

    } else {

       require_once('../classes/Algoritmos.class.php');

       $algoritmos_genericos = new Algoritmos();

       function verificaTags_1($campo){

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

        function verificaTags_2($campo){

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

        require_once('../modelo/conexao.php');
        require("../modelo/IdeiaDAO.class.php");

        $conexao = Conexao::getInstance();

        $id = $_POST['id']; // id da ideia

        $flag_teste = verificaTags_1($id);

        if($flag_teste==true){

            $ideiaDao = new IdeiaDAO();

            $resultado = $ideiaDao->trazTodaIdeiasBanco($conexao);

            $flag = false;

            while ($a = $resultado->fetch()) {

                if (strcmp($a[0], $id) == 0) {
                    $flag = true;
                    break;
                }
            }

            if ($flag == false) {

                echo "<script>alert('ID da ideia inexistente');</script>";

                echo '<meta http-equiv="refresh" content="0;URL=../view/divulgar_ideia_amigo.php" />';
            } else {

                // essa parte pega o id do usuario logado , "o amigo" , pega tb o id_do nome do amigo que terá sua ideia divulgada
                $idUsuario = $_POST['idusuario'];
                $nome_amigo = $_POST['nome_amigo'];

                $flag_1_teste = verificaTags_2($idUsuario);
                $flag_2_teste = verificaTags_2($nome_amigo);

                if($flag_1_teste==true && $flag_2_teste==true){

                    $result = $ideiaDao->obtemIdNomeAmigo($conexao , $nome_amigo);
                    $a = $result->fetch();
                    $valor_linhas_retornadas = $result->rowCount();

                    if($valor_linhas_retornadas > 0){

                        $id_nome_informado = $a[0];
                        $res = $ideiaDao->obtemNomeUsuarioAmigo($conexao,$id_nome_informado);
                        $i=0;
                        $flag=false;

                        while($a = $res->fetch()){

                            if($a[0]==$id){

                                $flag=true;
                            }

                            $i++;
                        }
                    }

                    if($flag==false){

                        echo "<script>alert('Essa ideia não pertence a este usuário!!!');</script>";

                        echo '<meta http-equiv="refresh" content="0;URL=../view/divulgar_ideia_amigo.php" />';
                    }else{

                        $id_dono_ideia = $a[0];
                        $result = $ideiaDao->obtemIdUsuarioAmigo($conexao,$nome_amigo);
                        $valor_linhas_retornadas = $result->rowCount();

                        if($valor_linhas_retornadas > 0){

                            $a = $result->fetch();
                            $id_amigo = $a[0];

                            if($id_dono_ideia!=$idUsuario){

                                if ($id_amigo==$idUsuario) { /// esse if valida se o id da pessoa que quer divulgar a ideia de um amigo é diferente do id do amigo informado

                                    echo "<script>alert('Só é válido ideias de amigos!!!');</script>";

                                    echo '<meta http-equiv="refresh" content="0;URL=../view/divulgar_ideia_amigo.php" />';
                                } else {

                                    /*  esse trecho serve para verificar se a pessoa já divulgou a ideia de seu amigo, se não deixa , se já existir não deixa divulgar novamente  */
                                    $res = $ideiaDao->obtemIdIdeia($conexao);
                                    $res2 = $ideiaDao->obtemIdAutorIdeia($conexao);
                                    $res3 = $ideiaDao->obtemIdUsuario($conexao);

                                    $i=0;

                                    $array_com_dados_dos_ids_ideia = array("");
                                    $array_com_dados_dos_ids_autores = array("");
                                    $array_com_dados_dos_ids_amigos = array("");

                                    while($verifica_se_ja_existe_id_ideia = $res->fetch()){

                                        $array_com_dados_dos_ids_ideia[$i] = $verifica_se_ja_existe_id_ideia[0];
                                        $i++;
                                    }

                                    $i=0;

                                    while($verifica_se_ja_existe_id_autor = $res2->fetch()){

                                        $array_com_dados_dos_ids_autores[$i] = $verifica_se_ja_existe_id_autor[0];
                                        $i++;
                                    }

                                    $i=0;

                                    while($verifica_se_ja_existe_id_amigo = $res3->fetch()){

                                        $array_com_dados_dos_ids_amigos[$i] = $verifica_se_ja_existe_id_amigo[0];
                                        $i++;
                                    }

                                    $flag=false;

                                    // força bruta pra otimizacao

                                    /*$array_com_dados_dos_ids_ideia = $algoritmos_genericos->ordena($array_com_dados_dos_ids_ideia);
                                    $array_com_dados_dos_ids_autores = $algoritmos_genericos->ordena($array_com_dados_dos_ids_autores);
                                    $array_com_dados_dos_ids_amigos = $algoritmos_genericos->ordena($array_com_dados_dos_ids_amigos);

                                    $flag1 = $algoritmos_genericos->busca_binaria($id,$array_com_dados_dos_ids_ideia);
                                    $flag2 = $algoritmos_genericos->busca_binaria($id_amigo, $array_com_dados_dos_ids_autores);
                                    $flag3 = $algoritmos_genericos->busca_binaria($idUsuario , $array_com_dados_dos_ids_amigos);*/

                                    for($i=0;$i<count($array_com_dados_dos_ids_ideia) && $i<count($array_com_dados_dos_ids_autores) && $i<count($array_com_dados_dos_ids_amigos);$i++){

                                        if(($array_com_dados_dos_ids_ideia[$i]==$id) && ($array_com_dados_dos_ids_autores[$i]==$id_amigo) && ($array_com_dados_dos_ids_amigos[$i]==$idUsuario)){

                                            $flag=true;
                                            break;
                                        }
                                    }

                                    if($flag==false){

                                        $resultadoQuery = $ideiaDao->insereDivulgacaoIdeiasAmigo($conexao,$id,$idUsuario,$id_amigo);

                                        echo "<h1>Perfeito essa ideia de seu amigo foi divulgada por você!!!</h1>

                                			  <a href='../view/divulgar_ideia_amigo.php'>Clique para divulgar mais </a>
                                		  ";
                                    }else{

                                        echo "<script>alert('Já divulgou essa ideia!!!');</script>";

                                        echo '<meta http-equiv="refresh" content="0;URL=../view/divulgar_ideia_amigo.php" />';
                                    }
                            }
                            }else{

                                echo "<script>alert('Só é válido ideias de amigos!!!');</script>";

                                echo '<meta http-equiv="refresh" content="0;URL=../view/divulgar_ideia_amigo.php" />';
                            }
                    }else{

                        echo "<script>alert('Usuário inexistente');</script>";

                        echo '<meta http-equiv="refresh" content="0;URL=../view/divulgar_ideia_amigo.php" />';
                    }
                }// será aqui o final

            }else{

                 echo'<script>alert("Caracteres invalidos!");</script>';
                 echo '<meta http-equiv="refresh" content="0;URL=../view/divulgar_ideia_amigo.php" />';
            }
        }

    }else{

        echo'<script>alert("Caracteres invalidos!");</script>';
        echo '<meta http-equiv="refresh" content="0;URL=../view/divulgar_ideia_amigo.php" />';
    }
    }
?>
