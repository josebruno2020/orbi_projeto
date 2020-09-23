<?=$render('header', [
    'activeMenu' => 'radar'
]);?>
	<div class="container" style="margin-top: 15px;">
		<div class="row">
			<div class="col-sm">
				<img src="<?=$base;?>/assets/images/radar_logo.png" class="img-fluid">
			</div>
			
			<div class="col-sm">
				<p class="text-center"><h2>Radar Orbi - Newsletter</h2></p>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<p class="text-justify" style="padding-top: 20px;"><strong>RADAR ORBI</strong> é um serviço de informações semanais sobre o mercado de algodão no seu e-mail!</p>
				<p>Inscreva-se mandando um e-mail para: 
					<a href="mailto:radar@orbibrasil.com.br" >radar@orbibrasil.com.br</a>, ou <strong>cadastre-se no campo abaixo:</strong> 
				
				</p>
			</div>
			
		</div>
		
		<form action="<?=$base;?>/radarAction" method="post" class="form-inline" id="form-radar">
			<?=$render('flashMessage');?>
			<div class="form-group">
				<input type="email" name="email" placeholder="E-mail" required class="form-control">
				<input type="submit" value="Cadastre-se!" class="btn btn-success">
			</div>
			
		</form>
		
		<div class="row">
			<div class="col">
				<br>
				<p><strong>Último Radar para ser baixado! Confira!</strong> </p>
				<a href="<?=$base;?>/media/radar/<?=$radar->name_server;?>" download><?=$radar->name;?>
				</a>
			</div>
			
		</div>
		
	
	</div>


<?=$render('footer');?>