	<?php
	
		include('../includes/header.php');
		include('../includes/topo.php'); 	
		include('../controles/abriusessao.php');
	?>

	<div id="localizaoSite">
			<div id="localizaoReduzido">
			    <span class="fontDouradaTahoma">Você está em:</span><span class=""> &nbsp;Negociação da Ideia</span>
			</div>
			</div>
	<br><br>

	<script>
		function validaPergunta(){
			if(document.getElementById("pergunta").value.length < 1){
				alert("você não informou a pergunta!");
				document.getElementById("pergunta").focus(); 
				return false;
			}else{
				return true;
			}
		}
	</script>

	<?php

		if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)) { 
	        unset($_SESSION['email']); 
	        unset($_SESSION['senha']);
	        echo '<meta http-equiv="refresh" content="0;URL=../view/login.php" />';
	    } else{

			$id_ideia = $_GET['id_ideia'];
			$autor = $_GET['usuario_autor'];
			$email = $_SESSION['email'];

			$conexao = Conexao::getInstance();

			$res = $conexao->query("select id from usuario where email='$email'");
			$valor = $res->fetch();
			
			//echo "id usuario interessado dessa ideia = " . $valor[0] . "<br>";

			$conexao->query("select pergunta,resposta,data_pergunta,data_resposta from perguntas_e_respostas_interessados where id_ideia=$id_ideia && id_interessado=$valor[0]");
			$result = $conexao->query("select id from usuario where email='$email'");
			$result2 = $conexao->query("select idusuarioautordaideia from usuariosinteressados where idideia=$id_ideia");

			$recebe_id_usuario_autor_da_ideia = $result2->fetch();

			//echo "id da pessoa autora da ideia = " . $recebe_id_usuario_autor_da_ideia[0]. "<br>";

			$res_recebe_imagem_autor_ideia = $conexao->query("select imagem from usuario where id=$recebe_id_usuario_autor_da_ideia[0]");

			$recebe_imagem_autor = $res_recebe_imagem_autor_ideia->fetch();

			$res_recebe_imagem_interessado_ideia = $conexao->query("select imagem from usuario where id=$valor[0]");

			$recebe_imagem_interessado = $res_recebe_imagem_interessado_ideia->fetch();

			echo "
				<h1>Negociação da ideia com o usuário <span class='fraseDaIdeiaSpan'>$autor</span></h1><br><br>";

				$resultado = $conexao->query("select pergunta,resposta,data_pergunta,data_resposta from perguntas_e_respostas_interessados where id_ideia=$id_ideia and id_interessado=$valor[0];");

				$flag=false;

				while($a = $resultado->fetch()){

					$flag=true;

					$arrumaData = explode("-",$a[2]);
					$dataParaBancoMysql = $arrumaData[2].'/'.$arrumaData[1].'/'.$arrumaData[0];

					$arrumaData2 = explode("-",$a[3]);
					$dataParaBancoMysql2 = $arrumaData2[2].'/'.$arrumaData2[1].'/'.$arrumaData2[0];
					echo "<p class='pergunta_negociacao'><img class='foto_perfil_usuario' src='../fotosUsuarios/$recebe_imagem_autor[0]' /> >> " . $a[0] . "<br><span style='float:right;'>Data de inserção " . $dataParaBancoMysql . "</span></p>";
					if(strcmp($a[1],"")!=0)
					echo "<p class='resposta_negociacao'><img class='foto_perfil_usuario' src='../fotosUsuarios/$recebe_imagem_interessado[0]' /> >> " . $a[1] . "<br><span style='float:right;'>Data de inserção " . $dataParaBancoMysql2 . "</span></p>";
					else{

						$pergunta = $a[0];

						echo "
							<h2>Negocie aqui essa ideia :</h2> <br>
							<form method='POST' name='formulario_negociacao' onsubmit='return validaPergunta()' action='../controles/guarda_resposta_negociacao.php'>
								<textarea maxlength='5000' id='resposta' name='resposta' class='area_texto_negociacao_ideias'></textarea><br><br>
								<input type='hidden' name='id_ideia' value='$id_ideia'>
								<input type='hidden' name='id_usuario_interessado' value='$valor[0]'>
								<input type='hidden' name='id_usuario_autor' value='$recebe_id_usuario_autor_da_ideia[0]'>
								<input type='hidden' name='autor' value='$autor'>
								<input type='hidden' name='pergunta' value='$a[0]'>
								<input type='submit' value='enviar'>
							 </form>
				 		";

					}
				}

				if(!$flag){

					echo "<h2>Não foi iniciada a negociação desta ideia pelo autor!</h2>";
				}
		}
	?>

	<br><br><a href='#topo' class='topo'></div>Voltar ao topo</a><br><br><br>

<?php include('../includes/rodape.php') ?>