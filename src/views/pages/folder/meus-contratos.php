<?=$render('headerPage', [
    'activeMenu' => 'contratos',
    'loggedUser' => $loggedUser
]);?>
	<div class="container">
        <?=$render('userIcon', ['loggedUser' => $loggedUser]);?>
        <div class="row" >
            <ul class="list-inline">
                <a href="<?=$base;?>/meus-contratos/<?=$loggedUser->id;?>" >
                    <li class="list-inline-item"  id="menu-up">> Meus Contratos</li>
                </a>
            </ul>
        </div>
        <div class="row">
            <form method="GET" class="form-inline">
                <div  class="form-group">
                    <label for="order">Ordenar por:</label>
                    <select class="form-control" name="order" onchange="this.form.submit()">
                        <option value="name" <?= ($order == 'name') ?'selected':''; ?>>Nome
                        </option>
                        <option value="date" <?= ($order == 'date') ?'selected':''; ?>>Data</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="row">
            <h2>Meus Contratos<h2>
        </div>
        <div class="row ">
        <?=$render('flashMessage');?>
            <?php if(is_null($contracts)):?>
                <div class="alert alert-info">
                    Nenhum registro encontrado!
                </div>
            <?php else:?>
            
            <table class="table table-dark table-striped table-bordered table-responsive-lg" >
                <thead>
                    <tr>
                        <th scope="col"  width="25%">Data</th>
                        <th scope="col"  width="25%">Contrato nº</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($contracts as $contract): ?>

                            <tr>
                                <td><?=date('d/m/Y', strtotime($contract['date']));?></td>
                                <td>
                                    <a href="<?=$base;?>/contratos/<?=$contract['id'];?>"><?=$contract['name'];?>
                                    </a>
                                </td>
                            </tr>

                    <?php endforeach;?>
                <tbody>
            </table>
            <?php endif;?>
        </div>
        <?=$render('pagination', [
            'total_paginas' => $total_paginas,
            'p' => $p
        ]);?> 
    </div>
<?=$render('footer');?>