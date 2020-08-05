    <?php include('../includes/header.php') ?>
    <?php include('../includes/topo.php') ?>	
    <?php include('../controles/abriusessao.php') ?>

    <script src="js/jquery.maskedinput.js" type="text/javascript"></script>
    <script>
        /// algoritmo das mascaras necessárias 
        $(document).ready(function () {

            $("#datanascimento").mask("99/99/9999");
            $("#celular").mask("(99) 9999-9999");
            $("#telfixo").mask("(99) 9999-9999");
            $("#cpf").mask("999.999.999-99");

        });
    </script>

    <script type='text/javascript'>

        function validaEmail(email) {
            var email = $("#email").val();
            if (email != "")
            {
                var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                if (filtro.test(email))
                {
                    return true;
                } else {
                    return false;
                }
            }

        }

        function validaCampos() {

            if ($('#nome').val() == '') {
                alert("O nome não pode ficar vazio");
                $('#nome').focus();
                return false;
            } else {
                var var_name = $("input[name='selecao']:checked").val();

                if ($('#datanascimento').val() == '') {
                    alert("A data de nascimento não pode ficar vazia");
                    $('#datanascimento').focus();
                    return false;
                } else {

                    if ($('#celular').val() == '') {
                        alert("O celular não pode ficar vazio");
                        $('#celular').focus();
                        return false;
                    } else {

                        if ($('#email').val() == '' || validaEmail($('#email').val()) == false) {
                            alert("email inválido");
                            $('#email').focus();
                            return false;
                        } else {
                            return true;              
                     }
                }
            }
        }
    }
    </script>

    <div id="localizaoSite">
        <div id="localizaoReduzido">
            <span class="fontDouradaTahoma">Você está em:</span><span class=""> &nbsp;Editar Perfil</span>
        </div>
    </div>
    <br><br>

    <?php

        if ((!isset($_SESSION['email']) == true) and ( !isset($_SESSION['senha']) == true)) {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            echo '<meta http-equiv="refresh" content="0;url=login.php">';
        } else {

            $conexao = Conexao::getInstance();

            $email = $_SESSION['email'];

            $res = $conexao->query("select * from usuario where email = '$email'");

            $a = $res->fetch();

            $id = $a[0];
            $imagem = $a[10];
            $nome = $a[1];

            $dataNascimento = $a[2];
            $telefone_fixo = $a[4];
            $telefone_celular = $a[3];

            $email = $a[6];
            $senha = $a[7];

            $investimento = $a[9];
            

            $arrumaData = explode("-", $dataNascimento);
            $dataParaBancoMysql = $arrumaData[2] . '/' . $arrumaData[1] . '/' . $arrumaData[0];

            echo "

        			<form enctype='multipart/form-data' action='../controles/updatePerfil.php' method='POST' onsubmit='return validaCampos()'>

        				<table border='0' style='text-align:justify'>

        				<th colspan='2'>Nome do usuário</th>
        				<tr><td><input type='text' id='nome' name='nome' value='$nome' size='50'></td></tr>

        				<th colspan='2'>Data de Nascimento</th>
        				<tr><td><input type='text' id='datanascimento' name='dataNascimento' value='$dataParaBancoMysql'></td></tr>

        				<th colspan='2'>Telefone Celular</th>
        				<tr><td><input type='text' id='celular' name='celular' value='$telefone_celular'></td></tr>

        				<th colspan='2'>Telefone Fixo</th>
        				<tr><td><input type='text' id='telfixo' name='telFixo' value='$telefone_fixo'></td></tr>

        				<th colspan='2'>Email</th>
        				<tr><td><input type='text' id='email' name='email' value='$email'></td></tr>

        				<th colspan='2'>Nova Senha</th>
        				<tr><td><input type='password' id='senha' name='senha' value=''></td></tr>

        				<input type='hidden' id='id' name='id' value='$id' />
        		";
        }
    ?>
    <tr><td><input style='margin-left:410px;width:140px;height:50px' type='submit' value='Atualizar Perfil'></td></tr>
    </table></form>
    <br><br><a href='#topo' class='topo'>Voltar ao topo</a><br><br><br>

    <?php include('../includes/rodape.php') ?>