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

        <?=$render('flashMessage');?>
        
        <div  class="form-group">
            <input  type="email" name="email" class="form-control" placeholder="Digite seu E-mail" autofocus="true">
        </div>
        
        <div  class="form-group">
            <input 
                id="input_senha"
                type="password" 
                class="form-control" 
                name="password" 
                placeholder="Digite sua Senha"

            >
        </div>

        <div class="form-group d-flex justify-content-center align-items-center">

            <input id="mostrar_senha" type="checkbox" class="form-check-label ml-2"  >
            <label for="mostrar_senha" style="font-size:15px;margin:0 10px;">
                Mostrar Senha
            </label>
        </div>

        <div  class="form-group">
            <input class="form-control btn btn-success btn-block" type="submit" value="Acessar">
        </div>
        <a href="<?=$base;?>/esqueci-senha" >Esqueci minha senha</a>
    </form>
    
   
</div>






<?=$render('footer');?>