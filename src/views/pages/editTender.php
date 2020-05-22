<?=$render('headerPage', [
    'activeMenu' => 'contratos',
    'loggedUser' => $loggedUser
]);?>

<div class="container">
    <div class="row">
        <div class="col-sm">
            <?=$render('userIcon', ['loggedUser' => $loggedUser]);?>
            <a href="<?=$base;?>/system-config" class="btn btn-info">Voltar</a>
            <p class="text-center">
                <h2>Editar Proposta <?=$tender->name;?></h2>
            </p>
        </div>
        
    </div>
    <div class="row">
        <div class="col align-items-center">
            <?php if(!empty($flash)): ?>
                <button class="btn btn-danger"><?=$flash;?></button>
            <?php endif;?>


            <form method="POST" action="<?=$base;?>/propostas/<?=$tender->id;?>/editar" enctype="multipart/form-data">

                <div  class="form-group">
                    <label for="city">Nome da Pasta:</label>
                    <input type="text" class="form-control" name="name" value="<?=$tender->name;?>"></input>
                </div>

                <div  class="form-group">
                    <label for="name">Usuário:</label>
                    
                    <select class="form-control" name="id" >
                        <option value="<?=$tender->id_user;?>"><?=$tender->email_user;?></option>
                        <?php foreach($user as $item): ?>
                            <option value="<?=$item['id'];?>"><?=$item['name'];?></option>
                        <?php endforeach;?>
                    </select>
                </div>

                <div  class="form-group">
                    <label for="city">Data:</label>
                    <input type="date" class="form-control" name="date" placeholder="Digite sua Cidade" value="<?=$tender->date;?>"></input>
                </div>

                <div  class="form-group">
                    <input class="form-control btn btn-success btn-block" type="submit" value="Salvar Alterações">
                </div>
                
            </form>
            
        </div>
        
    </div>
    
</div>






<?=$render('footer');?>