<?=$render('headerPage', [
    'activeMenu' => 'system-config',
    'loggedUser' => $loggedUser
]);?>
	
	<div class="container">
        <?=$render('userIcon', ['loggedUser' => $loggedUser]);?>
        <div class="row">
            <h2>Configurações do Site<h2>
        </div>
        <div class="row">
            <p><a href="<?=$base;?>/system-config/user-list">Listar Usuários</a></p>
        </div>
        <div class="row">
            <p><a href="<?=$base;?>/system-config/cadastrar">Adicionar Usuário</a></p>
        </div>
        <div class="row">
            <p><a href="<?=$base;?>/system-config/historic">Histórico de Acessos</a></p>
        </div>
            
            
       
    </div>
    

	
	<?=$render('footer');?>