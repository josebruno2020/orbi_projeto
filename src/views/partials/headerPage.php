<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<link rel="stylesheet" type="text/css" href="<?=$base;?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=$base;?>/assets/css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
					
				<div class="navbar-nav ">
					
					<ul class="navbar-nav">
						<li class="nav-item">
							<a href="<?=$base;?>/my" class="nav-item nav-link <?=($activeMenu == 'my') ? 'active' : '';?> header-icon" title="Minha Página">
								<i class="far fa-user"></i>
								Minha Página
							</a>
						</li>
						
						<li class="nav-item">
							<?php if($loggedUser->group === 'admin' || $loggedUser->group === 'employee'): ?>

								<a href="<?=$base;?>/meus-contratos" class="nav-item nav-link <?=($activeMenu == 'contratos') ? 'active' : '';?> header-icon" title="Meus arquivos">
							<?php else:?>
								<a href="<?=$base;?>/meus-contratos/<?=$loggedUser->id;?>" class="nav-item nav-link <?=($activeMenu == 'contratos') ? 'active' : '';?> header-icon" title="Meus arquivos">

							<?php endif;?>
								<i class="far fa-folder"></i>
								Meus contratos
							</a>
						</li>
						<?php if($loggedUser->group != 'client2'):?>
							<li class="nav-item">
							<?php if($loggedUser->group === 'admin' || $loggedUser->group === 'employee'): ?>

								<a href="<?=$base;?>/propostas" class="nav-item nav-link <?=($activeMenu == 'propostas') ? 'active' : '';?> header-icon" title="Meus arquivos">
									<i class="far fa-folder-open"></i>
									Minhas propostas
								</a>
							<?php else:?>
								<a href="<?=$base;?>/minhas-propostas/<?=$loggedUser->id;?>" class="nav-item nav-link <?=($activeMenu == 'propostas') ? 'active' : '';?> header-icon" title="Minhas propostas">
									<i class="far fa-folder-open"></i>
									Minhas propostas
								</a>
							<?php endif;?>
							</li>
						<?php endif;?>
						
						
						<li class="nav-item">
							<a href="<?=$base;?>/meus-dados"class="nav-item nav-link <?=($activeMenu == 'config') ? 'active' : '';?> header-icon"  title="Meus Dados">
								<i class="far fa-edit"></i>
								Meus Dados
							</a>
						</li>
						
						<?php if($loggedUser->group == 'admin'
								||$loggedUser->group == 'employee'): ?>
						<li class="nav-item dropdown" id="dropdown">
							<a href="<?=$base;?>/system-config" class="nav-item dropdown nav-link dropdown-toggle <?=($activeMenu == 'system-config') ? 'active' : '';?> header-icon"  title="Configurações do Site">
								<i class="fas fa-tools"></i>
								Configurações do Site
							</a>
							<div id="dropdown-menu" class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="<?=$base;?>/listar-usuarios">Listar Usuários</a>
								<a class="dropdown-item" href="<?=$base;?>/cadastrar-novo-usuario">Adicionar Usuário</a>
								<a class="dropdown-item" href="<?=$base;?>/system-config/adicionar-contrato">Adicionar Pasta de Contrato</a>
								<a class="dropdown-item" href="<?=$base;?>/system-config/adicionar-proposta">Adicionar Pasta de Proposta</a>
								<a class="dropdown-item" href="<?=$base;?>/system-config/adicionar-documento">Adicionar Documento</a>
								<a class="dropdown-item" href="<?=$base;?>/system-config/adicionar-hvi">Adicionar HVI</a>
								<a class="dropdown-item" href="<?=$base;?>/system-config/adicionar-planilha">Adicionar Planilha para contrato</a>
								<a class="dropdown-item" href="<?=$base;?>/system-config/adicionar-nf">Adicionar Nota Fiscal para contrato</a>
								<a class="dropdown-item" href="<?=$base;?>/system-config/radar">Adicionar Radar</a>
							</div>
						</li>
						<?php endif; ?>
						<li class="nav-item">
						<a href="<?=$base;?>/sair" class="nav-item nav-link header-icon" title="Sair" onclick="return confirm('Tem certeza que deseja sair?');">
							<i class="fas fa-sign-out-alt"></i>
							Sair
						</a>
					</ul>
					
					
				</div>
			</div>
			
		</nav>
	</header>