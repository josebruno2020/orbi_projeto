<?=$render('headerPage', [
    'activeMenu' => 'system-config',
    'loggedUser' => $loggedUser
]);?>

<div class="container">
    <div class="row">
        <div class="col-sm">
            <?=$render('userIcon', ['loggedUser' => $loggedUser]);?>
            <a href="<?=$base;?>/system-config" class="btn btn-info">Voltar</a>
            <p class="text-center">
                <h2>Lista de Usuários</h2> 
            </p>
        </div>
        
    </div>
    <div class="row">
        <div class="col align-items-center">
            <form method="GET" class="form-inline">
                <div  class="form-group">
                    <label for="state">Ordenar por:</label>
                    <select class="form-control" name="order" onchange="this.form.submit()">
                        <option value="id" <?= ($order == 'id')?'selected':''; ?>>Id</option>
                        <option value="email" <?= ($order == 'email')?'selected':''; ?>>E-mail</option>
                        <option value="group" <?= ($order == 'group')?'selected':''; ?>>Grupo</option>
                    </select>
                </div>
            </form>
            <table class="table table-dark table-striped table-bordered table-responsive" >
                <thead>
                    <tr>
                        <th scope="col" width="10%">Id</th>
                        <th scope="col" width="30%">Nome</th>
                        <th scope="col" width="30%">E-mail</th>
                        <th scope="col" width="20%">Grupo</th>
                        <?php if($loggedUser->group == 'admin'): ?>
                            <th scope="col" width="10%">Ações</th>
                        <?php endif;?>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($userList as $user): ?>
                        <tr>
                            <td><?=$user['id'];?></td>
                            <td>
                            <?php if($loggedUser->group == 'admin'):?>
                            <a href="<?=$base;?>/system-config/config/<?=$user['id'];?>"> 
                            <?php endif;?>
                                <?=$user['name'];?>
                            </a></td>
                            <td><?=$user['email'];?></td>
                            <td><?=ucfirst($user['group']);?></td>
                            <?php if($loggedUser->group == 'admin'): ?>
                                <td>
                                    <a href="<?=$base;?>/system-config/config/<?=$user['id'];?>" >
                                        <img src="<?=$base;?>/assets/images/edit.png" class="img-fluid" width="30" height="30" title="Editar">
                                    </a>
                                    <a href="<?=$base;?>/system-config/excluir/<?=$user['id'];?>" onclick=" return confirm('Tem certeza que deseja excluir este usuário permanentemente?')"  >
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