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
                <h2>Adicionar Radar</h2>
            </p>
        </div>
        
    </div>
    <div class="row">
        <div class="col align-items-center">
            <?=$render('flashMessage');?>
            <form method="POST" action="<?=$base;?>/system-config/radarAction" enctype="multipart/form-data">

                <div  class="form-group">
                    <label for="avatar">Arquivo do Radar:</label></br>
                    <input id="avatar" type="file" name="radar" required class="form-control-file" >
                </div>

                <div  class="form-group">
                    <label for="city">Nome:</label>
                    <input type="text" class="form-control" name="name" placeholder="Digite o nome do Radar"></input>
                
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