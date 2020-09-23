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
        <?php if(is_null($contracts)):?>
            <div class="alert alert-info">
                Nada Encontrado!
            </div>
        <?php else:?>
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
                <?php endif;?>
            <?php endforeach;?>
        <tbody>
        <?php endif;?>
    </table>
</div>