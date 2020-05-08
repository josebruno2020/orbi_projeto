<?=$render('header', [
    'activeMenu' => 'home'
]);?>
	
	<div class="container">

			<div id="slideShow" class="slide carousel">

				<ol class="carousel-indicators">
					<li data-target="#slideShow" data-slide-to="0" class="active"></li>
					<li data-target="#slideShow" data-slide-to="1"></li>
					<li data-target="#slideShow" data-slide-to="2"></li>
					<li data-target="#slideShow" data-slide-to="3"></li>
				</ol>

				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="algodao1.jpg" class="w-100">
					</div>
					<div class="carousel-item">
						<img src="algodao2.jpg" class="w-100">
					</div>
					<div class="carousel-item">
						<img src="algodao3.jpg" class="w-100">
					</div>
					<div class="carousel-item">
						<img src="algodao4.jpg" class="w-100">
					</div>
					
				</div>

				<a class="carousel-control-prev" href="#slideShow" data-slide="prev">
					<span class="carousel-control-prev-icon"></span>
				</a>
				<a class="carousel-control-next" href="#slideShow" data-slide="next">
					<span class="carousel-control-next-icon"></span>
				</a>
				
			</div>

			
		
		<section>
			<br>
			<div class="row" id="corpo">
				<div class="col-sm-2">
					<button class="btn btn-outline-success" data-toggle="modal" data-target="#modal1">Quer saber mais sobre o Algodão?</button>
					<div class="modal fade" id="modal1" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h4>Saiba mais sobre o algodão!</h4>
									<button class="close" data-dismiss="modal"><span>&times;</span></button>
								</div>
								<div class="modal-body">
									<h6>Algodão Nova Iorque (contrato Cotton#2)</h6>
									<font style="font-size: 15px;"><a href="http://www.barchart.com/commodityfutures/Cotton_2_Futures/CT" target="_blank">http://www.barchart.com/commodityfutures/Cotton_2_Futures/CTr</a></font>

									<h6>Bolsa de Cereais e Mercadorias de Maringá</h6>
									<font style="font-size: 15px;"><a href="http://www.bcmm.com.br" target="_blank">http://www.bcmm.com.br</a></font>

									<h6>ANEA</h6>
									<font style="font-size: 15px;"><a href="http://www.aneacotton.com.br/" target="_blank">http://www.aneacotton.com.br/</a></font>

									<h6>ABRAPA</h6>
									<font style="font-size: 15px;"><a href="http://www.abrapa.com.br/" target="_blank">http://www.abrapa.com.br/</a></font>

									<h6>Notícias Agrícolas</h6>
									<font style="font-size: 15px;"><a href="http://www.noticiasagricolas.com.br/" target="_blank">http://www.noticiasagricolas.com.br/</a></font>
								</div>
								<div class="modal-footer">
									<button class="btn btn-danger" data-dismiss="modal">Fechar</button>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				<div class="col">
					<h5>ORBI Corretora de Mercadorias</h5>
					<h6>Apresetação</h6>
					A ORBI está no mercado de algodão desde 1998, atuando na intermediações de negócios de algodão para o mercado interno brasileiro e para o mercado externo (exportação e importação). Seu diretor gerente, <strong>João Celso dos Santos*</strong>, atua no mercado algodoeiro desde 1981.

					Apresentando a nossos clientes oportunidades de bons negócios, queremos contribuir para que a cadeia textil brasileira seja cada vez mais competitiva.

					<p><h6>
					Para isso, com o apoio inestimável de nossos clientes, procuramos:
					</h6></p>
					<font color="blue">- Entender o mercado de algodão nos aspectos comercial, técnico e financeiro e em todos os elos da cadeia produtiva: produtores e cooperativas, beneficiadores, indústria textil, tradings, fornecedores de insumos e prestadores de serviço.</font><br>
					- Conhecer em detalhes as necessidades dos nossos clientes; propor novas alternativas, novos negócios, novas soluções.<br>
					<font color="blue">- Estabelecer relacionamentos duradouros transmitindo informações confiáveis.</font><br>				
					- Manter um "back-office" eficiente e comprometido, a partir da premissa de que o serviço é o nosso diferencial.
					
					<p>*Currículo disponí­vel em:<br>
					<a href="../Joao_celso/index.php" target="blank">João Celso dos Santos</a>
					</p>
					
				</div>

				
			</div>
			<div class="row justify-content-center">
				<div class="col">
					<img src="https://sites.google.com/a/orbibrasil.com.br/orbi/_/rsrc/1334146469346/corretora/Cottons.png?height=210&width=320" class="img-fluid direita img-thumbnail">
				</div>
				<div class="col">
					<img src="https://sites.google.com/a/orbibrasil.com.br/orbi/_/rsrc/1334146513476/corretora/Algod%C3%A3o%20colhido.png?height=221&width=320" class="img-fluid direita img-thumbnail">
				</div>
				<div class="col">
					<img src="https://sites.google.com/a/orbibrasil.com.br/orbi/_/rsrc/1334146621548/corretora/Tecelagem%20paquistanesa.jpg?height=236&width=320" class="img-fluid direita img-thumbnail">
				</div>

				
			</div>	
		</section>
		

        <br><br>
        <?php if(!empty($flash)): ?>
            <div class="flash"><?=$flash;?></div>
        <?php  endif; ?>
		<button class="btn btn-outline-primary btn-block" data-toggle="collapse" data-target="#contato">Entre em contato conosco!</button>
		
		<?=$render('sendPost');?>
		
			
		
	</div>

	
	<?=$render('footer');?>