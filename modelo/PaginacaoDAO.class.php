<?php
	
	require_once('../modelo/conexao.php');

	class PaginacaoDAO{

		public function getPaginacaoCiencias($tipo){

			$conexao = Conexao::getInstance();

			$offset = is_numeric($_POST['offset']) ? $_POST['offset'] : die();
			$postnumbers = is_numeric($_POST['number']) ? $_POST['number'] : die();

			if(strcmp($tipo,"ciências")==0){

				$run = $conexao->query("SELECT * FROM ideiasusuarios where categoria='ciências' and ideia_paga=1 order by avaliacao desc LIMIT " .$postnumbers." OFFSET ".$offset);
				return $run;
			}

			if(strcmp($tipo,"computação")==0){

				$run = $conexao->query("SELECT * FROM ideiasusuarios where categoria='computação' and ideia_paga=1 order by avaliacao desc LIMIT " .$postnumbers." OFFSET ".$offset);
				return $run;
			}

			if(strcmp($tipo,"indústria")==0){

				$run = $conexao->query("SELECT * FROM ideiasusuarios where categoria='indústria' and ideia_paga=1 order by avaliacao desc LIMIT " .$postnumbers." OFFSET ".$offset);
				return $run;
			}

			if(strcmp($tipo,"saúde")==0){

				$run = $conexao->query("SELECT * FROM ideiasusuarios where categoria='saúde' and ideia_paga=1 order by avaliacao desc LIMIT " .$postnumbers." OFFSET ".$offset);				
				return $run;
			}

			if(strcmp($tipo,"educação")==0){

				$run = $conexao->query("SELECT * FROM ideiasusuarios where categoria='educação' and ideia_paga=1 order by avaliacao desc LIMIT " .$postnumbers." OFFSET ".$offset);
				return $run;
			}

			if(strcmp($tipo,"outros")==0){

				$run = $conexao->query("SELECT * FROM ideiasusuarios where categoria='outros' and ideia_paga=1 order by avaliacao desc LIMIT " .$postnumbers." OFFSET ".$offset);	
				return $run;
			}
		}
	}
?>