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
                <?php if($loggedUser->group === 'admin' || $loggedUser->group === 'employee'):?>
                    <a href="<?=$base;?>/meus-contratos">> Meus Contratos </a>
                <?php else:?>
                    <a href="<?=$base;?>/meus-contratos/<?=$loggedUser->id;?>">> Meus Contratos </a>
                <?php endif;?>
                <a href="<?=$base;?>/contratos/<?=$file->id;?>" >
                    <li class="list-inline-item" >> <?=$file->name;?></li>
                </a>
                <a href="<?=$base;?>/contratos/<?=$file->id;?>/edit-document" >
                    <li class="list-inline-item" >> <?=$doc->name;?></li>
                </a>
                

            </ul>
            </div>
            
            <p class="text-center">
                <h2>Editar Documento '<?=$doc->name;?>'</h2>
            </p>
        </div>
        
    </div>
    <div class="row">
        <div class="col align-items-center">
            <?=$render('flashMessage');?>

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