<?php
//INICIALIZA A SESSÃO 
session_start();

//destroi a sessão

//DESTRÓI AS VARIÁVEIS 
unset ($_SESSION['email']); 
unset ($_SESSION['senha']);

//REDIRECIONA PARA o index
echo '<meta http-equiv="refresh" content="0;URL=../view/index.php" />'; 
?>