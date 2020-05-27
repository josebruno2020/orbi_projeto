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
				<strong>ORBI Corretora de Mercadorias Ltda.</strong><br><br>

				Rua Santos Dumont, 2314 - Centro - Sala 901<br><br>

				CEP: 87013-050 <br><br>

				Maringá / PR (Brasil)<br><br>

				Fone/fax: +55 44 3269 5369<br><br>

				e-mail: <a href="mailto:orbibrasil@orbibrasil.com.br">orbibrasil@orbibrasil.com.br</a><br><br>
			</div>
			<div class="col-sm">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3661.075068183291!2d-51.93749348505216!3d-23.421655284752454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ecd0d36a370f2b%3A0xff1618ec543501c4!2sR.%20Santos%20Dumont%2C%202314%20-%20Zona%2003%2C%20Maring%C3%A1%20-%20PR%2C%2087050-100!5e0!3m2!1ses!2sbr!4v1584451099453!5m2!1ses!2sbr" frameborder="0" style="border:0; width: 100%; height: 450px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			</div>
		</div>
		<div class="row" style="margin-top: 20px;">
			<div class="col-sm">
			<p class="text-center"><h2>Equipe ORBI</h2></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm">
				<p class="text-center"><h5>João Celso - Diretor Gerente</h5></p>
				<p>Tim: (44) 9972-4009 </p>
				<p>Vivo: (44) 9132-1962 </p>
				<p><a href="mailto:jcelso@orbibrasil.com.br">jcelso@orbibrasil.com.br </a></p>
			</div>
			<div class="col-sm">
				<p class="text-center"><h5>Tânia - Gerente Comercial</h5></p>
				<p>Tim: (44) 9943-9910 </p>
				<p>Vivo: (44) 9135-4221  </p>
				<p><a href="mailto:tania@orbibrasil.com.br">tania@orbibrasil.com.br </a></p>
			</div>
			<div class="col-sm">
				<p class="text-center"><h5>Back-Office - Algodão e Fios:</h5></p>
				<p>Fone/Fax: (44) 3269-5369 </p>
				<p>Tim: (44) 9943-9910</p>
				<p><a href="mailto:orbibrasil@orbibrasil.com.br">orbibrasil@orbibrasil.com.br </a></p>
			</div>
		</div>
        <br>
        <?php if(!empty($flash)): ?>
            <button class="btn btn-info"><?=$flash;?></button>
        <?php  endif; ?>
        <button class="btn btn-outline-primary btn-block" data-toggle="collapse" data-target="#contato">Não deixe de nos mandar uma Mensagem!</button>
        
		<?=$render('sendPost');?>
	</div>
	<?=$render('footer');?>