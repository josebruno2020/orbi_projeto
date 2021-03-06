<?=$render('header',[
    'activeMenu' => 'empresa'
]);?>
	<div class="container">
		<div class="row" style="padding-top: 20px;">
			<div class="col-sm">
				<p class="text-center"><h2>Onde estamos?</h2></p>
			</div>
			
		</div>
		<div class="row">
			<div class="col-sm" style="padding-top: 20px;">
				<br>
				<h4>Contato</h4>
				<strong>Escritório Central em Maringá:</strong><br><br>
				Fixo: (44) 3269 5369<br><br>
				Móvel: (44) 9 9943 9910<br><br>
				E-mail: <a href="mailto:orbibrasil@orbibrasil.com.br">orbibrasil@orbibrasil.com.br</a><br><br>

				<h4>ORBI Corretora de Mercadorias Ltda.</h4><br>

				Rua Santos Dumont, 2314 - Centro - Sala 901<br><br>

				CEP: 87013-050 <br><br>

				Maringá / PR (Brasil)<br><br>
				
			</div>
			<div class="col-sm">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3661.075068183291!2d-51.93749348505216!3d-23.421655284752454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ecd0d36a370f2b%3A0xff1618ec543501c4!2sR.%20Santos%20Dumont%2C%202314%20-%20Zona%2003%2C%20Maring%C3%A1%20-%20PR%2C%2087050-100!5e0!3m2!1ses!2sbr!4v1584451099453!5m2!1ses!2sbr" frameborder="0" style="border:0; width: 100%; height: 450px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			</div>
		</div>
		
        <br>
        <?=$render('flashMessage');?>
        <button id="btn-contato" class="btn btn-outline-primary btn-block" data-toggle="collapse" data-target="#contato">
			Não deixe de nos mandar uma Mensagem!
		</button>
        
		<?=$render('sendPost');?>
	</div>
	<?=$render('footer');?>