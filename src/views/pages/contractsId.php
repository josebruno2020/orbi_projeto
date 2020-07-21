<?=$render('headerPage', [
    'activeMenu' => 'contratos',
    'loggedUser' => $loggedUser
]);?>
	
	<div class="container-sm">
        <?=$render('userIcon', ['loggedUser' => $loggedUser]);?>
        <div class="row" >
            <ul class="list-inline">
                <a href="<?=$base;?>/contratos">
                    <li class="list-inline-item" id="menu-up">> Meus Contratos</li>
                </a>
                <a href="<?=$base;?>/contratos/<?=$file->id;?>" >
                    <li class="list-inline-item"  id="menu-up">> <?=$file->name;?></li>
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
            <h2>Contrato</h2>
        </div>
        <div class="row">
            <table class="table table-dark table-striped table-bordered table-responsive-lg" >
                <thead>
                    <tr>
                        <th scope="col" width="25%">Data</th>
                        <th scope="col" width="50%">Documento</th>
                        <?php if($loggedUser->group == 'admin'): ?>
                            <th scope="col" width="25%">Ações</th>
                        <?php endif;?>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $item): ?>
                        <?php if($item['id_contract'] === $id['id']): ?>
                            <tr>
                                <td><?=date('d/m/Y', strtotime($item['date']));?></td>
                                <td>
                                    <a href="<?=$item['link'].$new->getOne($item['id_contract'])->name.'/'.$item['name_server'];?>" target="_blank"><?=$item['name'];?>
                                    </a>
                                </td>
                                <?php if($loggedUser->group == 'admin'): ?>
                                    <td>
                                        <a href="<?=$base;?>/contratos/<?=$item['id'];?>/edit-document" >
                                            <img src="<?=$base;?>/assets/images/edit.png" class="img-fluid" width="30" height="30" title="Editar">
                                        </a>
                                        <a href="<?=$base;?>/contratos/<?=$item['id'];?>/excluir" onclick=" return confirm('Tem certeza que deseja excluir?')"  >
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
        <div class="row">
            <h2>HVI</h2>
            <table class="table table-dark table-striped table-bordered table-responsive-lg">
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
                        <?php if($file['id_contract'] === $id['id']): ?>
                            <tr>
                                <td  width="25%"><?=date('d/m/Y', strtotime($file['date']));?></td>
                                <td width="50%">
                                    <a href="<?=$file['link'].$new->getOne($file['id_contract'])->name.'/'.$file['name_server'];?>" target="_blank"><?=$file['name'];?>
                                    </a>
                                </td>
                                <?php if($loggedUser->group == 'admin'): ?>
                                    <td width="25%">
                                        <a href="<?=$base;?>/contratos/<?=$file['id'];?>/edit-hvi" >
                                            <img src="<?=$base;?>/assets/images/edit.png" class="img-fluid" width="30" height="30" title="Editar">
                                        </a>
                                        <a href="<?=$base;?>/contratos/<?=$file['id'];?>/del-hvi" onclick=" return confirm('Tem certeza que deseja excluir?')"  >
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
        <div class="row">
            <h2>Planilhas</h2>
            <table class="table table-dark table-striped table-bordered table-responsive-lg">
                <thead>
                    <tr>
                        <th scope="col" width="25%">Data</th>
                        <th scope="col" width="50%">Planilha</th>
                        <?php if($loggedUser->group == 'admin'): ?>
                            <th scope="col" width="25%">Ações</th>
                        <?php endif;?>
                    </tr>                        
                </thead>
                <tbody>
                    <?php foreach($nfs as $nf): ?>
                        <?php if($nf['id_contract'] === $id['id']): ?>
                            <tr>
                                <td  width="25%"><?=date('d/m/Y', strtotime($nf['date']));?></td>
                                <td width="50%">
                                    <a href="<?=$nf['link'].$new->getOne($nf['id_contract'])->name.'/'.$nf['name_server'];?>" target="_blank"><?=$nf['name'];?>
                                    </a>
                                </td>
                                <?php if($loggedUser->group == 'admin'): ?>
                                    <td width="25%">
                                        <a href="<?=$base;?>/contratos/<?=$nf['id'];?>/edit-planilha" >
                                            <img src="<?=$base;?>/assets/images/edit.png" class="img-fluid" width="30" height="30" title="Editar">
                                        </a>
                                        <a href="<?=$base;?>/contratos/<?=$nf['id'];?>/del-nf" onclick=" return confirm('Tem certeza que deseja excluir?')"  >
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