<?=$render('headerPage', [
    'activeMenu' => 'contratos',
    'loggedUser' => $loggedUser
]);?>
	
	<div class="container">
        <?=$render('userIcon', ['loggedUser' => $loggedUser]);?>
        <div class="row" >
            <ul class="list-inline">
                <a href="<?=$base;?>/contratos" >
                    <li class="list-inline-item"  id="menu-up">> Meus Contratos</li>
                </a>
            </ul>
        </div>
        <div class="row">
            <h2>Meus Contratos<h2>
        </div>
        <div class="row ">
            
            <table class="table table-dark table-striped table-bordered table-responsive-lg" >
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
                        <?php if($contract['id_user'] == $loggedUser->id 
                        || $loggedUser->group == 'admin' 
                        || $loggedUser->group == 'employee'):?>

                            <tr>
                                <td><?=date('d/m/Y', strtotime($contract['date']));?></td>
                                <td>
                                    <a href="<?=$base;?>/contratos/<?=$contract['id'];?>"><?=$contract['name'];?>
                                    </a>
                                </td>
                                <?php if($loggedUser->group != 'client'): ?>
                                    
                                    <td width="35%"><?=$new->getNameByEmail($contract['email_user'])->name;?></td>
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
        <?php if($loggedUser->group == 'client2'):?>
            
        <?php else:?>
            <h2>Minhas Ofertas<h2>
        </div>
        <div class="row">
            
            <table class="table table-dark table-striped table-bordered table-responsive-lg" >
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
                        <?php if($contract['id_user'] == $loggedUser->id 
                        || $loggedUser->group == 'admin' 
                        || $loggedUser->group == 'employee'):?>
                            
                            <tr>
                                <td ><?=date('d/m/Y', strtotime($item['date']));?></td>
                                <td>
                                    <a href="<?=$base;?>/propostas/<?=$item['id'];?>"><?=$item['name'];?>
                                    </a>
                                </td>
                                <?php if($loggedUser->group != 'client'): ?>
                                    <td><?=$new->getNameByEmail($item['email_user'])->name;?></td>
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
            <?php endif;?>
        </div>
        
    </div>
    

	
<?=$render('footer');?>