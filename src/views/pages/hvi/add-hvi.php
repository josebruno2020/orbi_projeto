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
            <?=$render('flashMessage');?>

            <div class="alert alert-danger">Podem ser adicionados vários arquivos, mas todos irão para a MESMA PASTA!</div>
            <form method="POST" action="<?=$base;?>/system-config/adicionar-hvi" enctype="multipart/form-data">

                <div  class="form-group">
                    <label for="avatar">HVI:</label></br>
                    <input id="avatar" type="file" name="hvi[]" required multiple class="form-control-file" >
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