<div id="resultado-historic">
    <table class="table table-dark table-striped table-bordered table-responsive" id="historic">
        <thead>
            <tr>
                <th scope="col" width="20%">Tipo</th>
                <th scope="col" width="20%">E-mail</th>
                <th scope="col" width="20%">Data</th>
                <th scope="col" width="20%">Hora</th>
                <?php if($loggedUser->group == 'admin'): ?>
                    <th scope="col" width="10%">Ações</th>
                <?php endif;?>
                <th scope="col" width="10%">IP</th>
                
            </tr>
        </thead>
        <?php if($hist == null): ?>
            Nenhum registro encontrado!
        <?php else:?>
        <tbody>
            <?php foreach($hist as $item): ?>
                <tr>
                    <td><?=$item['type'];?></td>
                    <td><?=$item['email_user'];?></td>
                    <td><?=date('d/m/Y', strtotime($item['date']));?></td>
                    <td><?=date('H:i:s', strtotime($item['time']));?></td>
                    <?php if($loggedUser->group == 'admin'): ?>
                        <td>
                            <a href="<?=$base;?>/system-config/historic/<?=$item['id'];?>/excluir" onclick=" return confirm('Tem certeza que deseja excluir?')"  >
                                <img src="<?=$base;?>/assets/images/del.png" class="img-fluid"  width="30" height="30" style="margin-left: 20px;" title="Excluir">
                            </a>
                        </td>
                    <td><?=$item['ip'];?></td>
                    <?php endif;?>
                </tr>
            <?php endforeach;?>
        <tbody>
        <?php endif;?>
    </table>
</div>