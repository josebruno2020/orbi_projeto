<?=$render('headerPage', [
    'activeMenu' => 'my',
    'loggedUser' => $loggedUser
]);?>
	
	<div class="container">
        <?=$render('userIcon', ['loggedUser' => $loggedUser]);?>

        <div class="row">
            <h2 id="title-my">Minha Página</h2>
        </div>
        </br>
        <div class="row" >
            <h4>Seja bem-vindo ao Sistema da Orbi Corretora, <font color="#4169E1"><?=$loggedUser->name;?></font>!</h4>
            </br>
            <p>-> Aqui você poderá acessar e acompanhar seus contratos e ofertas em tempo real na coluna <a href="<?=$base;?>/contratos">"Meus arquivos".</a></p>
            <p>-> É possível a qualquer momento mudar seus dados, inclusive a senha, na coluna <a href="<?=$base;?>/config">"Meus dados".</a></p></br> 
            <p>-> Pedimos por favor que sempre mantenha seus dados atualizados e qualquer dúvida pode entrar em contato conosco!</p>
        </div>
	</div>

	
	<?=$render('footer');?>