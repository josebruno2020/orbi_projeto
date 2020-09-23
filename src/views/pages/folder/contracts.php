<?=$render('headerPage', [
    'activeMenu' => 'contratos',
    'loggedUser' => $loggedUser
]);?>
	
	<div class="container">
        <?=$render('userIcon', ['loggedUser' => $loggedUser]);?>
        <div class="row" >
            <ul class="list-inline">
                <a href="<?=$base;?>/meus-contratos" >
                    <li class="list-inline-item"  id="menu-up">> Meus Contratos</li>
                </a>
            </ul>
        </div>
        <div class="row">
            <h2>Meus Contratos<h2>
        </div>
        <div class="row">
            <form action="" id="form_contratos_search" method="post" class="form">
                <div class="form-group d-flex">
                    <input type="text" name="contratos_search" id="contratos_search" class="form-control mr-2" placeholder="Buscar...">
                    <button type="submit" class=" btn btn-success">Buscar</button>
                </div>
            </form>
        </div>
        <?=$render('flashMessage');?>
        
            <div id="resultado-contratos">
                <table class="table table-dark table-striped table-bordered table-responsive-lg" >
                    <thead>
                        <tr>
                            <th scope="col"  width="25%">Data</th>
                            <th scope="col"  width="25%">Contrato nº</th>

                            <?php 
                                if($loggedUser->group != 'client' && 
                                $loggedUser->group != 'client2'): 
                            ?>
                                <th scope="col"  width="35%">Cliente</th>
                            <?php endif;?>
                            <?php if($loggedUser->group == 'admin'): ?>
                                <th scope="col"  width="15%">Ações</th>
                            <?php endif;?>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($contracts as $contract): ?>
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
                                                <button class="btn btn-info btn-sm">
                                                    <i class="far fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="<?=$base;?>/contratos/<?=$contract['id'];?>/del" onclick=" return confirm('Tem certeza que deseja excluir a pasta com TODOS os arquivos!?')"  >
                                                <button class="btn btn-danger btn-sm ml-2">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            </a>
                                        </td>
                                    <?php endif;?>
                                </tr>
                            
                        <?php endforeach;?>
                    <tbody>
                </table>
                
            </div>
        
        <?=$render('pagination', [
            'total_paginas' => $total_paginas,
            'p' => $p
        ]);?>
        
    </div>
    

	
<?=$render('footer');?>