	
	 <?php   
        require('../classes/Caminho.class.php');

        $caminho = new Caminho();

        include($caminho->getCaminhoHeader());
        include($caminho->getCaminhoTopo());
        include($caminho->getCaminhoAbrirSessao());
     ?>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>

        <script>
          $(function() {
            $( "#accordion" ).accordion({
              collapsible: true
            });
          });
        </script>

		<div id="localizaoSite">
	    	<div id="localizaoReduzido">
	        	<span class="fontDouradaTahoma">Você está em:</span><span class=""> &nbsp;Como registrar e patentiar ideias</span>
	    	</div>
		</div>
		
		<br>
            <h1 class='headerEspecial'>Tenho uma ideia maneira mas e agora como prosseguir ?</h1>
            <br>

            <h2>Abaixo segue uma explicação básica extraída do site do INPI </h2><br><br>

            <div class="conteudoRegistroIdeias">
            <div id="accordion">
                <h3>1 – O que é patente?</h3>
                <div class="tamanho_divs_acordiao_registro_pequeno">
                    <p>
                        Patente é um título de propriedade temporária sobre uma invenção ou 
                        modelo de utilidade, outorgado pelo Estado aos inventores ou autores
                        ou outras pessoas físicas ou jurídicas detentoras de direitos sobre
                        a criação. Com este direito, o inventor ou o detentor da patente tem
                        o direito de impedir terceiros, sem o seu consentimento, de produzir,
                        usar, colocar a venda, vender ou importar produto objeto de sua patente
                        e/ ou processo ou produto obtido diretamente por processo por ele 
                        patenteado.Em contrapartida, o inventor se obriga a revelar detalhadamente
                        todo o conteúdo técnico da matéria protegida pela patente.
                    </p>
                </div>

                <h3>2 – Quais são os tipos de patentes e prazo de validade?</h3>
                <div>
                    <p>
                        <strong>Patente de Invenção (PI)</strong><br>
                        Produtos ou processos que atendam aos requisitos de atividade inventiva, novidade e aplicação industrial.
                        Sua validade é de 20 anos a partir da data do depósito.
                    </p>

                    <br>

                    <p>
                        <strong>Modelo de Utilidade (MU)</strong><br>
                        Objeto de uso prático, ou parte deste, suscetível de aplicação industrial
                        , que apresente nova forma ou disposição, envolvendo ato inventivo, 
                        que resulte em melhoria funcional no seu uso ou em sua fabricação.
                        Sua validade é de 15 anos a partir da data do depósito.
                    </p>

                    <br>

                    <p>
                        <strong>Certificado de Adição de Invenção (C)</strong><br>
                        Aperfeiçoamento ou desenvolvimento introduzido no objeto da invenção,
                        mesmo que destituído de atividade inventiva, porém ainda dentro do 
                        mesmo conceito inventivo.O certificado será acessório à patente e com
                        mesma data final de vigência desta.
                    </p>

                    <br>

                </div>

                <h3>3 – Posso patentear uma idéia?</h3>
                <div class="tamanho_divs_acordiao_registro_muito_pequeno">
                    <p>
                        Não. Em primeiro lugar, a Lei de Propriedade Industrial (LPI) exclui de proteção 
                        como invenção e como modelo de utilidade uma série de ações, criações, idéias abstratas, 
                        atividades intelectuais, descobertas científicas, métodos ou inventos que não possam ser
                        industrializados. Algumas destas criações podem ser protegidas pelo Direito Autoral, 
                        que nada tem a ver com o INPI.
                    </p>
                </div>

                <h3>4 – O que não pode ser patenteado?</h3>
                <div>
                    <ol>
                        <li>técnicas cirúrgicas ou terapêuticas aplicadas sobre o corpo humano ou animal;</li><br>

                        <li>planos, esquemas ou técnicas comerciais de cálculos, de financiamento, de crédito, de sorteio, de especulação e propaganda;</li><br>

                        <li>planos de assistência médica, de seguros, esquema de descontos em lojas e também os métodos de ensino, regras de jogo, plantas de arquitetura;</li><br>

                        <li>obras de arte, músicas, livros e filmes, assim como apresentações de informações, tais como cartazes e etiquetas com o retrato do dono;</li><br>

                        <li>idéias abstratas, descobertas científicas, métodos matemáticos ou inventos que não possam ser industrializados;</li><br>

                        <li>o todo ou parte de seres vivos naturais e materiais biológicos encontrados na natureza, ou ainda que dela isolados, inclusive o genoma ou germoplasma
                         de qualquer ser vivo natural e os processos biológicos naturais.</li><br>
                    </ol>

                </div>

                <h3>5 – Como proteger uma invenção ou criação industrializável?</h3>
                <div class="tamanho_divs_acordiao_registro_muito_pequeno">
                    <p>
                        Deve-se procurar o INPI para proteger o invento. A Patente é o instrumento correto para isso. 
                        É necessário depositar um pedido no INPI o qual, depois de devidamente analisado, poderá se tornar uma Patente,com validade em todo o território nacional.
                    </p>
                </div>

                <h3>6 - Visite o site do INPI (Instituto Nacional da Propriedade Industrial) para mais, abaixo segue o link</h3>
                <div class="tamanho_divs_acordiao_registro_muito_pequeno">
                    <p>
                        <a href="http://www.inpi.gov.br/portal/acessoainformacao/artigo/patente_1351691647905#1" target="_blank"><strong>Para mais detalhes clique aqui</strong></a>
                    </p>
                </div>

            </div>
        </div>

        <div class="div_mostra_parceiros_registro_ideias">
                <h3>Parceiros</h3><br>
                <p>
                    Em breve teremos links com parceiros do Mind Up Ideias para
                    te auxiliar neste processo de registro de patentes, querido 
                    usuário. Aguarde...
                </p>
        </div>
        
        <br>

        <a href='#topo' class='topo'>Voltar ao topo</a><br><br><br>

	<?php 
         include($caminho->getCaminhoRodape());
    ?>