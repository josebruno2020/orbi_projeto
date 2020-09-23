<?=$render('headerPage', [
    'activeMenu' => 'propostas',
    'loggedUser' => $loggedUser
]);?>
	
	<div class="container-sm">
        <?=$render('userIcon', ['loggedUser' => $loggedUser]);?>
        <div class="row" >
            <ul class="list-inline">
                <?php if($loggedUser->group === 'admin' || $loggedUser->group === 'employee'):?>
                    <a href="<?=$base;?>/propostas">
                        <li class="list-inline-item"  id="menu-up">> Minhas Propostas
                        </li>
                    </a>
                <?php else:?>
                    <a href="<?=$base;?>/minhas-propostas/<?=$loggedUser->id;?>">
                        <li class="list-inline-item"  id="menu-up">> Minhas Propostas
                        </li> 
                    </a>
                <?php endif;?>
                <a href="<?=$base;?>/propostas/<?=$file->id;?>" >
                    <li class="list-inline-item"  id="menu-up">> <?=$file->name;?></li>
                </a>
                

            </ul>
        </div>
        <?=$render('flashMessage');?>
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
                <?php if(is_null($hvi)):?>
                    
                <?php else:?>
                    <tbody>
                        <?php foreach($hvi as $file): ?>
                            
                            <tr>
                                <td  width="25%"><?=date('d/m/Y', strtotime($file['date']));?></td>
                                <td width="50%">
                                    <a 
                                        href="<?=$base.'/media/tenders/'
                                        .$new->nameById($file['id_tender'])->name
                                        .'/'.$file['name_server'];?>" target="_blank">
                                        <?=$file['name'];?>
                                    </a>
                                </td>
                                <?php if($loggedUser->group == 'admin'): ?>
                                    <td width="25%">
                                        <a href="<?=$base;?>/contratos/<?=$file['id'];?>/edit-hvi" >
                                            <button class="btn btn-info btn-sm">
                                                <i class="far fa-edit"></i>
                                            </button>
                                        </a>
                                        <a href="<?=$base;?>/contratos/<?=$file['id'];?>/del-hvi-tender" onclick=" return confirm('Tem certeza que deseja excluir?')"  >
                                            <button class="btn btn-danger btn-sm ml-2">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </a>
                                    </td>
                                <?php endif;?>
                            </tr>
                            
                        <?php endforeach;?>    
                    </tbody>
                <?php endif;?>
            </table>
        </div>
        
    </div>
    

	
	<?=$render('footer');?>