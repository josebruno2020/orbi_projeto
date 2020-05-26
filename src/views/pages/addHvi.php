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
                <h2>Adicionar HVI</h2>
            </p>
        </div>
        
    </div>
    <div class="row">
        <div class="col align-items-center">
            <?php if(!empty($flash)): ?>
                <button class="btn btn-danger"><?=$flash;?></button>
            <?php endif;?>


            <form method="POST" action="<?=$base;?>/system-config/adicionar-hvi" enctype="multipart/form-data">

                <div  class="form-group">
                    <label for="avatar">HVI:</label></br>
                    <input id="avatar" type="file" name="hvi" required class="form-control-file" >
                </div>

                <div  class="form-group">
                    <label for="city">Nome do HVI:</label>
                    <input type="text" class="form-control" name="name" placeholder="O nome que aparecerá para o cliente"></input>
                </div>

                <div  class="form-group">
                    <label for="name">Pasta do Contrato:</label>
                    
                    <select class="form-control" name="id" value="">
                        <option value=""></option>
                        <?php foreach($cont as $item): ?>
                            <option value="<?=$item['id'];?>"><?=$item['name'];?></option>
                        <?php endforeach;?>
                    </select>
                </div>

                <div  class="form-group">
                    <label for="name">Pasta da Proposta:</label>
                    
                    <select class="form-control" name="id_tender" value="">
                        <option value=""></option>
                        <?php foreach($tender as $item): ?>
                            <option value="<?=$item['id'];?>"><?=$item['name'];?></option>
                        <?php endforeach;?>
                    </select>
                </div>

                <div  class="form-group">
                    <label for="city">Data:</label>
                    <input type="date" class="form-control" name="date"></input>
                </div>

                <div  class="form-group">
                    <input class="form-control btn btn-success btn-block" type="submit" value="Salvar">
                </div>
                
            </form>
            
        </div>
        
    </div>
</div>






<?=$render('footer');?>