	<?php   
	        require('../classes/Caminho.class.php');

	        $caminho = new Caminho();

	        include($caminho->getCaminhoHeader());
	        include($caminho->getCaminhoTopo());
	        include($caminho->getCaminhoAbrirSessao());
	?>	

	<div id="localizaoSite">
		<div id="localizaoReduzido">
		  <span id="topo" class="fontDouradaTahoma">Você está em:</span><span class=""> &nbsp;Atualizar minhas ideias</span>
		</div>
	</div>
	<br><br>

	<?php
		  if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)) { 
	        unset($_SESSION['email']); 
	        unset($_SESSION['senha']); 
	       	echo $caminho->getCaminhoFimSessao(); // retorna para o login 
	    } else{

			$id = $_POST['idideia'];
			$ideia = $_POST['ideia'];
			$data = $_POST['data'];

			/* essa função serve para jogar a data que vem do banco pro padrão brasileiro */
			$arrumaData = explode("-",$data);
			$dataParaBancoMysql = $arrumaData[2].'/'.$arrumaData[1].'/'.$arrumaData[0];
			/*  ------------------------  */

			$categoria = $_POST['categoria'];
			$frase = $_POST['frase'];
			echo "

				<form action='../controles/updateIdeia.php' onsubmit='return validar();' method='POST'>

				<table border='0' style='text-align:justify'>
				<th colspan='2'>Id da ideia</th>
				<tr><td><input type='text' id='id' name='id' value='$id' disabled='true'></td></tr>
				<th colspan='2'>Ideia</th>
				<tr><td colspan='2' ><textarea id='ideia' name='ideia' maxlength='5000' placeholder='Do que se trata a ideia detalhe bem aqui'>$ideia</textarea></td></tr>
				<th colspan='2'>Data de inserção</th>
				<tr><td><input id='datepicker' name='datepicker' type='text' value='$dataParaBancoMysql'></td></tr>
				<th colspan='2'>Categoria</th>
				<tr><td> 
					<select id='categoriaSelect' name='categoriaSelect'>
						<option value='$categoria' selected='$categoria'>$categoria</option>
	                    <option value='vazio'></option>
	                    <option value='Ciências'>Ciências</option>
	                    <option value='Computação'>Computação</option>
	                    <option value='Indústria'>Indústria</option>
	                    <option value='Saúde'>Saúde</option>
	                    <option value='Educação'>Educação</option>
	                    <option value='Outros'>Outros</option>
	                </select>
	            </td></tr>

	            <th colspan='2'>Frase da Ideia</th>
				<tr><td><input type='text' id='frase' name='frase' value='$frase' size='50' maxlength='100'></td></tr>

				<tr><td><input style='margin-left:430px;width:120px;height:50px' type='submit' value='Atualizar Ideia'></td></tr>
				<input type='hidden' id='id' name='id' value='$id' />
				</table>
				</form>
			";

		}

	?>

	</table><br><br>
	<a href='#topo' class='topo'>Voltar ao topo</a><br><br><br>

	<?php 
         include($caminho->getCaminhoRodape());
    ?>