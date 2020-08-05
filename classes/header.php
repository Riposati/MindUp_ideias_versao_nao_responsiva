<?php
    include('includes/../parametros.php');
    require_once("../modelo/conexao.php");

    $tituloPagina = ' ';

    $descricaoSite = '';

    $tituloPagina = "Mind Up Ideias";

    $nomePagina = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);

    $globalMenuAtivo = '';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8 /"/>
        <meta name="resource-type" content="document" />
        <meta http-equiv="pragma" content="no-cache" />
        <meta name="revisit-after" content="1 days" />
        <meta name="classification" content="Internet" />
        <meta name="description" content="<?= $descricaoSite ?>">
            <meta name="keywords" content="">
                <meta name="robots" content="ALL" />
                <meta name="distribution" content="Global" />
                <meta name="rating" content="General" />
                <meta name="author" content="Gustavo Riposati" />
                <meta name="language" content="pt-br" />
                <meta name="doc-class" content="Completed" />
                <meta name="Copyright" content="Copyright (c) <?= _NOME_EMPRESA ?>"  />
                <title><?= $tituloPagina ?></title>
                <link rel="stylesheet" href="../css/site.css" />
                <script src="../js/jquery.js"></script>
                </script><script type="text/javascript" src="../js/source/jquery.fancybox.js?v=2.1.5"></script>
                <link rel="stylesheet" type="text/css" href="../js/source/jquery.fancybox.css?v=2.1.5" media="screen" />
                <script type="text/javascript" src="../js/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
                <script type="text/javascript" src="../js/jquery-easing-1.3.pack.js"></script>
                <script type="text/javascript" src="../js/jquery-easing-compatibility.1.2.pack.js"></script>
                <script type="text/javascript" src="../js/menuOpcoesPainelIdeias.js"></script>
                <script type="text/javascript" src="../js/menuOpcoesPainelIdeias2.js"></script>
                <script type="text/javascript" src="../js/scriptFancyBox.js"></script>
                <script type="text/javascript" src="js/menuOpcoesPainelIdeias.js"></script>
                <script type="text/javascript" src="js/menuOpcoesPainelIdeias2.js"></script>
                <script src="../js/jquery.maskedinput.js" type="text/javascript"></script>
                <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
                <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
                <script src="../js/validarinserirIdeia.js"></script>
                <script src="../js/formata_data_portugues.js"></script>
                 
                </head>