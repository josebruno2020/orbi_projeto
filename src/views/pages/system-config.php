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
                            Todos os usuários poderão ser listados, podendo mudar as configurações de cada um, assim como o grupo ao qual cada um pertence. 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="<?=$base;?>/system-config/cadastrar">Adicionar Usuário</a>
                        </td>
                        <td>
                            Adicionar um usuário com o e-mail informado, lembrando que o e-mail não poderá ser trocado uma vez cadastrado.
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="<?=$base;?>/system-config/adicionar-contrato">Adicionar Pasta de Contrato</a>
                        </td>
                        <td>
                            Aqui adiciona uma Pasta de Contrato. Dentro dela será adicionado o próprio contrato, assim como os HVI e as Notas Fiscais.
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="<?=$base;?>/system-config/adicionar-proposta">Adicionar Pasta de Proposta</a>
                        </td>
                        <td>
                            Aqui adiciona uma Pasta de Proposta. Dentro dela será adicionado os HVIs correspondentes da Proposta.
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="<?=$base;?>/system-config/adicionar-documento">Adicionar Documento</a>
                        </td>
                        <td>
                            Aqui é adicionado o documento do contrato em si. Sempre em formato PDF para o sistema aceitar.
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="<?=$base;?>/system-config/adicionar-hvi">Adicionar HVI</a>
                        </td>
                        <td>
                            Aqui é adicionado os HVIs. Pode ser adicionado tanto para a pasta de um Contrato, quanto de uma proposta.
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="<?=$base;?>/system-config/adicionar-nf">Adicionar NF para contrato</a>
                        </td>
                        <td>
                            Aqui é adicionado uma Nota Fiscal para um contrato.
                        </td>
                    </tr>
                    <?php if($loggedUser->group == 'admin'): ?>
                    <tr>
                        <td>
                            <a href="<?=$base;?>/system-config/historic">Histórico de Acessos</a>
                        </td>
                        <td>
                            Mostra uma tabela com os acessos dos usuários, identificando cada um com o seu e-mail(que não pode ser mudado).
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="<?=$base;?>/system-config/radar">Adicionar Radar</a>
                        </td>
                        <td>
                            Adicionar o arquivo Radar que vai aparecer no site.
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php if($loggedUser->group == 'admin'): ?>
                    <tr>
                        <td>
                            <a href="<?=$base;?>/system-config/hvi">Análise de HVI</a>
                        </td>
                        <td>
                            Aqui será feito um sistema de Análise de HVI, para que ele informe a qual cliente ele apresenta características. (ainda em andamento).
                        </td>
                    </tr>
                    <?php endif; ?>
                <tbody>
            </table>
        </div>
       
            
            
       
    </div>
    

	
	<?=$render('footer');?>