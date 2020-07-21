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
		<div class="container-fluid">		
			<a href="<?=$base;?>/my">
				<div id="fundo-img" class="row"style="background-image:url(<?=$base;?>/assets/images/corretora.png);">
				</div>				
			</a>
		</div>

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="navbar-collapse collapse" id="navbarMenu">
					
				<div class="navbar-nav">
					
					<ul class="navbar-nav">
						<li class="nav-item">
							<a href="<?=$base;?>/my" class="nav-item nav-link <?=($activeMenu == 'my') ? 'active' : '';?> header-icon" title="Minha Página">
								<img src="<?=$base;?>/assets/images/my.png" width="30" height="30" class="header-icon">
								Minha Página
							</a>
						</li>
						
						<li class="nav-item">
							<a href="<?=$base;?>/contratos" class="nav-item nav-link <?=($activeMenu == 'contratos') ? 'active' : '';?> header-icon" title="Meus arquivos">
								<img src="<?=$base;?>/assets/images/paper.png" width="30" height="30" class="header-icon">
								Meus arquivos
							</a>
						</li>
						
						
						<li class="nav-item">
							<a href="<?=$base;?>/config"class="nav-item nav-link <?=($activeMenu == 'config') ? 'active' : '';?> header-icon"  title="Meus Dados">
								<img src="<?=$base;?>/assets/images/config.png" width="30" height="30" class="header-icon">
								Meus Dados
							</a>
						</li>
						
						<?php if($loggedUser->group == 'admin'
								||$loggedUser->group == 'employee'): ?>
						<li class="nav-item dropdown" id="dropdown">
							<a href="<?=$base;?>/system-config" class="nav-item dropdown nav-link dropdown-toggle <?=($activeMenu == 'system-config') ? 'active' : '';?> header-icon"  title="Configurações do Site">
								<img src="<?=$base;?>/assets/images/system-config.png" width="30" height="30" class="header-icon">
								Configurações do Site
							</a>
							<div id="dropdown-menu" class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="<?=$base;?>/system-config/user-list">Listar Usuários</a>
								<a class="dropdown-item" href="<?=$base;?>/system-config/cadastrar">Adicionar Usuário</a>
								<a class="dropdown-item" href="<?=$base;?>/system-config/adicionar-contrato">Adicionar Pasta de Contrato</a>
								<a class="dropdown-item" href="<?=$base;?>/system-config/adicionar-proposta">Adicionar Pasta de Proposta</a>
								<a class="dropdown-item" href="<?=$base;?>/system-config/adicionar-documento">Adicionar Documento</a>
								<a class="dropdown-item" href="<?=$base;?>/system-config/adicionar-hvi">Adicionar HVI</a>
								<a class="dropdown-item" href="<?=$base;?>/system-config/adicionar-planilha">Adicionar Planilha para contrato</a>
								<a class="dropdown-item" href="<?=$base;?>/system-config/radar">Adicionar Radar</a>
							</div>
						</li>
						<?php endif; ?>
						<li class="nav-item">
						<a href="<?=$base;?>/sair" class="nav-item nav-link header-icon" title="Sair" onclick="return confirm('Tem certeza que deseja sair?');">
							<img src="<?=$base;?>/assets/images/exit.png" width="30" height="30" class="header-icon">
							Sair
						</a>
					</ul>
					
					
				</div>
			</div>
			
		</nav>
	</header>