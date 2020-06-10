<?=$render('headerPage', [
    'activeMenu' => 'system-config',
    'loggedUser' => $loggedUser
]);?>

<div class="container-sm">
    <div class="row">
        <div class="col-sm">
            <?=$render('userIcon', ['loggedUser' => $loggedUser]);?>
            <a href="<?=$base;?>/system-config" class="btn btn-info">Voltar</a>
            <p class="text-center">
                <h2>Histórico de Usuários</h2> 
            </p>
        </div>
        
    </div>
    <div class="row">
        <div class="col align-items-center">
            <form method="GET" class="form-inline" id="form-historic">
                <div  class="form-group">
                    
                    <label for="order">Ordenar por:</label>
                    <select class="form-control" name="order" onchange="this.form.submit()">
                        <option value="type" <?= ($order == 'type')?'selected':''; ?>>Tipo</option>
                        <option value="email_user" <?= ($order == 'email_user')?'selected':''; ?>>E-mail</option>
                        <option value="date" <?= ($order == 'date')?'selected':''; ?>>Data</option>
                        <option value="time" <?= ($order == 'time')?'selected':''; ?>>Hora</option>
                    </select>
                    
                    
                    <label for="filter">Filtro:</label>
                    <input class="form-control" id="filter-historic" name="filter" type="text">
                        
                    
                </div>
            </form>
            <table class="table table-dark table-striped table-bordered table-responsive" id="historic">
                <thead>
                    <tr>
                        <th scope="col" width="20%">Tipo</th>
                        <th scope="col" width="20%">E-mail</th>
                        <th scope="col" width="20%">Data</th>
                        <th scope="col" width="20%">Hora</th>
                        <?php if($loggedUser->group == 'admin'): ?>
                            <th scope="col" width="10%">Ações</th>
                        <?php endif;?>
                        <th scope="col" width="10%">IP</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($hist as $item): ?>
                        <tr>
                            <td><?=$item['type'];?></td>
                            <td><?=$item['email_user'];?></td>
                            <td><?=date('d/m/Y', strtotime($item['date']));?></td>
                            <td><?=date('H:i:s', strtotime($item['time']));?></td>
                            <?php if($loggedUser->group == 'admin'): ?>
                                <td>
                                    <a href="<?=$base;?>/system-config/historic/<?=$item['id'];?>/excluir" onclick=" return confirm('Tem certeza que deseja excluir?')"  >
                                        <img src="<?=$base;?>/assets/images/del.png" class="img-fluid"  width="30" height="30" style="margin-left: 20px;" title="Excluir">
                                    </a>
                                </td>
                            <td><?=$item['ip'];?></td>
                            <?php endif;?>
                        </tr>
                    <?php endforeach;?>
                <tbody>
            </table>
        </div>
        
    </div>
</div>






<?=$render('footer');?>