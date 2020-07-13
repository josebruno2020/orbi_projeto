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
                <h2>Cadastro</h2>
            </p>
        </div>
        
    </div>
    <div class="row">
        <div class="col align-items-center">
            <?php if(!empty($flash)): ?>
                <div class="alert alert-danger"><?=$flash;?></div>
            <?php endif;?>
            <form method="POST" action="<?=$base;?>/system-config/cadastrar">
                <div  class="form-group">
                    <input id="name" type="text" name="name" class="form-control" placeholder="Digite seu Nome">
                
                    <input id="email" type="email" name="email" class="form-control" placeholder="Digite seu E-mail">
                
                    <input type="password" class="form-control" name="password1" placeholder="Digite sua Senha"></input>
                
                    <input type="password" class="form-control" name="password2" placeholder="Confirme sua senha"></input>
                </div>

                <div  class="form-group">
                    <input type="text" class="form-control" name="city" placeholder="Digite sua Cidade"></input>
                </div>

                <div  class="form-group">
                    <select class="form-control" name="state">
                        <option value="">Selecione o Estado</option>
                        <option value="ac">AC</option>
                        <option value="al">AL</option>
                        <option value="ap">AP</option>
                        <option value="am">AM</option>
                        <option value="ba">BA</option>
                        <option value="ce">CE</option>
                        <option value="df">DF</option>
                        <option value="es">ES</option>
                        <option value="go">GO</option>
                        <option value="ma">MA</option>
                        <option value="mt">MT</option>
                        <option value="ms">MS</option>
                        <option value="mg">MG</option>
                        <option value="pa">PA</option>
                        <option value="pb">PB</option>
                        <option value="pr">PR</option>
                        <option value="pe">PE</option>
                        <option value="pi">PI</option>
                        <option value="rj">RJ</option>
                        <option value="rn">RN</option>
                        <option value="rs">RS</option>
                        <option value="ro">RO</option>
                        <option value="rr">RR</option>
                        <option value="sc">SC</option>
                        <option value="sp">SP</option>
                        <option value="se">SE</option>
                        <option value="to">TO</option>
                    </select>
                </div>

                <div  class="form-group">
                    <select class="form-control" name="group">
                        <option value="">Grupo</option>
                        <option value="client">Cliente Master</option>
                        <option value="client2">Cliente Menor</option>
                        <option value="employee">Funcionário</option>
                        <option value="admin">Administrador</option>
                    </select>
                </div>

                

                <div  class="form-group">
                    <input class="form-control btn btn-success btn-block" type="submit" value="Cadastrar">
                </div>
                
            </form>
            
        </div>
        
    </div>
</div>






<?=$render('footer');?>