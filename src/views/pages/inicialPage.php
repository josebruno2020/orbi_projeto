<?=$render('headerPage', [
    'activeMenu' => 'my',
    'loggedUser' => $loggedUser
]);?>
	
	<div class="container">
        <?=$render('userIcon', ['loggedUser' => $loggedUser]);?>

        <div class="row">
            <h2 id="title-my">Página Inicial</h2>
        </div>
        </br>
        <div class="row" >
            <h4>Seja bem-vindo ao Sistema da Orbi Corretora, <font color="#4169E1"><?=$loggedUser->name;?></font>!</h4>
            </br><br>
            <p>-> Aqui você poderá acessar e acompanhar seus contratos 
            <?php if($loggedUser->group != 'client2'): ?>e ofertas<?php endif;?>  
            na coluna <a href="<?=$base;?>/contratos">"Meus arquivos".</a></p>
            <p>-> Qualquer dúvida entre em contato conosco!</p>
        </div>
	</div>

	
	<?=$render('footer');?>