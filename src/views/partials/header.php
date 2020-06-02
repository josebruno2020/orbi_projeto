<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<link rel="stylesheet" type="text/css" href="<?=$base;?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=$base;?>/assets/css/style.css">
	<title>ORBI Corretora de Mercadorias</title>
	<link rel="shortcut icon" href="<?=$base;?>/assets/images/orbi.png">
</head>
<body>
	<header>
			<div class="row justify-content-end align-items-center" id="topo" >
				
			<ul class="list-inline">
				<a href="https://www.facebook.com/OrbiCotton/" target="blank"><img src="<?=$base;?>/assets/images/facebook.png" class="img-fluid face"></li></a>
				
			</ul>
				
		</div>
		<div class="row" id="title">
			<div class="col-sm">
				<a href="<?=$base;?>"><img src="<?=$base;?>/assets/images/orbi.jpg" class=" logo img-fluid"></a>
			</div>
			<div class="col-sm align-self-center">
				<h1 class="h1. Bootstrap heading">ORBI Corretora de Mercadorias</h1>
			</div>
				
			
		</div>

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="navbar-collapse collapse" id="navbarMenu">
					
				<div class="navbar-nav">
					
                    <a href="<?=$base;?>" class="nav-item nav-link <?=($activeMenu == 'home') ? 'active' : '';?> header-icon" title="Home">
						<img src="<?=$base;?>/assets/images/home.png" width="30" height="30" class="header-icon">
                        Home
                    </a>
					
					
                    <a href="<?=$base;?>/radar" class="nav-item nav-link <?=($activeMenu == 'radar') ? 'active' : '';?> header-icon" title="Radar ORBI">
						<img src="<?=$base;?>/assets/images/radar.png" width="30" height="30" class="header-icon">
                        Radar ORBI
                    </a>
					
					
                    <a href="<?=$base;?>/empresa"class="nav-item nav-link <?=($activeMenu == 'empresa') ? 'active' : '';?> header-icon"  title="Nossa Empresa">
						<img src="<?=$base;?>/assets/images/cotton.png" width="30" height="30" class="header-icon">
                        Nossa Empresa
                    </a>
					
					
                    <a href="<?=$base;?>/cidade" class="nav-item nav-link <?=($activeMenu == 'cidade') ? 'active' : '';?> header-icon" title="Nossa Cidade">
						<img src="<?=$base;?>/assets/images/building.png" width="30" height="30" class="header-icon">
                        Nossa Cidade
                    </a>

                    <a href="<?=$base;?>/login" class="nav-item nav-link <?=($activeMenu == 'login') ? 'active' : '';?> header-icon" title="Clientes">
						<img src="<?=$base;?>/assets/images/client.png" width="30" height="30" class="header-icon">
                        Clientes
                    </a>
					
				</div>
			</div>
			
		</nav>
	</header>