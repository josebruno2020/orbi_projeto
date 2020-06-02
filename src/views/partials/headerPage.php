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
					
                    <a href="<?=$base;?>/my" class="nav-item nav-link <?=($activeMenu == 'my') ? 'active' : '';?> header-icon" title="Minha Página">
                        <img src="<?=$base;?>/assets/images/my.png" width="30" height="30" class="header-icon">
                        Minha Página
                    </a>
					
					
					<a href="<?=$base;?>/contratos" class="nav-item nav-link <?=($activeMenu == 'contratos') ? 'active' : '';?> header-icon" title="Meus arquivos">
						<img src="<?=$base;?>/assets/images/paper.png" width="30" height="30" class="header-icon">
						Meus arquivos
					</a>
					
					
					
                    <a href="<?=$base;?>/config"class="nav-item nav-link <?=($activeMenu == 'config') ? 'active' : '';?> header-icon"  title="Meus Dados">
                        <img src="<?=$base;?>/assets/images/config.png" width="30" height="30" class="header-icon">
                        Meus Dados
					</a>
					
					<?php if($loggedUser->group != 'client'): ?>
						<a href="<?=$base;?>/system-config"class="nav-item nav-link <?=($activeMenu == 'system-config') ? 'active' : '';?> header-icon"  title="Configurações do Site">
							<img src="<?=$base;?>/assets/images/system-config.png" width="30" height="30" class="header-icon">
							Configurações do Site
						</a>
					<?php endif; ?>

                    <a href="<?=$base;?>/sair" class="nav-item nav-link header-icon" title="Sair">
                        <img src="<?=$base;?>/assets/images/exit.png" width="30" height="30" class="header-icon">
                        Sair
					</a>
					
				</div>
			</div>
			<form method="POST" class="form-inline">
				<input type="text" name="pesquisa" class="form-control" placeholder="Pesquisar...">
			</form>
		</nav>
	</header>