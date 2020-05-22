<?=$render('headerPage', [
    'activeMenu' => 'system-config',
    'loggedUser' => $loggedUser
]);?>
	
	<div class="container">
        <?=$render('userIcon', ['loggedUser' => $loggedUser]);?>
        <div class="row">
            <h2>Configurações do Site<h2>
        </div>
        <div class="row" >
            <table class="table table-dark table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="50%">Função</th>
                        <th width="50%">Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <a href="<?=$base;?>/system-config/user-list">Listar Usuários</a>
                        </td>
                        <td>
                            Explicação
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="<?=$base;?>/system-config/cadastrar">Adicionar Usuário</a>
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="<?=$base;?>/system-config/adicionar-contrato">Adicionar Pasta de Contrato</a>
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="<?=$base;?>/system-config/adicionar-proposta">Adicionar Pasta de Proposta</a>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="<?=$base;?>/system-config/adicionar-documento">Adicionar Documento</a>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="<?=$base;?>/system-config/adicionar-hvi">Adicionar HVI</a>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="<?=$base;?>/system-config/adicionar-nf">Adicionar NF para contrato</a>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <?php if($loggedUser->group == 'admin'): ?>
                    <tr>
                        <td>
                            <a href="<?=$base;?>/system-config/historic">Histórico de Acessos</a>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php if($loggedUser->group == 'admin'): ?>
                    <tr>
                        <td>
                            <a href="<?=$base;?>/system-config/hvi">Análise de HVI</a>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <?php endif; ?>
                <tbody>
            </table>
        </div>
       
            
            
       
    </div>
    

	
	<?=$render('footer');?>