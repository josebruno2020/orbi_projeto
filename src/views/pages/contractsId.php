<?=$render('headerPage', [
    'activeMenu' => 'contratos',
    'loggedUser' => $loggedUser
]);?>
	
	<div class="container">
        <?=$render('userIcon', ['loggedUser' => $loggedUser]);?>
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
        </div>
        <div class="row">
            <h2>Contrato</h2>
        </div>
        <div class="row">
            <table class="table table-dark table-striped table-bordered" >
                <thead>
                    <tr>
                        <th scope="col">Data</th>
                        <th scope="col">Contrato nº</th>
                        <?php if($loggedUser->group == 'admin'): ?>
                            <th scope="col">Ações</th>
                        <?php endif;?>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $item): ?>
                            <tr>
                                <td><?=date('d/m/Y', strtotime($item['date']));?></td>
                                <td>
                                    <a href="<?=$item['link'];?>"><?=$item['name'];?>
                                    </a>
                                </td>
                                <?php if($loggedUser->group == 'admin'): ?>
                                    <td>
                                        <a href="<?=$base;?>/system-config/config/<?=$item['id'];?>" >
                                            <img src="<?=$base;?>/assets/images/edit.png" class="img-fluid" width="30" height="30" title="Editar">
                                        </a>
                                        <a href="<?=$base;?>/contratos/<?=$item['id'];?>/excluir" onclick=" return confirm('Tem certeza que deseja excluir?')"  >
                                            <img src="<?=$base;?>/assets/images/del.png" class="img-fluid"  width="30" height="30" style="margin-left: 20px;" title="Excluir">
                                        </a>
                                    </td>
                                <?php endif;?>
                            </tr>
                    <?php endforeach;?>
                <tbody>
            </table>
        </div>
        <div class="row">
            <h2>HVI</h2>
        </div>
    </div>
    

	
	<?=$render('footer');?>