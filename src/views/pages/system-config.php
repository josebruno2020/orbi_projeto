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
            <p><a href="<?=$base;?>/system-config/adicionar-contrato">Adicionar Pasta de Contrato</a></p>
        </div>
        <div class="row">
            <p><a href="<?=$base;?>/system-config/adicionar-proposta">Adicionar Pasta de Proposta</a></p>
        </div>
        <div class="row">
            <p><a href="<?=$base;?>/system-config/adicionar-documento">Adicionar Documento para um contrato</a></p>
        </div>
        <div class="row">
            <p><a href="<?=$base;?>/system-config/adicionar-hvi">Adicionar HVI</a></p>
        </div>
        <div class="row">
            <p><a href="<?=$base;?>/system-config/adicionar-nf">Adicionar NF para contrato</a></p>
        </div>
        <?php if($loggedUser->group == 'admin'): ?>
            <div class="row">
                <p><a href="<?=$base;?>/system-config/historic">Histórico de Acessos</a></p>
            </div>
        <?php endif; ?>

        <?php if($loggedUser->group == 'admin'): ?>
            <div class="row">
                <p><a href="<?=$base;?>/system-config/hvi">Análise de HVI</a></p>
            </div>
        <?php endif; ?>
            
            
       
    </div>
    

	
	<?=$render('footer');?>