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
                <h2>Lista de Usuários</h2> 
            </p>
        </div>
        
    </div>
    <div class="row">
        <div class="col align-items-center">
            <?php if(!empty($flash)): ?>
                <button class="btn btn-info"><?=$flash;?></button>
            <?php endif;?>
            <table class="table table-dark table-striped table-bordered" >
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Grupo</th>
                        <?php if($loggedUser->group == 'admin'): ?>
                            <th scope="col">Ações</th>
                        <?php endif;?>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($userList as $user): ?>
                        <tr>
                            <td><?=$user['id'];?></td>
                            <td><a href="<?=$base;?>/system-config/config/<?=$user['id'];?>"> 
                                <?=$user['name'];?>
                            </a></td>
                            <td><?=$user['email'];?></td>
                            <td><?=ucfirst($user['group']);?></td>
                            <?php if($loggedUser->group == 'admin'): ?>
                                <td>
                                    <a href="<?=$base;?>/system-config/config/<?=$user['id'];?>" >
                                        <img src="<?=$base;?>/assets/images/add.png" class="img-fluid" width="30" height="30">
                                    </a>
                                    <a href="<?=$base;?>/system-config/excluir/<?=$user['id'];?>" onclick=" return confirm('Tem certeza que deseja excluir?')"  >
                                        <img src="<?=$base;?>/assets/images/del.png" class="img-fluid"  width="30" height="30" style="margin-left: 20px;">
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