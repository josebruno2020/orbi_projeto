<?=$render('header', [
    'activeMenu' => 'login'
]);?>

<div class="container">
    <div class="row" style="padding-top: 20px;">
        <div class="col-sm">
            <p class="text-center">
                <h2>Recuperação de Senha</h2>
            </p>
        </div>
        
    </div>
    <div class="row">
        <div class="col" >
        <?php if(!empty($flash)): ?>
            <button class="btn btn-danger"><?=$flash;?>
        <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col align-items-center">
            <p>Por favor, informe o E-mail cadastrado no sistema!</p>
            
            <form method="POST" action="<?=$base;?>/esqueci-senha">
                <div  class="form-group">
                    <input id="email" type="email" name="email" class="form-control" placeholder="Digite seu E-mail" autofocus="true">
                </div>
                <div  class="form-group">
                    <input id="email" type="email" name="email2" class="form-control" placeholder="Confirme seu E-mail">
                </div>
                
                <div  class="form-group">
                    <input class="form-control btn btn-success btn-block" type="submit" value="Acessar">
                </div>
                
            </form>
        </div>
    </div>
    <div class="row" >
        <div class="col" >
            <a href="<?=$base;?>/login" >Faça seu Login!</a>
        </div>
    </div>
</div>






<?=$render('footer');?>