<?=$render('header', [
    'activeMenu' => 'login'
]);?>

<div class="container">
    <div class="row" style="padding-top: 20px;">
        <div class="col-sm">
            <p class="text-center">
                <h2>Faça o seu Login</h2>
            </p>
        </div>
        
    </div>
    <div class="row">
        <div class="col align-items-center">
            <?php if(!empty($flash)): ?>
                <?=$flash;?>
            <?php endif; ?>
            <form method="POST" action="<?=$base;?>/login">
                <div  class="form-group">
                    <input id="email" type="email" name="email" class="form-control" placeholder="Digite seu E-mail">
                </div>
                
                <div  class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Digite sua Senha"></input>
                </div>
                <div  class="form-group">
                    <input class="form-control btn btn-success btn-block" type="submit" value="Acessar">
                </div>
                
            </form>
        </div>
        <p><a href="<?=$base;?>/cadastro">Ainda não tem cadastro? Cadastre-se!</a></p>
    </div>
</div>






<?=$render('footer');?>