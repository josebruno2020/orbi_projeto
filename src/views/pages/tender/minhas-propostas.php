<?=$render('headerPage', [
    'activeMenu' => 'propostas',
    'loggedUser' => $loggedUser
]);?>
	
	<div class="container">
        <?=$render('userIcon', ['loggedUser' => $loggedUser]);?>
        <div class="row" >
            <ul class="list-inline">
                <a href="<?=$base;?>/minhas-propostas" >
                    <li class="list-inline-item"  id="menu-up">> Minhas Propostas</li>
                </a>
            </ul>
        </div>
        
        <div class="row">
        <?php if(is_null($tenders)):?>
            <div class="alert alert-info">
                Nenhum registro!
            </div>
        <?php else:?>
            <h2>Minhas Propostas<h2>
        </div>
        <div class="row mt-2">
            
            <table class="table table-dark table-striped table-bordered table-responsive-lg" >
                <thead>
                    <tr>
                        <th scope="col" width="25%">Data</th>
                        <th scope="col" width="25%">Proposta nº</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($tenders as $item): ?>
                            
                            <tr>
                                <td ><?=date('d/m/Y', strtotime($item['date']));?></td>
                                <td>
                                    <a href="<?=$base;?>/propostas/<?=$item['id'];?>">
                                        <?=$item['name'];?>
                                    </a>
                                </td>
                            </tr>
                        
                    <?php endforeach;?>
                <tbody>
            </table>
            <?php endif;?>
        </div>
        <?=$render('pagination', [
            'p' => $p,
            'total_paginas' => $total_paginas
        ]);?>
    </div>
    

	
<?=$render('footer');?>