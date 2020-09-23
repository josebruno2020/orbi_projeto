<?=$render('headerPage', [
    'activeMenu' => 'contratos',
    'loggedUser' => $loggedUser
]);?>
	
	<div class="container-sm">
        <?=$render('userIcon', ['loggedUser' => $loggedUser]);?>
        <div class="row" >
            <ul class="list-inline">
                <?php if($loggedUser->group === 'admin' || $loggedUser->group === 'employee'):?>
                    <a href="<?=$base;?>/meus-contratos">
                <?php else:?>
                    <a href="<?=$base;?>/meus-contratos/<?=$loggedUser->id;?>">
                <?php endif;?>
                
                    <li class="list-inline-item" id="menu-up">> Meus Contratos</li>
                </a>
                <a href="<?=$base;?>/contratos/<?=$file->id;?>" >
                    <li class="list-inline-item"  id="menu-up">> <?=$file->name;?></li>
                </a>
                

            </ul>
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
                    <?php if(is_null($data)):?>
                    
                    <?php else:?>
                        <?php foreach($data as $item): ?>
                            
                            <tr>
                                <td><?=date('d/m/Y', strtotime($item['date']));?></td>
                                <td>
                                    <a 
                                        href="<?=$base.'/media/contracts/'
                                        .$new->getOne($item['id_contract'])->name
                                        .'/'.$item['name_server'];?>" target="_blank">
                                        <?=$item['name'];?>
                                    </a>
                                </td>
                                <?php if($loggedUser->group == 'admin'): ?>
                                    <td>
                                        <a href="<?=$base;?>/contratos/<?=$item['id'];?>/edit-document" title="Editar">
                                            <button class="btn btn-info btn-sm">
                                                <i class="far fa-edit"></i>
                                            </button>
                                        </a>
                                        <a href="<?=$base;?>/contratos/<?=$item['id'];?>/excluir" onclick=" return confirm('Tem certeza que deseja excluir?')"  title="Excluir">
                                            <button class="btn btn-danger btn-sm ml-2">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </a>
                                    </td>
                                <?php endif;?>
                            </tr>
                        
                        <?php endforeach;?>
                    <?php endif;?>
                    
                <tbody>
            </table>
        </div>
        
        <div class="row mt-4">
            <h2>Planilhas</h2>
        </div>
            <?=$render('flashMessage');?>
        <div class="row">
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
                    <?php if(is_null($planilhas)):?>
                    
                    <?php else:?>
                        <?php foreach($planilhas as $planilha): ?>
                            
                            <tr>
                                <td  width="25%"><?=date('d/m/Y', strtotime($planilha['date']));?></td>
                                <td width="50%">
                                    <a 
                                        href="<?=$base.'/media/contracts/'
                                        .$new->getOne($planilha['id_contract'])->name
                                        .'/'.$planilha['name_server'];?>" target="_blank">
                                        <?=$planilha['name'];?>
                                    </a>
                                </td>
                                <?php if($loggedUser->group == 'admin'): ?>
                                    <td width="25%">
                                        <a href="<?=$base;?>/contratos/<?=$planilha['id'];?>/edit-planilha" title="Editar">
                                            <button class="btn btn-info btn-sm">
                                            <i class="far fa-edit"></i>
                                            </button>
                                        </a>
                                        <a href="<?=$base;?>/contratos/<?=$planilha['id'];?>/del-planilha" onclick=" return confirm('Tem certeza que deseja excluir?')"  title="Excluir">
                                            <button class="btn btn-danger btn-sm ml-2">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </a>
                                        
                                        <button class="email_button btn btn-primary btn-sm ml-2" title="Enviar E-mail de notificação" data-id="<?=$planilha['id'];?>">
                                            <i class="fas fa-envelope-open-text"></i>
                                        </button>
                                        
                                    </td>
                                <?php endif;?>
                            </tr>
                           
                        <?php endforeach;?>
                    <?php endif;?>    
                </tbody>
            </table>
        </div>
        

        <div class="row mt-4">
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
                <?php if(is_null($hvi) || $hvi === false):?>                
                
                <?php else:?>
                    <?php foreach($hvi as $file): ?>
                        
                        <tr>
                            <td  width="25%"><?=date('d/m/Y', strtotime($file['date']));?></td>
                            <td width="50%">
                                <a 
                                    href="<?=$base.'/media/contracts/'
                                    .$new->getOne($file['id_contract'])->name
                                    .'/'.$file['name_server'];?>" target="_blank">
                                    <?=$file['name'];?>
                                </a>
                            </td>
                            <?php if($loggedUser->group == 'admin'): ?>
                                <td width="25%">
                                    <a href="<?=$base;?>/contratos/<?=$file['id'];?>/edit-hvi" title="Editar">
                                        <button class="btn btn-info btn-sm">
                                            <i class="far fa-edit"></i>
                                        </button>   
                                    </a>
                                    <a href="<?=$base;?>/contratos/<?=$file['id'];?>/del-hvi" onclick=" return confirm('Tem certeza que deseja excluir?')"  title="Excluir">
                                        <button class="btn btn-danger btn-sm ml-2">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </a>
                                </td>
                            <?php endif;?>
                        </tr>
                        
                    <?php endforeach;?>    
                <?php endif;?>
                </tbody>
            </table>
            
        </div>

        <div class="row mt-4">
            <h2>Notas Fiscais</h2>
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
                <?php if(is_null($nfs) || $nfs === false):?>
                
                <?php else:?>
                    <?php foreach($nfs as $nf): ?>
                        
                        <tr>
                            <td  width="25%"><?=date('d/m/Y', strtotime($nf['date']));?></td>
                            <td width="50%">
                                <a 
                                    href="<?=$base.'/media/contracts/'
                                    .$new->getOne($nf['id_contract'])->name
                                    .'/'.$nf['name_server'];?>" target="_blank">
                                    <?=$nf['name'];?>
                                </a>
                            </td>
                            <?php if($loggedUser->group == 'admin'): ?>
                                <td width="25%">
                                    <a href="<?=$base;?>/contratos/<?=$nf['id'];?>/edit-nf" title="Editar">
                                        <button class="btn btn-info btn-sm">
                                            <i class="far fa-edit"></i>
                                        </button>   
                                    </a>
                                    <a href="<?=$base;?>/contratos/<?=$nf['id'];?>/del-nf" onclick=" return confirm('Tem certeza que deseja excluir?')"  title="Excluir">
                                        <button class="btn btn-danger btn-sm ml-2">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </a>
                                </td>
                            <?php endif;?>
                        </tr>
                        
                    <?php endforeach;?>
                <?php endif;?>      
                </tbody>
            </table>
            
        </div>
    </div>

<?=$render('footer');?>