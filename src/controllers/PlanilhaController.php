<?php

namespace src\controllers;

use core\Controller;
use src\helpers\ContractHelpers;
use src\helpers\PlanilhaHelpers;
use src\helpers\UserHelpers;
use src\services\FlashMessageTrait;

class PlanilhaController extends Controller{
    use FlashMessageTrait;
    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHelpers::checkLogin();
        
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }


    public function addPlanilha() 
    {
        if($this->loggedUser->group == 'client') {
            $this->redirect('/my');
        }

        $cont = ContractHelpers::getAll($order = '');

        $this->render('planilha/add-planilha', [
            'loggedUser' => $this->loggedUser,
            'cont' => $cont,
        ]);
    }

    public function addPlanilhaAction() 
    {
        //Recebendo os dados;
        $planilha = $_FILES['planilha'];
        $name = filter_input(INPUT_POST, 'name');
        $id_contract = filter_input(INPUT_POST, 'id');
        $date = filter_input(INPUT_POST, 'date');

        //Selecionando o nome da a pasta(contrato) que tenha o mesmo valor que o id_contrato para guardar nela;
        $folder_name = ContractHelpers::nameById($id_contract);

        $link = 'media/contracts/';
        $new_name = md5($planilha['name'].time()).'.pdf';
        $permitido = 'application/pdf';

        if($planilha['type'] != $permitido) {
            $this->flashMessage(
                'danger',
                'O arquivo deve ser em formato PDF!!'
            );
            $this->redirect('/system-config/adicionar-planilha');
        }

        
        if($name && $id_contract && $date && $link && $new_name) {
            move_uploaded_file($_FILES['planilha']['tmp_name'], $link.$folder_name->name.'/'.$new_name);
            PlanilhaHelpers::addPlanilhaFile($name, $id_contract, $date, $new_name, $link);
            $this->flashMessage(
                'success',
                'Planilha salva com sucesso!'
            );
            $this->redirect('/system-config/adicionar-planilha');

        } else {
            $this->flashMessage(
                'danger',
                'Preencha todos os campos!'
            );
            $this->redirect('/system-config/adicionar-planilha');
        }
    }

    public function planilhaEdit($id) 
    {
        $planilha = PlanilhaHelpers::planilhaById($id['id']);
        $file = ContractHelpers::getOne($planilha->id_contract);

        $this->render('planilha/edit-planilha', [
            'loggedUser' => $this->loggedUser,
            'planilha' => $planilha,
            'file' => $file
        ]);
    }

    public function planilhaEditAction($id) 
    {
        //Recebendo os dados novos do HVI;
        $name = filter_input(INPUT_POST, 'name');
        $date = filter_input(INPUT_POST,'date');

        if($name && $date) {

            PlanilhaHelpers::nfEdit($id, $name, $date);
            $this->flashMessage(
                'success',
                'Alterações salvas na Planilha!'
            );
            $this->redirect('/contratos/'.$id['id'].'/edit-planilha');

        } else {
            $this->flashMessage(
                'danger',
                'Preencha todos os dados!'
            );
            $this->redirect('/contratos/'.$id['id'].'/edit-planilha');
        }
    }

    public function PlanilhaDel($id) 
    {
        //Função para deletar NF
        $file_name = PlanilhaHelpers::planilhaById($id['id']);
        $folder_name = ContractHelpers::nameById($file_name->id_contract);

        unlink('media/contracts/'.$folder_name->name.'/'.$file_name->name_server);

        PlanilhaHelpers::delPlanilha($id['id']);
        $this->flashMessage(
            'success',
            'Planilha excluída com sucesso!'
        );
        $this->redirect('/meus-contratos');
        
    }

}