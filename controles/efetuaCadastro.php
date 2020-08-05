<?php
    
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

    require_once('../classes/Cliente.class.php');
    require_once('../modelo/ClienteDAO.class.php');

    $cliente = new Cliente();

    $imagem = 'semfoto.jpg';
    $cliente->setImagem('semfoto.jpg');    
    $nome_atual = $cliente->arrumaFoto();

    $cliente->setNomeCompleto($_POST['nome']);
    $cliente->setDataNascimento($_POST['datanascimento']);

    $arrumaData = explode("/", $cliente->getDataNascimento());
    $dataParaBancoMysql = $arrumaData[2] . '-' . $arrumaData[1] . '-' . $arrumaData[0];

    $cliente->setTelefoneCelular($_POST['celular']);
    $cliente->setTelefoneFixo($_POST['telfixo']);
    $cliente->setEmail($_POST['email']);

    $cliente->setConfirmaEmail($_POST['confirmaemail']);
    $cliente->setSenha(MD5($_POST['senha'])); // aqui é para encriptografar a senha e a confirmação da senha
    $cliente->setConfirmaSenha(MD5($_POST['confirmasenha']));

    $ClienteDAOValidaEmail = new ClienteDAO();

    $resultadoPegaEmail = $ClienteDAOValidaEmail->verificaEmailUsuario();

    $flag = false;

    // esse método valida se o email informado não existe ainda no banco 
    // se existir não permite o cadastro novamente para aquele email

    while ($a = $resultadoPegaEmail->fetch()) {

        if (strcmp($cliente->getEmail(), $a[0]) == 0) {
            $flag = true;
            break;
        } else {

            if (strcmp($cliente->getEmail(), $a[0]) == -1) {
                $flag = false;
            }
        }
    }

    if ($flag) {
        echo"<script>alert('Email já cadastrado!')</script>";
        echo '<meta http-equiv="refresh" content="0;URL=../view/login.php" />';
    }

    if (!$flag) {

        $nomeObjetoAtual = $cliente->getNomeCompleto();
        $telefoneCelularObjetoAtual = $cliente->getTelefoneCelular();
        $telefoneFixoObjetoAtual = $cliente->getTelefoneFixo();
        $emailObjetoAtual = $cliente->getEmail();
        $confirmacaoEmailObjetoAtual = $cliente->getConfirmaEmail();
        $senhaObjetoAtual = $cliente->getSenha();
        $confirmacaoSenhaObjetoAtual = $cliente->getConfirmaSenha();

        $flag_testa = verificaTags($cliente->getNomeCompleto());
        $flag_testa_2 = verificaTags($cliente->getSenha());
        $flag_testa_3 = verificaTags($cliente->getConfirmaSenha());

        if($flag_testa==true && $flag_testa_2==true && $flag_testa_3==true){
        
            $clienteDAO = new ClienteDAO();

            $clienteDAO->recebeParametrosECadastraUsuario($nomeObjetoAtual,$telefoneCelularObjetoAtual,$telefoneFixoObjetoAtual,
            $emailObjetoAtual, $confirmacaoEmailObjetoAtual, $senhaObjetoAtual, $confirmacaoSenhaObjetoAtual,
            $dataParaBancoMysql,$nome_atual); 

            $clienteDAO->insereUsuarioBanco();
            
            echo"<script>alert('Usuário cadastrado com sucesso!')</script>";
            echo '<meta http-equiv="refresh" content="0;URL=../view/login.php" />';

        }else{

            echo'<script>alert("Caracteres invalidos!");</script>';
            echo '<meta http-equiv="refresh" content="0;URL=../view/cadastro.php" />';
        }    
    }
    
?>