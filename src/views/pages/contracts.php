<?=$render('headerPage', [
    'activeMenu' => 'contratos',
    'loggedUser' => $loggedUser
]);?>
	
	<div class="container">
        <?=$render('userIcon', ['loggedUser' => $loggedUser]);?>
        <div class="row">
            <h2>Meus Contratos<h2>
        </div>
        <div class="row">
            <form method="GET" class="form-inline">
                <div  class="form-group">
                    <label for="state">Ordenar por:</label>
                    <select class="form-control" name="order" onchange="this.form.submit()">
                        <option value="name" <?= ($order == 'name')?'selected':''; ?>>Nome</option>
                        <option value="date" <?= ($order == 'date')?'selected':''; ?>>Data</option>
                    </select>
                </div>
            </form>
            <table class="table table-dark table-striped table-bordered" >
                <thead>
                    <tr>
                        <th scope="col">Data</th>
                        <th scope="col">Documento</th>
                        <th scope="col">Ações</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($contracts as $contract): ?>
                        <?php if($contract['id_user'] == $loggedUser->id):?>
                            <tr>
                                <td><?=$contract['date'];?></td>
                                <td>
                                    <a href="<?=$contract['link'];?>" target="_blank"><?=$contract['name'];?></a>
                                </td>
                                <?php if($loggedUser->group == 'admin'): ?>
                                    <td>
                                        <a href="<?=$base;?>/system-config/config/<?=$user['id'];?>" >
                                            <img src="<?=$base;?>/assets/images/edit.png" class="img-fluid" width="30" height="30" title="Editar">
                                        </a>
                                        <a href="<?=$base;?>/system-config/excluir/<?=$user['id'];?>" onclick=" return confirm('Tem certeza que deseja excluir?')"  >
                                            <img src="<?=$base;?>/assets/images/del.png" class="img-fluid"  width="30" height="30" style="margin-left: 20px;" title="Excluir">
                                        </a>
                                    </td>
                                <?php endif;?>
                            </tr>
                        <?php endif;?>
                    <?php endforeach;?>
                <tbody>
            </table>
        </div>
    </div>
    

	
	<?=$render('footer');?>