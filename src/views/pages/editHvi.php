<?=$render('headerPage', [
    'activeMenu' => 'contratos',
    'loggedUser' => $loggedUser
]);?>

<div class="container">
    <div class="row">
        <div class="col-sm">
            <?=$render('userIcon', ['loggedUser' => $loggedUser]);?>
            <div class="row" >
                <ul class="list-inline">
                    <a href="<?=$base;?>/contratos" >
                        <li class="list-inline-item" >> Meus Contratos</li>
                    </a>
                    <?php if($hvi->id_tender == '0'): ?>
                        <a href="<?=$base;?>/contratos/<?=$file->id;?>" >
                            <li class="list-inline-item" >> <?=$file->name;?></li>
                        </a>
                    <?php endif;?>
                    <?php if($hvi->id_contract == '0'): ?>
                        <a href="<?=$base;?>/propostas/<?=$tender->id;?>" >
                            <li class="list-inline-item" >> <?=$tender->name;?></li>
                        </a>
                    <?php endif;?>

                    <a href="<?=$base;?>/contratos/<?=$hvi->id;?>/edit-hvi" >
                        <li class="list-inline-item" >> <?=$hvi->name;?></li>
                    </a>
                    

                </ul>
            </div>
            
            <p class="text-center">
                <h2>Editar HVI '<?=$hvi->name;?>'</h2>
            </p>
        </div>
        
    </div>
    <div class="row">
        <div class="col align-items-center">
            <?php if(!empty($flash)): ?>
                <div class="alert alert-danger"><?=$flash;?></div>
            <?php endif;?>

            <div>
                <p style="color: red;">OBS: Apenas poderá ser editado o nome e a data do HVI.</p>
            </div>


            <form method="POST" action="<?=$base;?>/contratos/<?=$hvi->id;?>/edit-hvi">

                <div  class="form-group">
                    <label for="city">Nome do Documento:</label>
                    <input type="text" class="form-control" name="name" placeholder="O nome que aparecerá para o cliente" value="<?=$hvi->name;?>"></input>
                </div>

                

                <div  class="form-group">
                    <label for="city">Data:</label>
                    <input type="date" class="form-control" name="date" value="<?=$hvi->date;?>"></input>
                </div>

                <div  class="form-group">
                    <input class="form-control btn btn-success btn-block" type="submit" value="Salvar">
                </div>
                
            </form>
            
        </div>
        
    </div>
</div>






<?=$render('footer');?>