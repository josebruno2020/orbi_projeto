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
            <form method="GET" class="form-inline">
                <div  class="form-group">
                    <label for="state">Ordenar por:</label>
                    <select class="form-control" name="order" onchange="this.form.submit()">
                        <option value="type" <?= ($order == 'type')?'selected':''; ?>>Tipo</option>
                        <option value="email_user" <?= ($order == 'email_user')?'selected':''; ?>>E-mail</option>
                        <option value="date" <?= ($order == 'date')?'selected':''; ?>>Data</option>
                        <option value="time" <?= ($order == 'time')?'selected':''; ?>>Hora</option>
                    </select>
                </div>
            </form>
            <table class="table table-dark table-striped table-bordered" >
                <thead>
                    <tr>
                        <th scope="col">Tipo</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Data</th>
                        <th scope="col">Hora</th>
                        <?php if($loggedUser->group == 'admin'): ?>
                            <th scope="col">Ações</th>
                        <?php endif;?>
                        
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
                            <?php endif;?>
                        </tr>
                    <?php endforeach;?>
                <tbody>
            </table>
            
        </div>
        
    </div>
</div>






<?=$render('footer');?>