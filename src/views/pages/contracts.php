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
            </ul>
        </div>
        <div class="row">
            <h2>Meus Contratos<h2>
        </div>
        <div class="row">
            <form method="GET" class="form-inline">
                <div  class="form-group">
                    <label for="state">Ordenar por:</label>
                    <select class="form-control" name="order" onchange="this.form.submit()">
                        <option value="date" <?= ($order == 'date')?'selected':''; ?>>Data</option>
                        <?php if($loggedUser->group != 'client'): ?>
                            <option value="email_user" <?= ($order == 'email_user')?'selected':''; ?>>E-mail</option>
                        <?php endif;?>
                    </select>
                </div>
            </form>
            <table class="table table-dark table-striped table-bordered" >
                <thead>
                    <tr>
                        <th scope="col"  width="25%">Data</th>
                        <th scope="col"  width="25%">Contrato nº</th>
                        <?php if($loggedUser->group != 'client'): ?>
                            <th scope="col"  width="35%">Cliente</th>
                        <?php endif;?>
                        <?php if($loggedUser->group == 'admin'): ?>
                            <th scope="col"  width="15%">Ações</th>
                        <?php endif;?>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($contracts as $contract): ?>
                        <?php if($contract['id_user'] == $loggedUser->id || $loggedUser->group != 'client'):?>
                            <tr>
                                <td><?=date('d/m/Y', strtotime($contract['date']));?></td>
                                <td>
                                    <a href="<?=$base;?>/contratos/<?=$contract['id'];?>"><?=$contract['name'];?>
                                    </a>
                                </td>
                                <?php if($loggedUser->group != 'client'): ?>
                                    <td width="35%"><?=$contract['email_user'];?></td>
                                <?php endif;?>
                                <?php if($loggedUser->group == 'admin'): ?>
                                    <td>
                                        <a href="<?=$base;?>/contratos/<?=$contract['id'];?>/editar" >
                                            <img src="<?=$base;?>/assets/images/edit.png" class="img-fluid" width="30" height="30" title="Editar">
                                        </a>
                                        <a href="<?=$base;?>/contratos/<?=$contract['id'];?>/del" onclick=" return confirm('Tem certeza que deseja excluir?')"  >
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
            <h2>Minhas Ofertas<h2>
        </div>
        <div class="row">
            <form method="GET" class="form-inline">
                <div  class="form-group">
                    <label for="state">Ordenar por:</label>
                    <select class="form-control" name="order" onchange="this.form.submit()">
                        <option value="date" <?= ($order == 'date')?'selected':''; ?>>Data</option>
                        <?php if($loggedUser->group != 'client'): ?>
                            <option value="email_user" <?= ($order == 'email_user')?'selected':''; ?>>E-mail</option>
                        <?php endif;?>
                    </select>
                </div>
            </form>
            <table class="table table-dark table-striped table-bordered" >
                <thead>
                    <tr>
                        <th scope="col" width="25%">Data</th>
                        <th scope="col" width="25%">Oferta nº</th>
                        <?php if($loggedUser->group != 'client'): ?>
                            <th scope="col" width="35%">Cliente</th>
                        <?php endif;?>
                        <?php if($loggedUser->group == 'admin'): ?>
                            <th scope="col" width="15%">Ações</th>
                        <?php endif;?>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($tenders as $item): ?>
                        <?php if($contract['id_user'] == $loggedUser->id || $loggedUser->group != 'client'):?>
                            <tr>
                                <td ><?=date('d/m/Y', strtotime($item['date']));?></td>
                                <td>
                                    <a href="<?=$base;?>/propostas/<?=$item['id'];?>"><?=$item['name'];?>
                                    </a>
                                </td>
                                <?php if($loggedUser->group != 'client'): ?>
                                    <td><?=$item['email_user'];?></td>
                                <?php endif;?>
                                <?php if($loggedUser->group == 'admin'): ?>
                                    <td>
                                        <a href="<?=$base;?>/propostas/<?=$item['id'];?>/editar" >
                                            <img src="<?=$base;?>/assets/images/edit.png" class="img-fluid" width="30" height="30" title="Editar">
                                        </a>
                                        <a href="<?=$base;?>/contratos/<?=$item['id'];?>/prodel" onclick=" return confirm('Tem certeza que deseja excluir?')"  >
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