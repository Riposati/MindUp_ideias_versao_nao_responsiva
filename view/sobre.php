	
	 <?php   
        require('../classes/Caminho.class.php');

        $caminho = new Caminho();

        include($caminho->getCaminhoHeader());
        include($caminho->getCaminhoTopo());
        include($caminho->getCaminhoAbrirSessao());
     ?>
		<div id="localizaoSite">
	    	<div id="localizaoReduzido">
	        	<span class="fontDouradaTahoma">Você está em:</span><span class=""> &nbsp;Sobre</span>
	    	</div>
		</div>
		
		<br>
		<h2 class='fontTitulo20Preta'>O que é o Mind Up Ideias ?</h2>
		<br>
		<div id='explicaSobre'>
			<p>
                <span style='margin-left:30px;'>Bem</span> Vindo ao Mind Up, um sistema amigo de quem é apaixonado por inovação e tem vontade de mudar o mundo.

			</p>

            <p>
                <span style='margin-left:30px;'>Um </span> projeto que foi concebido apartir do estudante de analise de sistemas Gustavo, que é apaixonado por desenvolvimento de software
                e por coisas inovadoras que em um dia qualquer teve vontade de criar um sistema para que usuários cadastrassem suas ideias e as divulgasse para buscar interessados, investidores, sócios, etc. 
            </p>

            <p>
                <span style='margin-left:30px;'>O </span> que buscamos é proporcionar ao usuário uma experiencia fácil e ao mesmo tempo útil, um projeto que possibilita a divulgação das ideias cadastradas
                e que tem a intenção de ser um canal entre pessoas que possuem ideias e pessoas que querem investir em algo novo, legal e que pode mudar a vida das pessoas para melhor. Muitas vezes o usuário
                quer ser sócio em um projeto ou quer divulgar em busca de investimentos ou até mesmo sócios para seus projetos então o Mind é o lugar certo para esse tipo de usuário.
            </p>

            <p>
                <span style='margin-left:30px;'>O </span> sistema foi pensado para mostrar a todos novos projetos com o intuito de que eles realmente sejam 
                colocados em prática.
            </p>

            <p>
                <span style='margin-left:30px;'>O Mind </span> sempre está em constante evolução e sempre é melhorado para atender da melhor maneira possível suas necessidades 
                querido usuário. Caso você não encontrou o que buscava, sugira-nos, estamos prontos para sempre melhorar sua experiência.  
            </p>

		</div>
        <a href='#topo' class='topo'>Voltar ao topo</a><br><br><br>

	<?php 
         include($caminho->getCaminhoRodape());
    ?>