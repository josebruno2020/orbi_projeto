<?php

namespace src\controllers;

use core\Controller;
use src\helpers\ContractHelpers;
use src\helpers\HviHelpers;
use src\helpers\NfHelpers;
use src\helpers\PlanilhaHelpers;
use src\helpers\UserHelpers;
use src\services\DeleteFolderTrait;
use src\services\FlashMessageTrait;

class FolderController extends Controller{
    use DeleteFolderTrait;
    use FlashMessageTrait;

    private $loggedUser;

    public function __construct() 
    {
        $this->loggedUser = UserHelpers::checkLogin();
        //Chamdno a classe UserHelpers, com seu método estático onde vai verificar se o usuário fez o Login;
        //Ele vai armazenar na variável $loggedUser;
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

    public function index($id) 
    { 
        $new = new UserHelpers();
        $order = filter_input(INPUT_GET, 'order');
        $contracts = ContractHelpers::getAll($order);

        $total_contratos = count($contracts);
        $p = 1;
        if(isset($_GET['p']) && !empty($_GET['p'])) {
            $p = addslashes($_GET['p']);
        }
        $por_pagina = 10;
        $total_paginas = ceil($total_contratos / $por_pagina);
        $contracts = ContractHelpers::getTotalPagina($p, $por_pagina);
       
        if(isset($id['id'])){
            if(!UserHelpers::idExistis($id)){
                $this->redirect('/my');

            }
            
            $contracts = ContractHelpers::getByIdUser($id['id'], $order);

            $this->render('folder/meus-contratos', [
                'loggedUser' => $this->loggedUser,
                'contracts' => $contracts,
                'new' => $new,
                'p' => $p,
                'total_paginas' => $total_paginas,
                'order' => $order
            ]);

        } else{
            
            if(
                $this->loggedUser->group === 'client' || 
                $this->loggedUser->group === 'client2') {
                    
                $this->redirect('/my');
            }

            $this->render('folder/contracts',[
                'loggedUser' => $this->loggedUser,
                'contracts' => $contracts,
                'new' => $new,
                'p' => $p,
                'total_paginas' => $total_paginas
            ]);
        }
        
    }

    public function FolderId($id) 
    {
        if(!ContractHelpers::idExistis($id)){
            $this->redirect('/my');
        }
        $order = filter_input(INPUT_GET, 'order');

        $file = ContractHelpers::getOne($id);

        $data = ContractHelpers::getAllIdFolder($id);
        $hvi = HviHelpers::getAllIdFolder($id);
        $planilhas = PlanilhaHelpers::getAllIdFolder($id);
        $nfs = NfHelpers::getAllIdFolder($id);
        $new = new ContractHelpers();
        if(ContractHelpers::idExistis($id) == false) {
            $this->redirect('/contratos');
        }
        
        $this->render('folder/folder-id', [
            'loggedUser' => $this->loggedUser,
            'file' => $file,
            'new' => $new,
            'order' => $order,
            'data' => $data,
            'hvi' => $hvi,
            'planilhas' => $planilhas,
            'nfs' => $nfs,
            'id' => $id
            
        ]);
    }

    public function addFolder() 
    {
        //Proteção contra clientes;
        if($this->loggedUser->group == 'client') {
            $this->redirect('/my');
        }

        $user = UserHelpers::getAll($order = '');

        $this->render('folder/add-folder', [
            'loggedUser' => $this->loggedUser,
            'user' => $user
        ]);
    }

    public function addFolderAction() {
        //Recebendo os dados do contrato;
        $name = filter_input(INPUT_POST, 'name');
        $date = filter_input(INPUT_POST, 'date');
        $idUser = filter_input(INPUT_POST, 'id');

        $user = UserHelpers::getUser($idUser);

        
        if($name && $date && $idUser) {
            //Se recebe todos os dados, ele vai criar uma pasta com o nome do contrato, logo em seguida salvar no banco de dados;
            mkdir('media/contracts/'.$name, 0777);
            ContractHelpers::addContract($name, $date, $idUser, $user->email);
            $this->flashMessage(
                'success',
                'Pasta de contrato adicionada com sucesso! Agora adicione documentos para ela!'
            );

            $this->redirect('/system-config/adicionar-contrato');

        } else {
            $this->flashMessage(
                'danger',
                'Insira todos os dados!'
            );

            $this->redirect('/system-config/adicionar-contrato');
        }
    }

    public function folderEdit($id) 
    {
        $cont = ContractHelpers::getOne($id);
        $user = UserHelpers::getAll($order = '');

        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        
        $this->render('folder/edit-contract', [
            'loggedUser' => $this->loggedUser,
            'cont' => $cont,
            'user' => $user,
            'flash' => $flash
        ]);

    }

    /**
     * Rota post que recebe os dados e faz as alterações na pasta;
     *
     * @param int $id
     * @return void
     */
    public function folderEditAction($id)
    {
        //Recebendo os dados do contrato
        $name = filter_input(INPUT_POST, 'name');
        $date = filter_input(INPUT_POST, 'date');
        $idUser = filter_input(INPUT_POST, 'id');

        $user = UserHelpers::getUser($idUser);
        $cont = ContractHelpers::getOne($id);

        if($name && $date && $idUser) {
            rename('media/contracts/'.$cont->name, 'media/contracts/'.$name);
            ContractHelpers::editFolder($id, $name, $date, $idUser, $user->email);
            $this->flashMessage(
                'success',
                'Pasta alterada com sucesso!'
            );
            $this->redirect('/contratos/'.$id['id'].'/editar');
        } else {
            $this->flashMessage(
                'danger',
                'Preencha todos os campos!'
            );
            $this->redirect('/contratos/'.$id['id'].'/editar');
        }
    }
    
    public function delFolder($id)
    {
        //Antes de simplesmente apagar a pasta, temos que apagar todos os arquivos existentes nela.
        $this->deleteFolder($id);
        
        $this->redirect('/meus-contratos');
    }


}