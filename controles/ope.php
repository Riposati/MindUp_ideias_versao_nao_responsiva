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

	session_start();

	if((isset($_POST['login'])) && (isset($_POST['senha']))){

		$email = $_POST['login']; 

		$senha = MD5($_POST['senha']); /// verifica os dados  

		$flag_testa = verificaTags($email);
		$flag_testa_2 = verificaTags($senha);

		if($flag_testa==true && $flag_testa_2==true){

			$j = strlen($email);

			$testa = false; /// aqui é pra validar contra injeção de SQL, testando aqui

			$rebentaBancoDados = "'";

			for($i=0;$i<$j;$i++){

				if(strcmp($email{$i},$rebentaBancoDados)==0){

					$testa = true;
				}
			}

			if(!$testa){

				require_once("../modelo/conexao.php");

				$conexao = Conexao::getInstance();

				$result = $conexao->query("SELECT * FROM usuario WHERE email = '$email' and senha = '$senha';");

				if($result->fetch() > 0 ) { /// se os dados informados pelo usuário forem corretos abre a sessão 

						$_SESSION['email'] = $email; 
						$_SESSION['senha'] = $senha; 

						echo '<meta http-equiv="refresh" content="0;URL=../view/painel.php" />';
						$_SESSION["sessiontime"] = time() + 300; /// pra validar tempo até a sessão expirar, caso o usuário 
						/// fique ocioso
					} 
					else{ 
						unset ($_SESSION['email']); 
						unset ($_SESSION['senha']);
						echo"<script>alert('Login incorreto')</script>"; /// se o login falhar com dados errados, por exemplo
						echo '<meta http-equiv="refresh" content="0;URL=../view/login.php" />'; 
					}

			}else{

				echo '<meta http-equiv="refresh" content="0;URL=../view/login.php" />'; // valida injeções SQL
			}
		}else{

			echo'<script>alert("Caracteres invalidos!");</script>';
            echo '<meta http-equiv="refresh" content="0;URL=../view/login.php" />';
		}
	}/// fim do if que verifica se a sessão foi aberta de forma correta 
	else{

		echo '<meta http-equiv="refresh" content="0;URL=../view/login.php" />';
	}

?>