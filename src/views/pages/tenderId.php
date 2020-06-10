<?=$render('headerPage', [
    'activeMenu' => 'contratos',
    'loggedUser' => $loggedUser
]);?>
	
	<div class="container-sm">
        <?=$render('userIcon', ['loggedUser' => $loggedUser]);?>
        <div class="row" >
            <ul class="list-inline">
                <a href="<?=$base;?>/contratos" >
                    <li class="list-inline-item" >> Meus Contratos</li>
                </a>
                <a href="<?=$base;?>/propostas/<?=$file->id;?>" >
                    <li class="list-inline-item" >> <?=$file->name;?></li>
                </a>
                

            </ul>
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
        </div>
        <div class="row">
            <h2>HVI</h2>
            <table class="table table-dark table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col" width="25%">Data</th>
                        <th scope="col" width="50%">HVI</th>
                        <?php if($loggedUser->group == 'admin'): ?>
                            <th scope="col" width="25%">Ações</th>
                        <?php endif;?>
                    </tr>                        
                </thead>
                <tbody>
                    <?php foreach($hvi as $file): ?>
                        <?php if($file['id_tender'] === $id['id']): ?>
                            <tr>
                                <td  width="25%"><?=date('d/m/Y', strtotime($file['date']));?></td>
                                <td width="50%">
                                    <a href="<?=$file['link'];?>" target="_blank"><?=$file['name'];?>
                                    </a>
                                </td>
                                <?php if($loggedUser->group == 'admin'): ?>
                                    <td width="25%">
                                        <a href="<?=$base;?>/contratos/<?=$file['id'];?>/edit-hvi" >
                                            <img src="<?=$base;?>/assets/images/edit.png" class="img-fluid" width="30" height="30" title="Editar">
                                        </a>
                                        <a href="<?=$base;?>/contratos/<?=$file['id'];?>/del-hvi-tender" onclick=" return confirm('Tem certeza que deseja excluir?')"  >
                                            <img src="<?=$base;?>/assets/images/del.png" class="img-fluid"  width="30" height="30" style="margin-left: 20px;" title="Excluir">
                                        </a>
                                    </td>
                                <?php endif;?>
                            </tr>
                        <?php endif;?>
                    <?php endforeach;?>    
                </tbody>
            </table>
        </div>
        
    </div>
    

	
	<?=$render('footer');?>