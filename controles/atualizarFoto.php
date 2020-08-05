<?php
    session_start();

    if ((!isset($_SESSION['email']) == true) and ( !isset($_SESSION['senha']) == true)) {
        
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        echo '<meta http-equiv="refresh" content="0;URL=../view/login.php" />';
        
    } else {
        require_once("../modelo/conexao.php");

        $conexao = Conexao::getInstance();

        require_once('../classes/Cliente.class.php');

        $id = $_POST['id'];

        $imagem = 'semfoto.jpg';

        $cliente = new Cliente();

        $nome_atual = $cliente->getImagem();
        
        $nome_atual = $cliente->arrumaFoto();

        $resul = $conexao->query("update usuario set imagem = '$nome_atual' where id=$id;");

        echo "<script>alert('Imagem atualizada')</script>";
        echo '<meta http-equiv="refresh" content="0;URL=../view/painel.php" />';
    }
?>