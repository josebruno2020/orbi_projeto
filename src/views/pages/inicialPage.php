<?=$render('headerPage', [
    'activeMenu' => 'my',
    'loggedUser' => $loggedUser
]);?>
	
	<div class="container">
        <?=$render('userIcon', ['loggedUser' => $loggedUser]);?>
	</div>

	
	<?=$render('footer');?>