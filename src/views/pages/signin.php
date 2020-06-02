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
        <div class="col" >
        <?php if(!empty($flash)): ?>
            <div class="alert alert-danger"><?=$flash;?></div>
        <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col align-items-center">
            
            <form method="POST" action="<?=$base;?>/login">
                <div  class="form-group">
                    <input id="email" type="email" name="email" class="form-control" placeholder="Digite seu E-mail" autofocus="true">
                </div>
                
                <div  class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Digite sua Senha"></input>
                </div>
                <div  class="form-group">
                    <input class="form-control btn btn-success btn-block" type="submit" value="Acessar">
                </div>
                
            </form>
        </div>
    </div>
    <div class="row" >
        <div class="col" >
            <a href="<?=$base;?>/esqueci-senha" >Esqueci minha senha</a>
        </div>
    </div>
</div>






<?=$render('footer');?>