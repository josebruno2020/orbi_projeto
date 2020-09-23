<?php

namespace src\controllers;

use core\Controller;
use src\helpers\ContractHelpers;
use src\helpers\HviHelpers;
use src\helpers\TenderHelpers;
use src\helpers\UserHelpers;
use src\services\FlashMessageTrait;

class HviController extends Controller{
    use FlashMessageTrait;
    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHelpers::checkLogin();
        
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

    public function addHviFile() {
        //Proteção contra o acesso de clientes;
        if($this->loggedUser->group == 'client') {
            $this->redirect('/my');
        }

        $cont = ContractHelpers::getAll($order = '');
        $tender = TenderHelpers::getAll($order = '');

        $this->render('hvi/add-hvi', [
            'loggedUser' => $this->loggedUser,
            'cont' => $cont,
            'tender' => $tender,
        ]);
    }

    public function addHviFileAction() {
        //Recebendo os dados do formulário;
        $hvi = $_FILES['hvi'];
        $id_contract = filter_input(INPUT_POST, 'id');
        $date = filter_input(INPUT_POST, 'date');
        $id_tender = filter_input(INPUT_POST, 'id_tender');

        if($id_tender || $id_contract) {
                
            if($id_tender) {
                $id_contract = '0';
            } else {
                $id_tender = '0';
            }
            
            for($i=0;$i<count($hvi['tmp_name']);$i++){

                
                $new_name = md5($hvi['name'][$i].time().rand(0,999)).'.pdf';
                $name = $_FILES['hvi']['name'][$i];
    
                $permitido = 'application/pdf';
                if($_FILES['hvi']['type'][$i] != $permitido) {
                    $this->flashMessage(
                        'danger',
                        'O arquivo deve ser em formato PDF!!'
                    );
                    $this->redirect('/system-config/adicionar-hvi');
                }
    
                if($id_contract) {
                    //Selecionando o nome da a pasta que tenha o mesmo valor que o id_contrato para guardar nela;
                    $folder_name = ContractHelpers::nameById($id_contract);
        
                    $link = 'media/contracts/';
                    move_uploaded_file($hvi['tmp_name'][$i], $link.$folder_name->name.'/'.$new_name);
                } else {
        
                    $folder_name = TenderHelpers::nameById($id_tender);
                    $link = 'media/tenders/';
                    move_uploaded_file($hvi['tmp_name'][$i], $link.$folder_name->name.'/'.$new_name);
                }
                //Se receber todos os dados, será salvo o arquivo na pasta do servidor e adicionado no banco de dados;
                HviHelpers::addHviFile($name, $id_contract, $id_tender, $date, $new_name, $link);
                
            }
            $this->flashMessage(
                'success',
                'HVI salvo com sucesso!'
            );
            $this->redirect('/system-config/adicionar-hvi');


        } else {
            $this->flashMessage(
                'danger',
                'Preencha todos os campos!'
            );
            $this->redirect('/system-config/adicionar-hvi');
        }
    }


    public function hviEdit($id) {

        $hvi = HviHelpers::hviById($id);
        $file = ContractHelpers::getOne($hvi->id_contract);
        $tender = TenderHelpers::tenderById($hvi->id_tender);

        
        $this->render('hvi/edit-hvi', [
            'loggedUser' => $this->loggedUser,
            'hvi' => $hvi,
            'file' => $file,
            'tender' => $tender
        ]);
    }

    public function hviEditAction($id) {
        //Recebendo os dados novos do HVI;
        $name = filter_input(INPUT_POST, 'name');
        $date = filter_input(INPUT_POST,'date');

        if($name && $date) {

            HviHelpers::hviedit($id, $name, $date);
            $this->flashMessage(
                'success',
                'Alterações salvas no HVI!'
            );
            $this->redirect('/contratos/'.$id['id'].'/edit-hvi');

        } else {
            $this->flashMessage(
                'danger',
                'Preencha todos os dados!'
            );
            $this->redirect('/contratos/'.$id['id'].'/edit-hvi');
        }
    }

    public function delHvi($id) {
        //Deletar o HVI que está na Pasta dos Contratos!!
        $file_name = HviHelpers::hviById($id);
        $folder_name = ContractHelpers::nameById($file_name->id_contract);
        unlink('media/contracts/'.$folder_name->name.'/'.$file_name->name_server);

        HviHelpers::delHvi($id);
        $this->flashMessage(
            'success',
            'Hvi Excluido com sucesso!'
        );
        $this->redirect('/meus-contratos');
    }

    public function delHviTender($id) {
        //Função para deletar HVI que está na pasta de Tenders;
        $file_name = HviHelpers::hviById($id);
        $folder_name = TenderHelpers::nameById($file_name->id_tender);
        unlink('media/tenders/'.$folder_name->name.'/'.$file_name->name_server);
        HviHelpers::delHvi($id);
        $this->flashMessage(
            'success',
            'Hvi Excluido com sucesso!'
        );
        $this->redirect('/propostas');
    }

}