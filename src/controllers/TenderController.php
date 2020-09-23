<?php

namespace src\controllers;

use core\Controller;
use src\helpers\HviHelpers;
use src\helpers\TenderHelpers;
use src\helpers\UserHelpers;
use src\services\DeleteTenderTrait;
use src\services\FlashMessageTrait;

class TenderController extends Controller{
    use DeleteTenderTrait;
    use FlashMessageTrait;
    private $loggedUser;
    
    public function __construct() 
    {
        $this->loggedUser = UserHelpers::checkLogin();
        
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

    public function index($id)
    {
        if($this->loggedUser->group === 'client2') {
            $this->redirect('/my');
        }
        $order = '';
        $new = new UserHelpers();
        $tenders = TenderHelpers::getAll($order);
        
        $total_tenders = count($tenders);
        $p = 1;
        if(isset($_GET['p']) && !empty($_GET['p'])) {
            $p = addslashes($_GET['p']);
        }
        $por_pagina = 10;
        $total_paginas = ceil($total_tenders / $por_pagina);
        $tenders = TenderHelpers::getTotalPagina($p, $por_pagina);

        if(isset($id['id'])){
            if(!UserHelpers::idExistis($id)){
                $this->redirect('/my');
            } 

            $tenders = TenderHelpers::getByIdUser($id['id']);

            $this->render('tender/minhas-propostas', [
                'loggedUser' => $this->loggedUser,
                'tenders' => $tenders,
                'new' => $new,
                'p' => $p,
                'total_paginas' => $total_paginas
            ]);

        } else {

            $this->render('tender/tenders',[
                'loggedUser' => $this->loggedUser,
                'tenders' => $tenders,
                'order' => $order,
                'new' => $new,
                'p' => $p,
                'total_paginas' => $total_paginas
            ]);
        }

        
    }

    public function tenderId($id)
    {
        $order = filter_input(INPUT_GET, 'order');
        $file = TenderHelpers::tenderById($id);
        $hvi = HviHelpers::getAllIdTender($file->id);
        $new = new TenderHelpers();
        if(TenderHelpers::idExistis($id) == false) {
            $this->redirect('/propostas');
        }
        $this->render('tender/tenderId', [
            'loggedUser' => $this->loggedUser,
            'id' => $id,
            'order' => $order,
            'hvi' => $hvi,
            'file' => $file,
            'new' => $new

        ]);
    }

    public function addTender() 
    {
        //Proteção contra o acesso de clientes;
        if($this->loggedUser->group == 'client') {
            $this->redirect('/my');
        }

        $user = UserHelpers::getClientMaster();

        $this->render('tender/add-tender', [
            'loggedUser' => $this->loggedUser,
            'user' => $user,
        ]);
    }

    
    public function addTenderAction() 
    {
        //Recebendo os dados do contrato;
        $name = filter_input(INPUT_POST, 'name');
        $date = filter_input(INPUT_POST, 'date');
        $idUser = filter_input(INPUT_POST, 'id');

        $user = UserHelpers::getUser($idUser);

        
        if($name && $date && $idUser) {
            //Se recebe todos os dados, ele vai criar uma pasta com o nome da proposta, logo em seguida salvar no banco de dados;
            mkdir('media/tenders/'.$name, 0777);

            TenderHelpers::addTender($name, $date, $idUser, $user->email);
            $this->flashMessage(
                'success',
                'Pasta de proposta adicionada com sucesso! Agora adicione documentos para ela!'
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

    public function tenderEdit($id) 
    {

        $tender = TenderHelpers::tenderById($id);
        $user = UserHelpers::getAll($order = '');

        $this->render('tender/edit-tender', [
            'loggedUser' => $this->loggedUser,
            'tender' => $tender,
            'user' => $user,
        ]);
    }

    public function tenderEditAction($id) 
    {
        //Recebendo os novos dados da proposta;
        $name = filter_input(INPUT_POST, 'name');
        $date = filter_input(INPUT_POST, 'date');
        $idUser = filter_input(INPUT_POST, 'id');

        $user = UserHelpers::getUser($idUser);
        $tender = TenderHelpers::tenderById($id);

        if($name && $date && $idUser) {
            rename('media/tenders/'.$tender->name, 'media/tenders/'.$name);
            TenderHelpers::editTender($id, $name, $date, $idUser, $user->email);
            $this->flashMessage(
                'success',
                'Alterações salvas com sucesso!'
            );
            $this->redirect('/propostas/'.$id['id'].'/editar');
        } else {
            $this->flashMessage(
                'danger',
                'Preencha todos os campos!'
            );
            $this->redirect('/propostas/'.$id['id'].'/editar');
        }
    }

    
    public function delTender($id)
    {
        //Antes de simplesmente apagar a pasta, temos que apagar todos os arquivos existentes nela.
        $this->deleteTender($id['id']);
        $this->flashMessage(
            'danger',
            'Pasta excluida com sucesso!'
        );
        $this->redirect('/propostas');
    }

}