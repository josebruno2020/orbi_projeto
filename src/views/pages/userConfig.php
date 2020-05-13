<?=$render('headerPage', [
    'activeMenu' => 'system-config',
    'loggedUser' => $loggedUser
]);?>

<div class="container">
    <div class="row">
        <div class="col-sm">
            <?=$render('userIcon', ['loggedUser' => $loggedUser]);?>
            <a href="<?=$base;?>/system-config/user-list" class="btn btn-info">Voltar</a>
            <p class="text-center">
                <h2>Configurações</h2>
            </p>
        </div>
        
    </div>
    <div class="row">
        
        <div class="col align-items-center">
            <?php if(!empty($flash)): ?>
                <button class="btn btn-info"><?=$flash;?><button>
            <?php endif;?>

            <form method="POST" action="<?=$base;?>/system-config/config/<?=$user->id;?>" enctype="multipart/form-data">
                <div  class="form-group">
                    <label for="avatar">Avatar:</label></br>
                    <input id="avatar" type="file" name="avatar" class="" >
                </div>

                <div  class="form-group">
                    <label for="name">Nome:</label>
                    <input id="name" type="text" name="name" class="form-control" placeholder="Digite seu Nome" value="<?=$user->name;?>">
                </div>
                <div  class="form-group">
                    <label for="email">E-mail:</label>
                    <input id="email" type="email" name="email" class="form-control" placeholder="Digite seu E-mail" value="<?=$user->email;?>" readonly>
                </div>

                <div  class="form-group">
                    <label for="tel">Telefone:</label>
                    <input id="tel" type="text" name="tel" class="form-control" placeholder="(99)99999-9999" value="<?=$user->tel;?>">
                </div>
                
                <div  class="form-group">
                    <label for="password1">Nova Senha:</label>
                    <input type="password" class="form-control" name="password1" placeholder="Digite sua Senha"></input>
                </div>

                <div  class="form-group">
                    <label for="password2">Confirme a Nova Senha:</label>
                    <input type="password" class="form-control" name="password2" placeholder="Confirme sua senha"></input>
                </div>

                <div  class="form-group">
                    <label for="city">Cidade:</label>
                    <input type="text" class="form-control" name="city" placeholder="Digite sua Cidade" value="<?=$user->city;?>"></input>
                </div>

                <div  class="form-group">
                    <label for="state">Estado:</label>
                    <select class="form-control" name="state" value="<?=$user->state;?>">
                        <option value="<?=$user->state?>"><?=strtoupper($user->state)?></option>
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
                    <label for="state">Grupo:</label>
                    <select class="form-control" name="group">
                        <option value=""><?=ucfirst($user->group);?></option>
                        <option value="client">Cliente</option>
                        <option value="employee">Funcionário</option>
                        <option value="admin">Administrador</option>
                    </select>
                </div>

                <div  class="form-group">
                    <input class="form-control btn btn-success btn-block" type="submit" value="Salvar Modificações">
                </div>
                
            </form>
        </div>
        
    </div>
</div>






<?=$render('footer');?>