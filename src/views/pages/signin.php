<?=$render('header', [
    'activeMenu' => 'login'
]);?>

<div class="container" >
    
    <form method="POST" action="<?=$base;?>/login" id="login">
        <div class="row" style="padding: 20px;">
            <div class="col-sm">
                
                <h2>Faça o seu Login</h2>
                
            </div>
            
        </div>
        <div class="row">
            <div class="col" >
            <?php if(!empty($flash)): ?>
                <div class="alert alert-danger"><?=$flash;?></div>
            <?php endif; ?>
            </div>
        </div>
        <div  class="form-group">
            <input  type="email" name="email" class="form-control" placeholder="Digite seu E-mail" autofocus="true">
        </div>
        
        <div  class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Digite sua Senha"></input>
        </div>
        <div  class="form-group">
            <input class="form-control btn btn-success btn-block" type="submit" value="Acessar">
        </div>
        <a href="<?=$base;?>/esqueci-senha" >Esqueci minha senha</a>
    </form>
    
    
        
    
    <div class="row" >
        <div class="col" >
            
        </div>
    </div>
</div>






<?=$render('footer');?>