<?php
    
    $flag= false;

    if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)) { 
        unset($_SESSION['email']); 
        unset($_SESSION['senha']); 
    } 
    else{

        if ( isset( $_SESSION["sessiontime"] ) ) {
            if ($_SESSION["sessiontime"] < time() ) { 
                session_unset();
                echo "<script>alert('Sua sessão expirou!')</script>";
                echo '<meta http-equiv="refresh" content="0;URL=../view/login.php" />';
            } else {

                $conexao = Conexao::getInstance();

                $logado = $_SESSION['email'];

                $resultado = $conexao->query("select nome from usuario where email = '$logado'");

                $nome = $resultado->fetch();

                echo"<div class='div_logout'>
                        <br>
                        <a href='../view/painel.php' class='logado'>Painel de ideias</a>
                        <a href='../controles/logout.php' class='logado'>Sair</a><br><br>
                    </div>
                ";

                // Se o usuário mantiver sua atividade na sessão o tempo vai sendo acrescentado
                $_SESSION["sessiontime"] = time() + 300;

                $flag = true;

            }
        } else { 
            session_unset();
            echo '<meta http-equiv="refresh" content="0;URL=../view/login.php" />';
        }
    }
?> 
