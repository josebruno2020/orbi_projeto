<?=$render('header', [
    'activeMenu' => 'login'
]);?>

<div class="container">
    <div class="row" style="padding-top: 20px;">
        <div class="col-sm">
            <p class="text-center">
                <h2>Redefinir senha</h2>
            </p>
        </div>
        
    </div>
    
    <?=$render('flashMessage');?>

    <div class="row">
        <div class="col align-items-center">
            <p><?=$user->name;?>, por favor, defina sua nova senha!</p>
            
            <form method="POST" action="<?=$base;?>/nova-senha/<?=$token['token'];?>">
                <div  class="form-group">
                    <input id="password" type="password" name="password" class="form-control" placeholder="Digite sua nova senha">
                </div>
                <div  class="form-group">
                    <input id="password" type="password" name="password2" class="form-control" placeholder="Confirme sua nova senha">
                </div>
                
                <div  class="form-group">
                    <input class="form-control btn btn-success btn-block" type="submit" value="Redefinir Senha">
                </div>
                
            </form>
        </div>
    </div>
    
</div>






<?=$render('footer');?>