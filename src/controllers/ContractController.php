<?php
namespace src\controllers;

use \core\Controller;
use \src\helpers\UserHelpers;
use \src\helpers\ContractHelpers;
use src\helpers\HviHelpers;
use src\helpers\PlanilhaHelpers;
use \src\helpers\TenderHelpers;
use src\models\Contract;
use src\services\FlashMessageTrait;

class ContractController extends Controller {
    use FlashMessageTrait;

    private $loggedUser;

    
    public function __construct() {
        $this->loggedUser = UserHelpers::checkLogin();
        
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

    public function addContractFile() 
    {
        //Caso o usuário seja do grupo de clientes, ele será redirecionado para a página a sua página de início;
        if($this->loggedUser->group == 'client') {
            $this->redirect('/my');
        }
        $order = null;
        $cont = ContractHelpers::getAll($order);
        $this->render('contract/add-contractFile', [
            'loggedUser' => $this->loggedUser,
            'cont' => $cont
        ]);

    }

    public function addContractFileAction() 
    {
        //Recebendo os dados;
        $contract = $_FILES['contract'];
        $name = filter_input(INPUT_POST, 'name');
        $id_contract = filter_input(INPUT_POST, 'id');
        $date = filter_input(INPUT_POST, 'date');

        //Selecionando o nome da a pasta(contrato) que tenha o mesmo valor que o id_contrato para guardar nela;
        $folder_name = ContractHelpers::nameById($id_contract);
        $new_name = md5(time().rand(0,999).time()).'.pdf';
        $link = 'media/contracts/';
        $permitido = 'application/pdf';

        if($contract['type'] != $permitido) {
            $this->flashMessage(
                'danger',
                'O arquivo deve ser em formato PDF!!'
            );
            $this->redirect('/system-config/adicionar-documento');
        }
        if($name && $id_contract && $date && $link && $new_name) {
            move_uploaded_file($_FILES['contract']['tmp_name'],  $link.$folder_name->name.'/'.$new_name);
            ContractHelpers::addContractFile($name, $id_contract, $date, $new_name, $link);
            $this->flashMessage(
                'success',
                'Documento salvo com sucesso!'
            );
            $this->redirect('/system-config/adicionar-documento');

        } else {
            $this->flashMessage(
                'danger',
                'Preencha todos os campos!'
            );
            $this->redirect('/system-config/adicionar-documento');
        }
        
    }

    public function documentEdit($id) {
        
        $doc = ContractHelpers::getById($id);
        $file = ContractHelpers::getOne($doc->id_contract);
        
        $this->render('contract/edit-document', [
            'loggedUser' => $this->loggedUser,
            'doc' => $doc,
            'file' => $file
        ]);
    }
    
    public function documentEditAction($id) {
        //Recebendo os novos dados do usuário;
        $name = filter_input(INPUT_POST, 'name');
        $date = filter_input(INPUT_POST, 'date');

        if($name && $date) {

            ContractHelpers::documentEdit($id, $name, $date);
            $this->flashMessage(
                'success',
                'Alterações salvas no Documento'
            );
            $this->redirect('/contratos/'.$id['id'].'/edit-document');

        } else {
            $this->flashMessage(
                'danger',
                'Preencha todos os campos!'
            );
            $_SESSION['flash'] = 'Preencha todos os campos!';
            $this->redirect('/contratos/'.$id['id'].'/edit-document');
        }

    }

    public function delContract($id) 
    {
        if($this->loggedUser->group == 'client') {
            $this->redirect('/my');
        }
        //Função para deletar documento de contrato;
        $file_name = ContractHelpers::getById($id);
        $folder_name = ContractHelpers::nameById($file_name->id_contract);

        unlink('media/contracts/'.$folder_name->name.'/'.$file_name->name_server);

        ContractHelpers::delContract($id);
        $this->flashMessage(
            'success',
            'Documento excluído com sucessso!'
        );
        $this->redirect('/meus-contratos');
        
    }
    
}
