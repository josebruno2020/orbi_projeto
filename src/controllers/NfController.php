<?php

namespace src\controllers;

use core\Controller;
use src\helpers\ContractHelpers;
use src\helpers\NfHelpers;
use src\helpers\UserHelpers;
use src\services\FlashMessageTrait;

class NfController extends Controller{
    use FlashMessageTrait;
    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHelpers::checkLogin();
        
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }


    public function addNf() 
    {
        if($this->loggedUser->group == 'client') {
            $this->redirect('/my');
        }

        $cont = ContractHelpers::getAll($order = '');

        $this->render('nf/add-nf', [
            'loggedUser' => $this->loggedUser,
            'cont' => $cont,
        ]);
    }

    public function addNfAction() 
    {
        //Recebendo os dados;
        $nf = $_FILES['nf'];
        $name = filter_input(INPUT_POST, 'name');
        $id_contract = filter_input(INPUT_POST, 'id');
        $date = filter_input(INPUT_POST, 'date');

        //Selecionando o nome da a pasta(contrato) que tenha o mesmo valor que o id_contrato para guardar nela;
        $folder_name = ContractHelpers::nameById($id_contract);

        $link = 'media/contracts/';
        $new_name = md5($nf['name'].time().rand(0,999)).'.pdf';
        $permitido = 'application/pdf';
        
        if($nf['type'] != $permitido) {
            $this->flashMessage(
                'danger',
                'O arquivo deve ser em formato PDF!!'
            );
            $this->redirect('/system-config/adicionar-nf');
        }

        
        if($name && $id_contract && $date && $link && $new_name) {
            move_uploaded_file($nf['tmp_name'], $link.$folder_name->name.'/'.$new_name);
            NfHelpers::addNfFile($name, $id_contract, $date, $new_name, $link);
            $this->flashMessage(
                'success',
                'Nota Fiscal salva com sucesso!'
            );
            $this->redirect('/system-config/adicionar-nf');

        } else {
            $this->flashMessage(
                'danger',
                'Preencha todos os campos!'
            );
            $this->redirect('/system-config/adicionar-nf');
        }
    }

    public function nfEdit($id) 
    {
        $nf = NfHelpers::nfById($id['id']);
        $file = ContractHelpers::getOne($nf->id_contract);

        $this->render('nf/edit-nf', [
            'loggedUser' => $this->loggedUser,
            'nf' => $nf,
            'file' => $file
        ]);
    }

    public function nfEditAction($id) 
    {
        //Recebendo os dados novos do HVI;
        $name = filter_input(INPUT_POST, 'name');
        $date = filter_input(INPUT_POST,'date');

        if($name && $date) {

            NfHelpers::nfEdit($id, $name, $date);
            $this->flashMessage(
                'success',
                'Alterações salvas na Nota Fiscal!'
            );
            $this->redirect('/contratos/'.$id['id'].'/edit-nf');

        } else {
            $this->flashMessage(
                'danger',
                'Preencha todos os dados!'
            );
            $this->redirect('/contratos/'.$id['id'].'/edit-nf');
        }
    }

    public function nfDel($id) 
    {
        //Função para deletar NF
        $file_name = NfHelpers::nfById($id['id']);
        $folder_name = ContractHelpers::nameById($file_name->id_contract);

        unlink('media/contracts/'.$folder_name->name.'/'.$file_name->name_server);

        NfHelpers::delNf($id['id']);
        $this->flashMessage(
            'success',
            'Nota Fiscal excluída com sucesso!'
        );
        $this->redirect('/meus-contratos');
        
    }

}