<?php 

	require_once('../modelo/conexao.php');
	
	$pasta = "../fotosIdeias/"; /* formatos de imagem permitidos */
	$permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp" , ".mp4"); 
	$flag=0;

	if(isset($_POST)){ 
		
		if(isset($_FILES['imagem']['name'])){
			$nome_imagem = $_FILES['imagem']['name']; 
			$tamanho_imagem = $_FILES['imagem']['size']; 
			$tmp = $_FILES['imagem']['tmp_name']; 
			$flag=1;
		}else{

			if(isset($_FILES['imagem2']['name'])){
				$nome_imagem = $_FILES['imagem2']['name']; 
				$tamanho_imagem = $_FILES['imagem2']['size']; 
				$tmp = $_FILES['imagem2']['tmp_name']; 
				$flag=1;
			}else{

				if(isset($_FILES['imagem3']['name'])){
					$nome_imagem = $_FILES['imagem3']['name']; 
					$tamanho_imagem = $_FILES['imagem3']['size']; 
					$tmp = $_FILES['imagem3']['tmp_name']; 
					$flag=1;
				}else{
					if(isset($_FILES['imagem4']['name'])){
						$nome_imagem = $_FILES['imagem4']['name']; 
						$tamanho_imagem = $_FILES['imagem4']['size']; 
						$tmp = $_FILES['imagem4']['tmp_name']; 
						$flag=1;
					}
				}
			}
		}

	if($flag==1){

		$conexao = Conexao::getInstance();

		/* pega a extensão do arquivo */ 
				$ext = strtolower(strrchr($nome_imagem,".")); 
				/* verifica se a extensão está entre as extensões permitidas */ 
				if(in_array($ext,$permitidos)){ /* converte o tamanho para KB */ 
					$tamanho = round($tamanho_imagem / (1024)); 
					if($tamanho < (1024)){
			 //se imagem for até 1MB envia 
				//$nome_atual = md5(uniqid(time())).$ext; //nome que dará a imagem 
				$nome_atual = $nome_imagem;
				//caminho temporário da imagem /* se enviar a foto, insere o nome da foto no banco de dados */ 
				if(move_uploaded_file($tmp,$pasta.$nome_atual)){ 
					$conexao->query("INSERT INTO fotos_ideias (foto) VALUES ('$nome_atual')");
					echo "<img src='../fotosIdeias/".$nome_atual."' id='previsualizar'>";
					//echo $nome_atual; 
					//imprime a foto na tela
				 }else{ echo "Falha ao enviar"; } 
				}else{ echo "A imagem deve ser de no máximo 1MB"; } 
			}else{ echo "Somente são aceitos arquivos do tipo Imagem"; }
		}else{ //echo "Selecione uma imagem"; 
			exit; 
		} 

	}else{

		echo "Falha ao enviar arquivo!"; 
		exit;
	}

		?>

