<?php
    session_start();

    if ((!isset($_SESSION['email']) == true) and ( !isset($_SESSION['senha']) == true)) {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        echo '<meta http-equiv="refresh" content="0;URL=login.php" />'; 

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

        require_once('../classes/Ideia.class.php');
        require_once('../modelo/IdeiaDAO.class.php');

        $ideia = new Ideia(); // CUIDADO COM NOMES DE OBJETOS PODE **CONFUNDIR O INTERPRETADOR PHP**

        $ideia->setIdUsuaio($_POST['id']);
        $ideia->setIdeia($_POST['ideia']);
        $today = date("m/d/y");   
        $ideia->setDataIdeia($today);
        $arrumaData = explode("/", $ideia->getDataIdeia());
        $dataParaBancoMysql = $arrumaData[2] . '-' . $arrumaData[0] . '-' . $arrumaData[1];
        $ideia->setCategoria($_POST['categoriaSelect']);
        $ideia->setFraseIdeia($_POST['frase']);

        $ideia->setValorIdeia($_POST['real']);

        //echo $ideia->getValorIdeia();

        $flag1 = verificaTags($ideia->getIdUsuario());
        $flag2 = verificaTags($ideia->getIdeia());
        $flag3 = verificaTags($ideia->getCategoria());
        $flag4 = verificaTags($ideia->getFraseIdeia());
        $flag5 = verificaTags($ideia->getValorIdeia());

        if($flag1==true && $flag2==true && $flag3==true
            && $flag4==true && $flag5==true){

            $ideiaDAO = new IdeiaDAO();

            $idIdeia = $ideiaDAO->inserir($ideia->getIdUsuario(),$ideia->getIdeia(),$dataParaBancoMysql,$ideia->getCategoria(), $ideia->getFraseIdeia(),
               $ideia->getValorIdeia());

                if(isset($_POST)){ 

                     function salvaFotoBanco($nome_imagem , $tamanho_imagem , $tmp , $idIdeia , $ideia){

                        $conexao = Conexao::getInstance();

                        $pasta = "../fotosIdeias/"; /* formatos de imagem permitidos */
                        $permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp" , ".mp4"); 

                        /* pega a extensão do arquivo */ 
                                $ext = strtolower(strrchr($nome_imagem,".")); 
                                /* verifica se a extensão está entre as extensões permitidas */ 
                                if(in_array($ext,$permitidos)){ /* converte o tamanho para KB */ 
                                    $tamanho = round($tamanho_imagem / (1024)); 
                                    if($tamanho < (1024)){
                             //se imagem for até 1MB envia 
                                //$nome_atual = md5(uniqid(time())).$ext; //nome que dará a imagem 
                                $nome_atual = $nome_imagem;
                                //caminho temporário da imagem /* se enviar a foto, insere o nome da foto no banco de dados */ 
                                if(move_uploaded_file($tmp,$pasta.$nome_atual)){    
                                    $idUsuario = $ideia->getIdUsuario();
                                    $conexao->query("INSERT INTO fotos_ideias (id_usuario,id_ideia,foto) VALUES ($idUsuario,$idIdeia,'$nome_atual')");

                                 }else{ echo "Falha ao enviar"; } 
                                }
                            }
                    }
                    
                    if(isset($_FILES['imagem']['name'])){
                        $nome_imagem = $_FILES['imagem']['name']; 
                        $tamanho_imagem = $_FILES['imagem']['size']; 
                        $tmp = $_FILES['imagem']['tmp_name']; 
                        salvaFotoBanco($nome_imagem , $tamanho_imagem , $tmp , $idIdeia,$ideia);
                    }

                    if(isset($_FILES['imagem2']['name'])){
                        $nome_imagem = $_FILES['imagem2']['name']; 
                        $tamanho_imagem = $_FILES['imagem2']['size']; 
                        $tmp = $_FILES['imagem2']['tmp_name']; 
                        salvaFotoBanco($nome_imagem , $tamanho_imagem , $tmp , $idIdeia,$ideia);
                    }

                    if(isset($_FILES['imagem3']['name'])){
                        $nome_imagem = $_FILES['imagem3']['name']; 
                        $tamanho_imagem = $_FILES['imagem3']['size']; 
                        $tmp = $_FILES['imagem3']['tmp_name']; 
                        salvaFotoBanco($nome_imagem , $tamanho_imagem , $tmp , $idIdeia,$ideia);
                    }

                    if(isset($_FILES['imagem4']['name'])){
                        $nome_imagem = $_FILES['imagem4']['name']; 
                        $tamanho_imagem = $_FILES['imagem4']['size']; 
                        $tmp = $_FILES['imagem4']['tmp_name'];
                        salvaFotoBanco($nome_imagem , $tamanho_imagem , $tmp , $idIdeia,$ideia); 
                    }
             }
                
            echo'<script>alert("Ideia cadastrada com sucesso");</script>';
            echo '<meta http-equiv="refresh" content="0;URL=../view/painel.php" />';

        }else{

            echo'<script>alert("Caracteres invalidos!");</script>';
            echo '<meta http-equiv="refresh" content="0;URL=../view/inserirIdeia.php" />';
        }
    }
?>
