<?=$render('headerPage', [
    'activeMenu' => 'contratos',
    'loggedUser' => $loggedUser
]);?>

<div class="container">
    <div class="row">
        <div class="col-sm">
            <?=$render('userIcon', ['loggedUser' => $loggedUser]);?>
            
            <p class="text-center">
                <h2>Editar Documento '<?=$doc->name;?>'</h2>
            </p>
        </div>
        
    </div>
    <div class="row">
        <div class="col align-items-center">
            <?php if(!empty($flash)): ?>
                <button class="btn btn-danger"><?=$flash;?></button>
            <?php endif;?>

            <div>
                <p style="color: red;">OBS: Apenas poderá ser editado o nome e a data do documento.</p>
            </div>


            <form method="POST" action="<?=$base;?>/contratos/<?=$doc->id;?>/edit-document">

                <div  class="form-group">
                    <label for="city">Nome do Documento:</label>
                    <input type="text" class="form-control" name="name" placeholder="O nome que aparecerá para o cliente" value="<?=$doc->name;?>"></input>
                </div>

                

                <div  class="form-group">
                    <label for="city">Data:</label>
                    <input type="date" class="form-control" name="date" value="<?=$doc->date;?>"></input>
                </div>

                <div  class="form-group">
                    <input class="form-control btn btn-success btn-block" type="submit" value="Salvar">
                </div>
                
            </form>
            
        </div>
        
    </div>
</div>






<?=$render('footer');?>