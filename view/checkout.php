<?php   
        require('../classes/Caminho.class.php');

        $caminho = new Caminho();

        include($caminho->getCaminhoHeader());
        $conexao = Conexao::getInstance();
   ?>

	<?php 
		session_start();
	    if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)) { 
	        unset($_SESSION['email']); 
	        unset($_SESSION['senha']); 
	        echo $caminho->getCaminhoFimSessao(); // retorna para o login
	    } else{	

				$idIdeiaAPagar = $_GET['id_ideia'];

				// depois isso saira daqui , e a pessoa deverá pagar de verdade a ideia para visualizar a mesma

				$conexao->query("update ideiasusuarios set ideia_paga = 1 where idIdeia = $idIdeiaAPagar");
				
				echo "
					<form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post' >
					<input type='hidden' name='cmd' value='_cart'>
					<input type='hidden' name='business' value='AQQARKP33NVF6'>
					<input type='hidden' name='lc' value='BR'>
					<input type='hidden' name='item_name' value='Ideia'>
					<input type='hidden' name='amount' value='30.0'>
					<input type='hidden' name='currency_code' value='BRL'>
					<input type='hidden' name='button_subtype' value='products'>
					";

					echo '
					<input type="hidden" name="no_note" value="0">
					<input type="hidden" name="cn" value="Adicionar instruções especiais para o vendedor:">
					<input type="hidden" name="no_shipping" value="2">
					<input type="hidden" name="add" value="1">
					<input type="hidden" name="bn" value="PP-ShopCartBF:btn_cart_LG.gif:NonHosted">
					<input type="image" src="https://www.paypalobjects.com/pt_BR/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal - A maneira fácil e segura de enviar pagamentos online!">
					<img alt="" border="0" src="https://www.paypalobjects.com/pt_BR/i/scr/pixel.gif" width="1" height="1">
					</form>
				';
			}
?>