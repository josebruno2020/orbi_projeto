<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<link rel="stylesheet" type="text/css" href="<?=$base;?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=$base;?>/assets/css/style.css">
	<title>ORBI Corretora de Mercadorias</title>
</head>
<body>
	<header>
			<div class="row justify-content-end align-items-center" id="topo" >
				
			<ul class="list-inline">
				<a href="https://www.facebook.com/OrbiCotton/" target="blank"><img src="<?=$base;?>/assets/images/facebook.png" class="img-fluid face"></li></a>
				<a href="#" target="blank"><li class="list-inline-item"><img src="<?=$base;?>/assets/images/instagram.png" class="img-fluid face"></li></a>
				
			</ul>
				
		</div>
		<div class="row" id="title">
			<div class="media">
				<a href="<?=$base;?>"><img src="<?=$base;?>/assets/images/orbi.jpg" class="mr-3 logo"></a>
					
				<div class="media-body align-items-center">
					<p class="text-center"><h1>ORBI Corretora de Mercadorias</h1></p>
				</div>
			</div>
		</div>

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="navbar-collapse collapse" id="navbarMenu">
					
				<div class="navbar-nav">
					
                    <a href="<?=$base;?>" class="nav-item nav-link <?=($activeMenu == 'home') ? 'active' : '';?>" title="Home">
                        Home
                    </a>
					
					
                    <a href="<?=$base;?>/radar" class="nav-item nav-link <?=($activeMenu == 'radar') ? 'active' : '';?>" title="Radar ORBI">
                        Radar ORBI
                    </a>
					
					
                    <a href="<?=$base;?>/empresa"class="nav-item nav-link <?=($activeMenu == 'empresa') ? 'active' : '';?>"  title="Nossa Empresa">
                        Nossa Empresa
                    </a>
					
					
                    <a href="<?=$base;?>/cidade" class="nav-item nav-link <?=($activeMenu == 'cidade') ? 'active' : '';?>" title="Nossa Cidade">
                        Nossa Cidade
                    </a>

                    <a href="<?=$base;?>/login" class="nav-item nav-link <?=($activeMenu == 'login') ? 'active' : '';?>" title="Clientes">
                        Clientes
                    </a>
					
				</div>
			</div>
			<form method="POST" class="form-inline">
				<input type="text" name="pesquisa" class="form-control" placeholder="Pesquisar...">
			</form>
		</nav>
	</header>