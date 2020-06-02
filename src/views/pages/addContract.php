<?=$render('headerPage', [
    'activeMenu' => 'system-config',
    'loggedUser' => $loggedUser
]);?>

<div class="container">
    <div class="row">
        <div class="col-sm">
            <?=$render('userIcon', ['loggedUser' => $loggedUser]);?>
            <a href="<?=$base;?>/system-config" class="btn btn-info">Voltar</a>
            <p class="text-center">
                <h2>Adicionar Contrato</h2>
            </p>
        </div>
        
    </div>
    <div class="row">
        <div class="col align-items-center">
            <?php if(!empty($flash)): ?>
                <div class="alert alert-danger"><?=$flash;?></div>
            <?php endif;?>


            <form method="POST" action="<?=$base;?>/system-config/adicionar-contrato" enctype="multipart/form-data">

                <div  class="form-group">
                    <label for="city">Nome da Pasta:</label>
                    <input type="text" class="form-control" name="name"></input>
                </div>

                <div  class="form-group">
                    <label for="name">Usuário:</label>
                    
                    <select class="form-control" name="id" value="">
                        <option value=""></option>
                        <?php foreach($user as $item): ?>
                            <option value="<?=$item['id'];?>"><?=$item['name'];?></option>
                        <?php endforeach;?>
                    </select>
                </div>

                <div  class="form-group">
                    <label for="city">Data:</label>
                    <input type="date" class="form-control" name="date" placeholder="Digite sua Cidade"></input>
                </div>

                <div  class="form-group">
                    <input class="form-control btn btn-success btn-block" type="submit" value="Salvar">
                </div>
                
            </form>
            
        </div>
        
    </div>
    <div class="row" style="margin-top:15px;">
        <div class="col-sm">
            <a href="<?=$base;?>/system-config/adicionar-documento">Adicionar Documento para Contrato</a>
        </div>
        <div class="col-sm">
            <a href="<?=$base;?>/system-config/adicionar-hvi">Adicionar HVI para Contrato</a>
        </div>
        
        
    </div>
    <div class="row" style="margin-top:15px;">
        <div class="col-sm">
            <a href="<?=$base;?>/system-config/adicionar-nf">Adicionar NF para Contrato</a>
        </div>
    </div>
</div>






<?=$render('footer');?>