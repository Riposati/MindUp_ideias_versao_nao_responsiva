<?php
	
	class Cliente{

		private $imagem;
		private $nomeCompleto;
		private $dataNascimento;
		private $telefoneCelular;
		private $telefoneFixo;
		private $email;
		private $confirmaEmail;
		private $senha;
		private $confirmaSenha;
		private $investimento;

		public function __construct(){

		}

		public function setImagem($imagem){

			$this->imagem = $imagem;
		}

		public function getImagem(){

			return $this->imagem;
		}

		public function arrumaFoto(){
			$nome_atual = $this->getImagem();
		    $pasta = "../fotosUsuarios/";

		    /* formatos de imagem permitidos */
		    $permitidos = array(".jpg", ".jpeg", ".gif", ".png", ".bmp");

		    if (isset($_POST)) {
		        $nome_imagem = $_FILES['imagem']['name'];
		        $tamanho_imagem = $_FILES['imagem']['size'];
		        /* pega a extensão do arquivo */
		        $ext = strtolower(strrchr($nome_imagem, "."));
		        /* verifica se a extensão está entre as extensões permitidas */
		        if (in_array($ext, $permitidos)) {
		            /* converte o tamanho para KB */
		            $tamanho = round($tamanho_imagem / (1024 * 10));
		            if ($tamanho < 1024 * 10) {
		                //se imagem for até 1MB envia 
		                $nome_atual = md5(uniqid(time())) . $ext;
		                //nome que dará a imagem 
		                $tmp = $_FILES['imagem']['tmp_name'];
		                //caminho temporário da imagem /* se enviar a foto, insere o nome da foto no banco de dados */ 
		                if (move_uploaded_file($tmp, $pasta . $nome_atual)) {
		                    //mysqli_query($conexao,"INSERT INTO usuario (imagem) VALUES (".$nome_atual.")"); 
		                    //echo "<img src='fotos/".$nome_atual."' id='previsualizar'>"; 
		                    //imprime a foto na tela 
                		}
            		}
		        }
		    }

		    return $nome_atual;

		}


		public function setNomeCompleto($nomeCompleto){

			$this->nomeCompleto = $nomeCompleto;

		}

		public function getNomeCompleto(){

			return $this->nomeCompleto;
		}

		public function setDataNascimento($dataNascimento){

			$this->dataNascimento = $dataNascimento;

		}

		public function getDataNascimento(){

			return $this->dataNascimento;
		}

		public function setTelefoneCelular($telefoneCelular){

			$this->telefoneCelular = $telefoneCelular;

		}

		public function getTelefoneCelular(){

			return $this->telefoneCelular;
		}

		public function setTelefoneFixo($telefoneFixo){

			$this->telefoneFixo = $telefoneFixo;

		}

		public function getTelefoneFixo(){

			return $this->telefoneFixo;
		}

		public function setEmail($email){

			$this->email = $email;

		}

		public function getEmail(){

			return $this->email;
		}


		public function setConfirmaEmail($confirmaEmail){

			$this->confirmaEmail = $confirmaEmail;

		}

		public function getConfirmaEmail(){

			return $this->confirmaEmail;
		}


		public function setSenha($senha){

			$this->senha = $senha;

		}

		public function getSenha(){

			return $this->senha;
		}


		public function setConfirmaSenha($confirmaSenha){

			$this->confirmaSenha = $confirmaSenha;

		}

		public function getConfirmaSenha(){

			return $this->confirmaSenha;
		}

		public function setInvestimento($investimento){

			$this->investimento = $investimento;

		}

		public function getInvestimento(){

			return $this->investimento;
		}

		public function mostraObjeto(){
			echo "nome deste objeto = " . $this->nomeCompleto . "<br>";
			echo "email deste objeto = " . $this->email . "<br>";
		}

		public function verificaSeJaExisteIdeiaComInteressado($conexao,$id,$nomeusuariointeressado){

                /*------ esse trecho serve para validar se já existe interessado nessa ideia e não deixa repetir  ----- */

                /* aqui é a parte que verifica se o idIdeia já existe */

                $resultado = $conexao->query("select idideia from usuariosinteressados");
                $flag=false;
                $a = array("");
                $b = array("");
                $i=0;

                while($array_recebe_idIdeias_tabela_interessados = $resultado->fetch()){
                    //echo $array_recebe_idIdeias_tabela_interessados[0];
                    $a[$i] = $array_recebe_idIdeias_tabela_interessados[0];
                    $i++;
                }

                /* aqui é a parte que verifica se o nome já existe tb */

                $resultado = $conexao->query("select nomeusuariointeressado from usuariosinteressados");
                $flag2=false;
                $i=0;

                while($array_recebe_nome_interessados_tabela_interessados = $resultado->fetch()){
                    $b[$i] = $array_recebe_nome_interessados_tabela_interessados[0];
                    $i++;
                }

               /* print_r($a);
                print_r($b);*/

                for($i=0;$i<count($a);$i++){
                    if($a[$i]==$id && strcmp($b[$i],$nomeusuariointeressado)==0){
                            $flag=true;
                            $flag2=true;
                            break;
                    }
                }

	             if(!$flag && !$flag2){
	              	return true;
	              }else{

	              	return false;
	              }

			}
	}

?>