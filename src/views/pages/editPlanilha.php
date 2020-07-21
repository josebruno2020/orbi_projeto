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
                    <a href="<?=$base;?>/contratos/<?=$file->id;?>" >
                        <li class="list-inline-item" >> <?=$file->name;?></li>
                    </a>
                    <a href="<?=$base;?>/contratos/<?=$nf->id;?>/edit-nf" >
                        <li class="list-inline-item" >> <?=$nf->name;?></li>
                    </a>
                    

                </ul>
            </div>
            
            <p class="text-center">
                <h2>Editar Planilha '<?=$nf->name;?>'</h2>
            </p>
        </div>
        
    </div>
    <div class="row">
        <div class="col align-items-center">
            <?php if(!empty($flash)): ?>
                <div class="alert alert-danger"><?=$flash;?></div>
            <?php endif;?>

            <div>
                <p style="color: red;">OBS: Apenas poderá ser editado o nome e a data da Planilha.</p>
            </div>


            <form method="POST" action="<?=$base;?>/contratos/<?=$nf->id;?>/edit-planilha">

                <div  class="form-group">
                    <label for="city">Nome do Documento:</label>
                    <input type="text" class="form-control" name="name" placeholder="O nome que aparecerá para o cliente" value="<?=$nf->name;?>"></input>
                </div>

                

                <div  class="form-group">
                    <label for="city">Data:</label>
                    <input type="date" class="form-control" name="date" value="<?=$nf->date;?>"></input>
                </div>

                <div  class="form-group">
                    <input class="form-control btn btn-success btn-block" type="submit" value="Salvar">
                </div>
                
            </form>
            
        </div>
        
    </div>
</div>






<?=$render('footer');?>