<?=$render('headerPage', [
    'activeMenu' => 'contratos',
    'loggedUser' => $loggedUser
]);?>
	
	<div class="container">
        <?=$render('userIcon', ['loggedUser' => $loggedUser]);?>
        <div class="row">
            <h2>Meus Contratos<h2>
        </div>
        <div class="row">
            <p>Ordenar por:
                <select>
                    <option></option>
                    <option>Data</option>
                    <option>Nome</option>
                </select>
            </p>
            <table class="table table-dark table-striped table-bordered" >
                <thead>
                    <tr>
                        <th scope="col">Data</th>
                        <th scope="col">Documento</th>
                        <th scope="col">Ações</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>teste1</td>
                        <td>teste2</td>
                        <td>teste3</td>
                    </tr>
                <tbody>
            </table>
        </div>
    </div>
    

	
	<?=$render('footer');?>